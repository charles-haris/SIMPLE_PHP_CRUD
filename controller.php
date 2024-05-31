<?php
require "connexion_DB.php";

if(isset($_POST['action1'])){
    if($_POST['action1']=="insert"){
        insert();
    }elseif($_POST['action1']=="update"){
        update();
    }else{
        delete();
    }
}

function insert(){
    global $conn;
    $nom=$_POST['name1'];
    $prenom=$_POST['first_name1'];
    $tel=$_POST['tel1'];
    $adresse=$_POST['Address1'];
    $sql=" INSERT INTO user (nom_user, prenom_user, tel_user, adresse) values (:nom_user, :prenom_user, :tel_user, :adresse)";

    $insert = $conn->prepare($sql);
    $insert->bindParam(":nom_user",$nom);
    $insert->bindParam(":prenom_user",$prenom);
    $insert->bindParam(":tel_user",$tel);
    $insert->bindParam(":adresse",$adresse);
    //$insert->bindParam(":id_user",$id);


    if($insert->execute()){
        echo "Inserted successfully";
    }else{
        echo "Insertion failed";

    }

}

function update(){
    global $conn;

    $nom=$_POST['name1'];
    $prenom=$_POST['first_name1'];
    $tel=$_POST['tel1'];
    $adresse=$_POST['Address1'];
    $id=$_POST['id1'];
    $sql="UPDATE user set nom_user=:nom_user,
     prenom_user=:prenom_user, tel_user=:tel_user,
      adresse=:adresse where id_user=:id_user";
    $update=$conn->prepare($sql);
    $update->bindParam(":nom_user",$nom);
    $update->bindParam(":prenom_user",$prenom);
    $update->bindParam(":tel_user",$tel);
    $update->bindParam("adresse",$adresse);
    $update->bindParam("id_user",$id);


    if($update->execute()){
        echo "Updated successfully";
    }else{
        echo "This operation failed";
    }

}
function delete(){
    global $conn;
    $sql="Delete from user where id_user=".$_POST['action1'];
    $delete=$conn->query($sql);
    if($delete->execute()){
        echo "Deleted successfully";
    }
}

?>
