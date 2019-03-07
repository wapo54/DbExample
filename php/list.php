<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

//FillIn SQL //////////////////////
$SQL = $connection->prepare('SELECT * FROM article');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
//print_r($SQL->rowCount());
$result = $SQL->fetchAll();

//var_dump($result);
if (isset($_SESSION["loggedin"])) {
   if ($_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='new.php' class='btn btn-primary'> Create a new article </a></p></div>";
}

for ($count = 0; $count < count($result); $count++) {
    echo "<div class='row'>";

  
	if(is_array($result[$count]) == true ) {

	//Loop and Create HTML
    // print_r($result[$count]);

     ?>
        <div class="list-group-horizontal-sm ">
         <div class=" wrapper list-group-item card flex-nowrap" style="width: 32rem;">
             <img src="<?php echo $result[$count]['img'] ?>" alt="">
            <a href="<?php echo 'view.php?id='.$result[$count]['id'] ?>">
                 <h2><?php echo $result[$count]['title'] ?></h2>
            </a>
            <p><?php echo $result[$count]['description'] ?></p>
        </div>
        </div>

<?php
	}
	echo "</div>";
}



