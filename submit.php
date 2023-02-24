<?php

$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=patient", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"; 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$insert=$conn->prepare("insert into user (nom_user,prenom_user,tel_user,Adresse)
 values (:nom_user,:prenom_user,:tel_user,:Adresse)");
$insert->bindParam(':nom_user', $_POST['name']);
$insert->bindParam(':prenom_user', $_POST['first_name']);
$insert->bindParam(':tel_user', $_POST['tel']);
$insert->bindParam(':Adresse', $_POST['address']);

// insert a row
if($insert->execute()){
    header("location:list.php");
}


?>