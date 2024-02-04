<?php
session_start();

if(!isset($_SESSION['loggedin'])){
   header('location:login.php?notAllowed');
}else{
    echo "<h3>Välkommen till hemsidan!</h3>";
    echo "<p>Du är inloggad som: <b>".$_SESSION['loggedin']."</b>!</p>";
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>

<form action='welcome.php'method='post'>
<input name = 'logout' type='submit' value='Logga ut'>
</form>

<?php

if(isset($_POST['logout'])){
    session_unset();
    header('location: login.php?loggedOut');
}

//var_export($_POST);
//var_export($_GET);
//var_export($_SESSION);
?>
</body>
</html>