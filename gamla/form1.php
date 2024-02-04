<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form1</title>
</head>
<body>

<form action="formhandler.php" method='post'>
    <p><label for='firstName'>Förnamn:</label>
    <input type='text' name='firstName' required placeholder='Skriv ditt namn'></p><br>
    
    <p><label for='lastName'>Efternamn:</label>
    <input type='text' name='lastName' required placeholder='Skriv ditt efternamn'></p><br>

    <p><label for='password'>Lösenord:</label>
    <input type='password' name='password' required placeholder='Lösenord'></p><br>

    <p><label for='birthday'>Födelsedag:</label>
    <input type='date' name='birthday'></p><br>

    <fieldset>
    <legend>Kön:</legend>
    <label for='kvinna'>Kvinna<input type='radio' name='gender' value='female'><br>
    <label for='man'>Man<input type='radio' name='gender' value='man'></p>
</fieldset>

    <p><label><input type='checkbox' name='accept'>Jag godkänner..</label></p>
    
    <?php
if(isset($_GET['unauthorized'])){
    echo "<p>Du måste fylla i och skicka formuläret först!</p>";
}elseif(isset($_GET['notAgreed'])){
    echo "<p>Du måste acceptera villkoren innan du kan gå vidare!</p>";
}
?>

    <p><input name = 'submit' type='submit' value='Send'><input type='reset' name='reset' value='Reset'></p>

</form>
</body>
</html>