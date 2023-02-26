<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
    }
    .image{
        width: 100%;
    }
    
</style>
<body>
    <div id="container">
        <div class="image">
            <img class="image_acc" src="img/149071.png" alt="">
        </div>
        <h3 style="text-align: center;" >Add User</h3>
        <form autocomplete="off" action="" method="post">
            <input class="champ" type="text" id="name" placeholder="write your name" required>
            <input class="champ" type="text" id="first_name" placeholder="write your first_name" required>
            <input class="champ" type="text" id="tel" placeholder="write your phone number" required>
            <input class="champ" type="text" id="Address" placeholder="write your Address" required>
            <button class="btn" type="button" onclick="send('insert')">Insert</button>
        </form>
    </div>
    <?php require 'script.php' ?>
</body>
</html>
