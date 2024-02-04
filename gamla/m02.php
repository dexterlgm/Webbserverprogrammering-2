<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Grund</title>
</head>
<body>
<h1>PHP Grund</h1>
<?php
//    Detta är en kommentar
    echo 'Detta är en sträng.</p>';
    echo 'Detta är en rubrik.</h1>';
    $skola = 'NTI Gymnasiet';
    echo '<p>Jag går på '. $skola;
    
    $tal1 = 6;
    $tal2 = 8;
    echo '<p>'.$tal1.' + '.$tal2.' = '.($tal1+$tal2).'</p>';
    
    $str = 'En liten';
    $str = $str .' sträng';
    echo $str;
    
    $webb = 'WebbServerProgrammering 1';
    echo strlen($webb);
?>
</body>
</html>