<?php
session_start();

if (isset($_SESSION['admin_id'])) {

    $_SESSION['admin_id'] = NULL;
    unset($_SESSION['admin_id']);
}
header("Location: login.php");
