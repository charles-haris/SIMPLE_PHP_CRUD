<?php
$servername = "localhost";
$username = "root";
$password = "root";
$message = "";
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

//update

if(isset($_POST['Send']))
{
    $sql="Update user set nom_user=:nom_user,
    prenom_user=:prenom_user, tel_user=:tel_user, adresse=:adresse where id_user=:id_user";
    $update=$conn->prepare($sql);
    $update->bindParam(":nom_user",$_POST['name']);
    $update->bindParam(":prenom_user",$_POST['first_name']);
    $update->bindParam(":tel_user",$_POST['tel']);
    $update->bindParam(":adresse",$_POST['address']);
    $update->bindParam(":id_user",$_GET['id_user']);

    if($update->execute())
    {
        $message="updated";
       // header("location:list.php");
    }

}
//printing of different details
$data=$conn->query("select id_user,nom_user,prenom_user,tel_user,Adresse from user where id_user=".$_GET['id_user'],PDO::FETCH_ASSOC);

/*  foreach ($data->fetch() as $key => $value) {
    echo $value." - ";
 } */
 $nom="";
 $prenom="";
 $tel="";
 $adresse="";


 if ($data) {
	// show the publishers
	foreach ($data as $d) {
		$nom=$d['nom_user'];
		$prenom=$d['prenom_user'];
		$tel=$d['tel_user'];
        $adresse=$d['Adresse'];

	}
}

 //$aff=$data->fetchAll();
 //var_dump($aff);

/* $data->bindColumn('id_user',$id);
$data->bindColumn('nom_user',$nom);
$data->bindColumn('prenom_user',$prenom);
$data->bindColumn('tel_user',$tel);
$data->bindColumn('Adresse',$adr);*/

?>
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
        <form action="" method="post">
            <input class="champ" type="text" name="name" id="" placeholder="write your name" value="<?php echo $nom; ?>" required>
            <input class="champ" type="text" name="first_name" id="" placeholder="write your first_name" value="<?php echo $prenom; ?>" required>
            <input class="champ" type="text" name="tel" id="" placeholder="write your phone number" value="<?php echo $tel; ?>" required>
            <input class="champ" type="text" name="address" id="" placeholder="write your Address" value="<?php echo $adresse; ?>" required>
            <input class="btn" type="submit" name="Send" value="Send">
        </form>
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

            const myTimeout = setTimeout(succed, 500);

            function succed() {
                Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your data has been saved !!!',
            showConfirmButton: false,
            timer: 2000,
            },
            )           
         }
         const yourTimeout = setTimeout(Tsucced, 3000);

            function Tsucced() {
           window.location.href="list.php"          
         }



     </script>
     
<?php } ?>


