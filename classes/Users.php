<?php

require_once "PasswordHash.php";
//INCLUDED IN HEADER
class Users
{

    private $error = "";

    public function evaluate($data)
    {
        foreach ($data as $key => $value) {

            if (empty($value)) {

                $this->error = $this->error . " A(z) " . $key . " üres!</br>";
            }

            if ($key == "email") {
                $email = $data["email"];
                $query = "SELECT * FROM users WHERE email = '$email'";

                $DB = new Database();
                $result = $DB->read($query);

                if ($result) {
                    $row = $result[0];

                    if ($email == $row['email']) {
                        $this->error = $this->error . " Ez az e-mail cím már foglalt!<br>";
                    }
                }
            }

            if ($key == "email") {

                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {

                    $this->error = $this->error . " Kérem írjon be érvényes email-t!</br>";
                }
            }

            if ($key == "name") {

                if (is_numeric($value)) {

                    $this->error = $this->error . " A név nem lehet szám!</br>";
                }
            }

        }

            if ($this->error == "") {
                //no error
                $this->create_admin($data);
            } else {
                return $this->error;
            }
    }

    public function create_admin($data){

        $name = $data['name'];
        $email = $data['email'];
        $hashData = PasswordHash::hash($data['password']);
        $password = $hashData['hash'];
        $salt = $hashData['salt'];
        $level = 1;

        $query = "INSERT INTO users (name, email, password, salt, access_level) VALUES ('$name','$email','$password','$salt','$level')";

        $db = new Database();
        $db->save($query);
    }

    public function evaluate_user($data)
    {
        foreach ($data as $key => $value) {

            if (empty($value)) {

                $this->error = $this->error . " A(z) " . $key . " üres!</br>";
            }

            if ($key == "email") {
                $email = $data["email"];
                $query = "SELECT * FROM users WHERE email = '$email'";

                $DB = new Database();
                $result = $DB->read($query);

                if ($result) {
                    $row = $result[0];

                    if ($email == $row['email']) {
                        $this->error = $this->error . " Ez az e-mail cím már foglalt!<br>";
                    }
                }
            }

            if ($key == "email") {

                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {

                    $this->error = $this->error . " Kérem írjon be érvényes email-t!</br>";
                }
            }

            if ($key == "name") {

                if (is_numeric($value)) {

                    $this->error = $this->error . " A név nem lehet szám!</br>";
                }
            }

        }

        if ($this->error == "") {
            //no error
            $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    public function create_user($data) {

        $name = $data['name'];
        $email = $data['email'];
        $hashData = PasswordHash::hash($data['password']);
        $password = $hashData['hash'];
        $salt = $hashData['salt'];
        $phone = $data['phone'];
        $post_code = $data['post_code'];
        $city = $data['city'];
        $address = $data['address'];
        $door = $data['door'];
        $floor = $data['floor'];
        $ring = $data['ring'];
        $access_level = 0;

        $query = "INSERT INTO users (name, email, password, salt, phone, post_code, city, address, door, floor, ring, access_level)
                    VALUES  ('$name','$email', '$password', '$salt', '$phone', '$post_code', '$city', '$address', '$door', '$floor', '$ring', '$access_level')";

        $db = new Database();
        $db->save($query);
    }

    public function get_all_admins() {

        $query = "SELECT name, email FROM users WHERE access_level = 1";

        $db = new Database();
        $db->read($query);

    }

    public function get_admin_data($id) {

        $query = "select * from users where id = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {

            $row = $result[0];
            return $row;

        } else {

            return false;
        }
    }

}