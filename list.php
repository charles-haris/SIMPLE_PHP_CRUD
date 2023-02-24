<?php
$servername = "localhost";
$username = "root";
$password = "root";
$message="";
try
{
    $conn = new PDO("mysql:host=$servername;dbname=patient", $username, $password);
    // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connected successfully"; 
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();

}

if(isset($_GET['id_user'])){
    $verify_data=$conn->query("select id_user from user where id_user=".$_GET['id_user'],PDO::FETCH_BOUND);
    $compte=$verify_data->rowCount();

    if($compte>0){
        $sql="Delete from user where id_user=".$_GET['id_user'];
        $del=$conn->query($sql);
        if($del->execute()){
            $message="deleted";
        }
    } 
}

$data=$conn->query("select id_user,nom_user,prenom_user,tel_user,Adresse from user",PDO::FETCH_BOUND);

/*  foreach ($data->fetch() as $key => $value) {
    echo $value." - ";
 } */

 $compte=$data->rowCount();

 $data->bindColumn('id_user',$id);
$data->bindColumn('nom_user',$nom);
$data->bindColumn('prenom_user',$prenom);
$data->bindColumn('tel_user',$tel);
$data->bindColumn('Adresse',$adr);





?>
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
    a{
        text-decoration: none;
        padding: 7px 20px;
        margin-left: 5px;
        border-radius: 5px;
        background-color: dodgerblue;
        color: black;
    }
    a:hover{
        background-color: deepskyblue;
    }
    
</style>
<body>
    <div id="container">
        <div class="image">
            <img class="image_acc" src="img/149071.png" alt="">
        </div>
        <div class="liste">
            Nom | Prenom | Tel | Adresse
        </div>
      <?php   while ($data->fetch()){ ?>
        <div class="liste">
            <?php echo "$nom | $prenom | $tel | $adr" ?>
            <a href="list.php?id_user=<?php echo $id; ?>" style="float:right; color:white; background-color:red;">Del</a> 
            <a href="update.php?id_user=<?php echo $id; ?>" style="float:right; color:white; background-color:green; marging-right:2px;">Upd</a>

        </div>
        <?php }?>
        <div class="liste_link">
            <a href="index.html">Home</a>

        </div>
    </div>
</body>
</html>
<?php if($message!=""){ ?>
    <script>
    //     Swal.fire(
    //         'Good job!',
    //         'You clicked the button!',
    //         'success'
    //     )
    
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'User deleted !!!',
            showConfirmButton: false,
            timer: 2000,
            },
            )


     </script>
     
<?php } ?>