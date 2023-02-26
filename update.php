
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
    body{
        font-size: large;
    }
    #container
    {
        width: 50%;
        margin: auto;
        margin-top: 10%;
        padding: 20px ;
        border-radius: 15px;
        background-color: aliceblue;


    }
    .champ
    {
        font-size: large;
        border-style: none;
        width: 100%;
        height: 35px;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: center;

    }
    .btn
    {
        font-size: large;
        border-style: none;
        width: 40%;
        height: 35px;
        margin-left:29% ;
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: center;
        background-color: dodgerblue;

    }
    .btn:hover
    {
        background-color: deepskyblue;
    }
    .image_acc
    {
        height: 25%;
        width: 25%;
        margin-left: 37%;
        border-radius: 100px;
    }
    .image{
        width: 100%;
    }
    
</style>
<body>
    <div id="container">
        <div class="image">
            <img class="image_acc" src="img/software_update_by_gocmen_gettyimages-1146311500_2400x1600-100852481-large copy.jpg" alt="">
        </div>
        <h3 style="text-align: center;" >Update User</h3>
        <?php
         require "connexion_DB.php";
         $sql="SELECT * from user where id_user=".$_GET['id_user'];
         $data=$conn->query($sql,PDO::FETCH_ASSOC);
         $donnee=$data->fetch();
         //var_dump($donnee);
        ?>
        <form action="" method="post">
            <input class="champ" type="hidden" id="id" placeholder="write your name" value="<?= $donnee['id_user']?>" required>
            <input class="champ" type="text" id="name" placeholder="write your name" value="<?= $donnee['nom_user']?>" required>
            <input class="champ" type="text" id="first_name" placeholder="write your first_name" value="<?= $donnee['prenom_user'] ?>" required>
            <input class="champ" type="text" id="tel" placeholder="write your phone number" value="<?= $donnee['tel_user'] ?>" required>
            <input class="champ" type="text" id="Address" placeholder="write your Address" value="<?= $donnee['adresse'] ?>" required>
            <button class="btn" type="button" id="Send" value="Send" onclick="send('update')" >Update</button>
        </form>
    </div>
    <?php require 'script.php' ?>
</body>
</html>
