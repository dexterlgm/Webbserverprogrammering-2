<?php
session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>process</title>
</head>
<body>

<?php

if((isset($_POST['username'])) && isset($_POST['password'])){
    if((($_POST['username'])=="namn") && ($_POST['password'])=="lös"){
        header('location:welcome.php');
        $_SESSION['loggedin']=$_POST['username'];
    }elseif(isset($_SESSION['loggedin'])){
        header('location:welcome.php');
    }else{
        header('location:login.php?unauthorized');
    }
}else{
    header('location: login.php?notAllowed');
}

//var_export($_POST);
//var_export($_GET);
//var_export($_SESSION);
?>
</body>
</html>