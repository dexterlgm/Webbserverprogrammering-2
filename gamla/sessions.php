<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sessions</title>
</head>
<body>

<?php

if(!isset($_SESSION['count'])){
    $_SESSION['count']=1;
    $sessioncount = $_SESSION['count'];
    echo "<h2>Antalet gånger du besökt sidan:</h2>";
    echo "<b>$sessioncount</b>";
}elseif(isset($_SESSION['count'])){
    $_SESSION['count'] = $_SESSION['count'] + 1;
    $sessioncount = $_SESSION['count'];
    echo "<h2>Antalet gånger du besökt sidan:</h2>";
    echo "<b>$sessioncount</b>";
}

if(isset($_POST['sumbit'])){
    unset($_SESSION['count']);
    header('refresh:0');
}

//var_export($_SESSION);
//var_export($_POST);
?>
<form method='post'>
<input name = 'sumbit' type='submit' value='Återställ'>
</form>
<?php

?>
</body>
</html>