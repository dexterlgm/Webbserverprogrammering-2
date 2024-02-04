<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Index</title>
</head>
<body>
    <form action="legosets.php" method="post">
        <label for=firstName>Förnamn</label>
        <input type="text" name="firstName">
        <input type="submit" name="submit" value="Skicka">
    </form>    

    <?php
        if(isset($_GET['notAllowed'])){
            echo "<p>Vänligen fyll i formuläret för att fortsätta till legosidan</p>";
        }
    ?>
</body>
</html>