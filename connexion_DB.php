<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "patient";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
?>
