<?php
session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

<form action="process.php" method='post'>
    <p><label for='username'>Användarnamn:<br></label>
    <input type='text' name='username' required placeholder='Användarnamn'></p>

    <p><label for='password'>Lösenord:<br></label>
    <input type='password' name='password' required placeholder='Lösenord'></p>

    <input name = 'submit' type='submit' value='Send'>
</form>

<?php
if(isset($_GET['unauthorized'])){
    echo "<p>Fel användarnamn eller lösenord!</p>";
}elseif(isset($_GET['notAllowed'])){
    echo "<p>Du måste logga in ordentligt!</p>";
}elseif(isset($_GET['loggedOut'])){
    echo "<p>Du är nu utloggad!</p>";
}elseif(isset($_SESSION['loggedin'])){
    header('location:welcome.php');
}

var_export($_POST);
var_export($_SESSION);
var_export($_GET);

?>

</body>
</html>