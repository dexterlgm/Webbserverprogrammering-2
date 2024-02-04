<?php
    $server = "localhost";
    $user = "root";
    $passwors = "";
    $db = "legodatabase";


    $conn = mysqli_connect($server, $user, $passwors, $db);

    if(!$conn){
        die('Connection to database failed. '.mysqli_connect_error());
    }

    $sql = "SELECT * FROM legosets";

    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Legosets</title>
</head>
<body>
    <?php    

        if(!isset($_POST['submit'])){
            header('location: index.php?notAllowed');
        }else{
            echo "Hej, ".$_POST['firstName'];
        }

        $i = 1;
        foreach($query as $legoitem){
            echo "<p><span>".$i."</span> ".$legoitem['name'].", ".$legoitem['articleID']."</p>";
            $i++;
        }


    ?>
</body>
</html>