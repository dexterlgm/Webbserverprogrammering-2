<?php session_start();

require_once 'includes\db_conn_inc_forum.php';

//Kod för att kolla om man redan är inloggad
if(isset($_SESSION['loggedin'])){
    header('location: forum.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forumlogin</title>
</style>
</head>
<body>
    <form action="forumlogin.php" method='post'>
        <p><label for='username'>Användarnamn:<br></label>
            <input type='text' name='username' required placeholder='Användarnamn'></p>

        <p><label for='password'>Lösenord:<br></label>
            <input type='password' name='password' required placeholder='Lösenord'></p>

        <p><label for='val'><p>Logga in:</p><input type='radio' name='val' value='login' required></p>
        
            <input name ='submit' type='submit' value='Send'>
    </form>
<?php

//Kod för felmeddelanden
if(isset($_GET['unauthorized'])){
    echo "<p>Fel användarnamn eller lösenord!</p>";
    }elseif(isset($_GET['exists'])){
        echo"<p>Detta konto finns redan!</p>";
    }elseif(isset($_GET['notAllowed'])){
        echo "<p>Du måste logga in ordentligt!</p>";
    }elseif(isset($_GET['loggedOut'])){
        echo "<p>Du är nu utloggad!</p>";
    }elseif(isset($_SESSION["loggedin"])){
        header('location:forumlogin.php');
}

//Kod för att logga in
if(isset($_POST['submit'])){
    $usern = $_POST['username'];
    $passw = $_POST['password'];

    $sql = "SELECT * FROM forumusers WHERE userna = '$usern' && passwo = '$passw'";
    $query = mysqli_query($conn, $sql);

    //Kod som kollar mot databasen om kontouppgifterna användaren använt finns
    if(mysqli_num_rows($query) == 1){
        $_SESSION['loggedin'] = $_POST['username'];
        header('location: forum.php');
    }else{ //Felmeddelande
        header('location: forumlogin.php?unauthorized');
    }
}
        
//var_export($_POST);
//print_r($_SESSION);
//var_export($_GET);
?>
</body>
</html>