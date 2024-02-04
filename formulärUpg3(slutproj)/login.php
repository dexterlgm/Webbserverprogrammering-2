<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Login</title>
</head>
<body>
    <h1>Logga in</h1>
    <form action="process.php" method="post">
        <label for="username">Användarnamn:</label><br>
        <input type="text" name="username" required><br>
    
        <label for="password">Lösenord:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="submit" value="Logga in">
    </form>

<h4>Inget konto? <strong><a href='register.php'>Registrera dig!</a></strong></h4>

<?php
    if(isset($_GET['unauthorized'])){
        echo "<p><strong>Fel användarnamn eller lösenord.</strong><p>";
    }elseif(isset($_GET['notAllowed'])){
        echo "<p><strong>Logga in för att fortsätta.</strong></p>";
    }elseif(isset($_GET['loggedout'])){
        echo "<p><strong>Du har blivit utloggad.</strong></p>";
    }elseif(isset($_GET['created'])){
        echo "<p><strong>Ditt konto är skapat. Logga in för att fortsätta.</strong></p>";
    }
?>
</body>
</html>