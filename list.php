
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
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


   
    .image_acc
    {
        height: 25%;
        width: 25%;
        margin-left: 37%;
    }
    .image{
        width: 100%;
    }
    .liste
    {
        font-size: large;
        border-style: none;
        width: 100%;
        height: 35px;
        padding-top: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: center;
        background-color: rgb(247, 252, 253); 
    }

    .liste_link
    {
        font-size: large;
        border-style: none;
        width: 100%;
        height: 35px;
        padding-top: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: center;
    }
    .a,a{
        text-decoration: none;
        padding: 7px 20px;
        margin-left: 5px;
        border-radius: 5px;
        background-color: dodgerblue;
        color: black;
    }
    .a,a:hover{
        background-color: deepskyblue;
    }

    
</style>
<body>
    <div id="container">
        <div class="image">
            <img class="image_acc" src="img/149071.png" alt="">
        </div>
        <div class="liste" style="background-color: gray;">
            Nom | Prenom | Tel | Adresse
        </div>
        <?php
            require "connexion_DB.php";
            $sql="select id_user,nom_user, prenom_user, tel_user, adresse from user";
            $data=$conn->query($sql,PDO::FETCH_ASSOC);
            $donnee=$data->fetchAll();
            $cpt=$data->rowCount();
            
            for($i=0;$i<$cpt;$i++){
        ?>
         <div class="liste">
                <?= $donnee[$i]['nom_user'] ?> | <?= $donnee[$i]['prenom_user'] ?> | <?= $donnee[$i]['tel_user'] ?> | <?= $donnee[$i]['adresse'] ?>
                <button class="a" onclick="send(<?= $donnee[$i]['id_user'] ?>)" style="float:right; color:white; background-color:red;">Del</button> 
                <a href="update.php?id_user=<?= $donnee[$i]['id_user'] ?>" style="float:right; color:white; background-color:green; marging-right:2px;">Upd</a>

        </div>

      <?php } ?>
        <div class="liste_link">
            <a href="index.php">Home</a>

        </div>
    </div>
    <?php require "script.php"; ?>
</body>
</html>
