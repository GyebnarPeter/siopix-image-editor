<?php

include "classes/Database.php";
include "classes/Users.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST["password"] != $_POST["password_check"]){
        echo "Nem egyezik a jelszó!";

    } else {

        $user = new Users();
        $result = $user->evaluate_user($_POST);
        if ($result != "") {
            echo "<div style='text-align: center; font-size: 20px color: white; background-color = grey'>";
            echo "A következő hibák léptek fel:";
            echo $result;
            echo "</div>";
        } else {
            echo "Sikeresen regisztrált!";
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
    }
}

?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="container-fluid padding">

    <div class="row">
        <div class="welcome text-center">
            <h1 class="display-1">Regisztráció</h1>
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
                <td>Telefonszám</td>
                <td><input type="text" name="phone" class="form-control"/></td>
            </tr>
            <tr>
                <td>Jelszó</td>
                <td><input type="password" name="password" class="form-control"/></td>
            </tr>
            <tr>
                <td>Jelszó megerősítése</td>
                <td><input type="password" name="password_check" class="form-control"/></td>
            </tr>
            <tr><td>Jövőbeli rendelésekkel kapcsolatos informácók:</td></tr>
            <tr>
                <td>Irányítószám</td>
                <td><input type="text" name="post_code" class="form-control"/></td>
            </tr>
            <tr>
                <td>Város</td>
                <td><input type="text" name="city" class="form-control"/></td>
            </tr>
            <tr>
                <td>Utca, házszám</td>
                <td><input type="text" name="address" class="form-control"/></td>
            </tr>
            <tr>
                <td>Ajtó</td>
                <td><input type="text" name="door" class="form-control"/></td>
            </tr>
            <tr>
                <td>Emelet</td>
                <td><input type="text" name="floor" class="form-control"/></td>
            </tr>
            <tr>
                <td>Csengő</td>
                <td><input type="text" name="ring" class="form-control"/></td>
            </tr>
            <tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Regisztráció</button>
                </td>
            </tr>
        </table>
    </form>
</div>




