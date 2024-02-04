<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showPizza</title>
</head>
<body>
<?php

$vegpizzor = "Vegopizza<br><br>Vegokingen<br><br>Vegonajs";
$kebabpizzor = "Kebab<br><br>Kebabkingen<br><br>Kebabnajs";

if(empty($_GET['type'])){
    echo "Välj pizzatyp i <a href=choosePizza.html>menyn</a>!";
}

if(isset($_GET['type'])){
    $type = $_GET['type'];
    if($type=='veg'){
        echo "<h2><b>Vegopizzor</b></h2>";
        echo "<p>$vegpizzor</p>";
    }
    if($type=='kebab'){
        echo "<h2><b>Kebabpizzor</b></h2>";
        echo "<p>$kebabpizzor</p>";
    }
}

?>
</body>
</html>