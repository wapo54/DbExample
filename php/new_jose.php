<?php
include 'dbconnect.php';
include 'functions.php';
include 'header.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
    if(!empty($_POST['title']) AND !empty($_POST['description'])) {
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
        echo "<br>we can process<br>";

    }else{
        echo "<br>At least one of your fields is empty, please try again.</br><br>";
    }



    //var_dump($connection->lastInsertId());
   // header("Location: view.php?id=".$connection->lastInsertId().""); /* Redirect browser */


include 'header.php';
?>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
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




