<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kakor</title>
</head>
<body>

<form method='post'>
<fieldset>
    <legend><p>Mode:</p></legend>
    <label for='mode'><p>Lightmode:</p><input type='radio' name='mode' value='light'>
    <label for='mode'><p>Darkmode:</p><input type='radio' name='mode' value='dark'>
</fieldset>

<input name = 'submit' type='submit' value='Välj'>

</form>
<?php

$mode2 = '';

if(isset($_POST['mode'])){
    $mode1 = $_POST['mode'];
    if($mode1=='dark'){
        setcookie('mode','dark',time()+3600*24,'/');
        header('refresh:0');
    }
    elseif($mode1='light'){
        setcookie('mode','light',time()+3600*24,'/');
        header('refresh:0');
    }
}

if(isset($_COOKIE['mode'])){
    $mode2 = $_COOKIE['mode'];
}

$textfärg = '';
$bakgrund = '';

if((isset($mode2) and $mode2 =='light')){
    $bakgrund = '#F8F4F8';
    $textfärg = '#000000';
    echo "<p>Du har valt lightmode!</p>";
}elseif((isset($mode2) and $mode2 =='dark')){
    $bakgrund = '#4d4d4d';
    $textfärg = '#F3F1F9';
    echo "<p>Du har valt darkmode!</p>";
}else{
    $bakgrund = '#F8F4F8';
    $textfärg = '#000000';
    echo "<p>Du har ej valt ett läge, så du får lightmode!";
}



//var_dump($_COOKIE);

//var_dump($_POST);

?>
    <style>

body {
    background-color: <?php echo $bakgrund; ?>;
}

p {
    font-family: sans-serif;
    color: <?php echo $textfärg; ?>;
}
</style>

</body>
</html>