<?php
require_once('PasswordHash.php');
//INCLUdED IN HEADER
class LoginAdmin
{

    private $error = "";

    public function evaluate($data)
    {

        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        $query = "select * from users where email = '$email' AND access_level = 1 limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {

            $row = $result[0];

            $password = PasswordHash::hash($password, $row['salt'])['hash'];

            if ($password == $row['password']) {

                //create session data
                $_SESSION['admin_id'] = $row['id'];

            } else {
                $this->error .= "Rossz jelszó.<br>";
            }

        } else {
            $this->error .= "Nincs regisztrálva ilyen email cím.<br>";
        }
        return $this->error;
    }

    public function check_admin_login($id)
    {
        if (is_numeric($id)) {

            $query = "select * from users where id = '$id' limit 1";

            $DB = new Database();
            $result = $DB->read($query);

            if ($result) {

                $admin_data = $result[0];
                return $admin_data;
            } else {
                header("Location: login.php");
                die;
            }

        } else {
            header("Location: login.php");
            die;
        }

    }
    public function get_user($id) {

        $query = "select * from users where id = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {

            return $result;
        }
        return null;
    }
}
