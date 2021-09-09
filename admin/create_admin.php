<?php
include "includes/header.php";

$name = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST["password"] != $_POST["password_check"]){
        echo "Nem egyezik a jelszó!";
    } else {

        $user = new Users();
        $result = $user->evaluate($_POST);

        if ($result != "") {
            echo "<div style='text-align: center; font-size: 20px color: white; background-color = grey'>";
            echo "A következő hibák léptek fel:";
            echo $result;
            echo "</div>";
        } else {
            echo "Admin sikeresen létrehozva!";
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
    }
}
?>
<div class="container-fluid padding">

    <div class="row">
        <div class="welcome text-center">
            <h1 class="display-1">Admin létrehozása</h1>
        </div>
    </div>

<form method="post" enctype="multipart/form-data">


    <table class='table table-hover table-responsive table-bordered'>


        <tr>
            <td>Teljes név</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class="form-control"/></td>
        </tr>
        <tr>
        <tr>
            <td>Jelszó</td>
            <td><input type="password" name="password" class="form-control"/></td>
        </tr>
        <tr>
            <td>Jelszó megerősítése</td>
            <td><input type="password" name="password_check" class="form-control"/></td>
        </tr>
        <tr>

        <tr>
            <td colspan="2" style="text-align: center;">
                <button type="submit" class="btn btn-primary">Létrehozás</button>
            </td>
        </tr>

    </table>
</form>
</div>

<?php include "includes/footer.php"?>