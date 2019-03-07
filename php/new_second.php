<?php
session_start();
include 'dbconnect.php';
include 'functions.php';

if($_SESSION["loggedin"] == true) {


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        //FillIn SQL with the Bind params :TITLE :DESCRIPTION :IMG
            $SQL = $connection->prepare("INSERT INTO list_second (title, description) VALUES (:TITLE,:DESCRIPTION)");
            $SQL->bindParam(':TITLE', $_POST['title'], PDO::PARAM_STR);
            $SQL->bindParam(':DESCRIPTION', $_POST['description'], PDO::PARAM_STR);




        if($SQL->execute()) {

            //var_dump($connection->lastInsertId());
            header("Location: list_second.php?id=".$connection->lastInsertId().""); /* Redirect browser */
        }
        else {
            echo "Error in Insert";
            print_r($SQL->errorInfo());
            $SQL->debugDumpParams();
            var_dump($_POST);

        }

    }

    else {
        include 'header.php';
        ?>
        <form method="POST" action="new_second.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tip a title for your project</label>
                <input class="form-control" type="text" name="title" value=""></input>
            </div>

            <div class="form-group">
                <label for="description">Define a description for your project</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group cc">
                <button class="btn btn-default" type="submit">Submit</button>
            </div>
        </form>

        <?php
    }


}