<?php 

//Database credentials
$user = "a3001565_jasdeep";
$pw = "Toiohomai1234";
$db = "a3001565_kaur";

//Database connection object (address, user, pw, db)
$connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));

//Create variable that stores all records from our database
$result = $connection->query("select * from pages") or die($connection->error());


?>