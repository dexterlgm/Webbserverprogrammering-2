<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formhandler</title>
</head>
<body>

<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$accept = $_POST['accept'];
$submit = $_POST['submit'];

if(!isset($_POST['submit'])){
    header('location: form1.php?unauthorized');
    $unauthorized = $_GET['unauthorized'];
}elseif(!isset($_POST['accept'])){
    header('location: form1.php?notAgreed');
    $notAgreed = $_GET['notAgreed']; 
}else{
    echo "<b>Hej, $firstName!</b> Ditt efternamn är <b>$lastName</b>, 
    du är född <b>$birthday</b> och du är en <b>$gender</b>, ditt lösenord är även <b>$password</b>!";
}
?>

</body>
</html>