<?php
session_start();

//var_dump($_GET);

// to not have an error we have to complete the address in browser
// with ?nameforsession=apolline
echo "Name for Session" . $_GET['nameforsession'];
$_SESSION["nameforsession"] = $_GET['nameforsession'];
$_SESSION["anotherparameter"] =$_GET['something'];