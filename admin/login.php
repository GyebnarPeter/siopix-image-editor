<?php
session_start();

include "../classes/Database.php";
include "../classes/LoginAdmin.php";


$email = "";
$password = "";


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = new LoginAdmin();
    $result = $login->evaluate($_POST);

    if ($result != ""){
        echo "<div style='text-align: center; font-size: 20px; color: white; background-color: grey'>";
        echo "A következő hibák léptek fel<br>";
        echo $result;
        echo "</div>";
    } else {
        header("Location: index.php");
        die;
    }

    $email = $_POST['email'];

}
?>

<form method="post">
    <div id="bar2">
        <h3>Admin bejelentkezés</h3>
        <input name="email" value="<?php echo $email ?>" type="text" id="txt" placeholder="Email cím"><br><br>
        <input name="password" value="<?php echo $password ?>" type="password" id="txt" placeholder="Jelszó"><br><br>
        <input type="submit" id="btn" value="Bejelentkezés">
    </div>
</form>
