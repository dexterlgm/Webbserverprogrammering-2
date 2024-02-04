<?php
session_start();
require_once 'includes\db_conn_inc.php';

if(isset($_POST['submit'])){
    $userN = $_POST['username'];
    $passW = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($passW == $confirmPassword){
        $sql = "SELECT * FROM users WHERE username = '$userN'";
        $query = mysqli_query($conn, $sql);
    }else{
        header('location: register.php?noMatch');
        exit;
    }

    if(mysqli_num_rows($query) < 1){
        $hashed_password = password_hash($passW, PASSWORD_DEFAULT);//Krypterar lösenordet med bcrypt
        $sql = "INSERT INTO users (username, password) VALUES ('$userN','$hashed_password')";
        $query = mysqli_query($conn, $sql)
            or die('Det gick inte att ansluta till databasen');
        header('location: login.php?created');
        exit;
    }else{//Användarnamnet är redan taget
        header('location: register.php?taken');
        exit;
    }
}else{//Försöker komma åt sidan utan att fylla i formuläret
    header('location: register.php');
    exit;
}
?>