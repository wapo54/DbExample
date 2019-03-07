<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 06/03/2019
 * Time: 08:47
 */

include 'dbconnect.php';

//var_dump($_GET);

/*
foreach ($_GET as $key => $value) {
    echo "<br><br>MyParam: $key value: $value";
}
*/

//echo "idtodosomething" . $_GET['idtodosomething'];

echo "title to search for" . $_GET['titletosearch'];



$SQL = $connection->prepare('SELECT * FROM article WHERE title LIKE :TITLE');
$SQL->bindParam(':TITLE',$_GET['titletosearch'], PDO::PARAM_STR);
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
print_r($SQL->rowCount());
$result = $SQL->fetchAll();
var_dump($result);

// Jose's solution
//for ($ArrayIndex= 0 ; $ArrayIndex < count($result);$ArrayIndex++) {
//      echo "<br><br>ArrayIndex".$ArrayIndex;
//      echo "<br><br><a href= 'view.php'.$result[$ArrayIndex]('title')."</a>";


for ($count = 0; $count < count($result); $count++) {
    echo "<div class='row'>";


    if(is_array($result[$count]) == true ) {

        //Loop and Create HTML
        // print_r($result[$count]);
        ?>

        <a href="<?php echo 'view.php?id='.$result[$count]['id'] ?>">
            <h2><?php echo $result[$count]['title'] ?></h2>
        </a>

        <?php
    }
    echo "</div>";
}
