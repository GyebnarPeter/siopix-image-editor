<?php

include "Database.php";
include "Users.php";
include "LoginAdmin.php";

if (isset($_SESSION['admin_id']) && is_numeric($_SESSION['admin_id'])){

    $id = $_SESSION['admin_id'];

    $login = new LoginAdmin();

    $result = $login->check_admin_login($id);

    if($result) {
        $user = new Users();
        $user_data = $user->get_admin_data($id);

        if (!$user_data) {
            header("Location: ../admin/login.php");
            die;
        }
    } else {
        header("Location: ../admin/login.php");
        die;
    }

} else {
    header("Location: ../admin/login.php");
    die;
}
