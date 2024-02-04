<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Register</title>
</head>
<body>
    <h1>Registrera dig</h1>
    <form action="registerprocess.php" method="post">
        <label for="username">Användarnamn:</label><br>
        <input type="text" name="username" required><br>
    
        <label for="password">Lösenord:</label><br>
        <input type="password" name="password" required><br><br>

        <label for="confirmPassword">Bekräfta lösenord:</label><br>
        <input type="password" name="confirmPassword" required><br><br>

        <input type="submit" name="submit" value="Registrera">
    </form>

<h4>Har du redan ett konto? <strong><a href='login.php'>Logga in!</a></strong></h4>

<?php
    if(isset($_GET['noMatch'])){
        echo "<p><strong>Lösenorden matchar ej. Försök igen.</strong><p>";
    }elseif(isset($_GET['taken'])){
        echo "<p><strong>Användarnamnet är redan taget.</strong><p>";
    }
?>
</body>
</html>