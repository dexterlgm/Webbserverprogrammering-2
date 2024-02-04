<?php
    //echo var_export($_POST);

    if(!isset($_POST['submit'])){
        header('location: form_send.php?unauthorized');
    }elseif(!isset($_POST['agreeBox'])){
        header('location: form_send.php?notAgreed');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $date = $_POST['dateOfBirth'];
    $pwd = $_POST['password'];

    echo "<p><strong>Tjena $firstname $lastname!</strong>
    Ditt kön är väl $gender och du fyller år $date?
    Det viste jag om. Jag vet också att ditt lösenord är $pwd!</p>"
?>    


</body>
</html>