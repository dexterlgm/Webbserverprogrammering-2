<?php
session_start();
require_once 'includes\db_conn_inc.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $passW = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_row($query);
        $hashed_password = $row[1];//Hämtar det krypterade lösenordet som tillhör det inskrivna användarnamnet 

        if(password_verify($passW, $hashed_password)){//Kollar om det inskrivna lösenordet matchar det krypterade lösenordet i databasen
            $_SESSION['loggedin'] = $_POST['username'];
            header('location: welcome.php');
            exit;
        }else{//Lösenordet är fel
            header('location: login.php?unauthorized');
            exit;
        }
    }else{//Användarnamnet finns ej i databasen
        header('location: login.php?unauthorized');
        exit;
    }
}else{//Försöker komma åt sidan utan att logga in
    header('location: login.php?notAllowed');
    exit;
}        
?>