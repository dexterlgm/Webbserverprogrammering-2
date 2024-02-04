<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lastVisit</title>
</head>
<body>

<?php

setcookie('lastVisit',time(),time()+3600,'/');

if(isset($_COOKIE['lastVisit'])){
    echo "Välkommen tillbaka. Senast du var här var ".date('Y-m-d H:i:s', $_COOKIE['lastVisit'])."!";
}else{
    echo "Detta är första gången du besöker hemsidan. Välkommen!";
}

//var_dump($_COOKIE);

?>

</body>
</html>