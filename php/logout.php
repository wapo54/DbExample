<?php
include 'header.php';

session_start();
session_regenerate_id(true);


if($_SERVER["REQUEST_METHOD"] == "POST") {


    //FillIn SQL with the Bind params :USERNAME
    $SQL = $connection->prepare('SELECT id, username, password FROM users WHERE username = :USERNAME');
    $SQL->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
    $SQL->execute();
    $result = $SQL->fetch();
    print_r($result);
    if ($result['username']) {
        if (password_verify($_POST['password'], $result['password'])) {
            // Password is correct, so start a new session
            session_start();
            // Store data in session variables
            $_SESSION["loggedIn"] = true;
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];


    ?>

    <div class="form-group">
        <input type="submit" class="btn btn-secondary" value="Log out"">
    </div>
    <?php
            session_destroy(); // Is Used To Destroy All Sessions
            // Redirect user to welcome page
            header("location: login.php");
        }
    }
    exit();
}