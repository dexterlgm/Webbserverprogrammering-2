<?php session_start();

require_once 'includes\db_conn_inc_forum.php';

//Kod för att testa om man loggat in ordentligt
if((isset($_SESSION["loggedin"]))){
    echo "<h3>Välkommen till hemsidan!</h3>";
    echo "<p>Du är inloggad som: <b>".$_SESSION["loggedin"]."</b>!</p>";
    }else{
        header('location:forumlogin.php?notAllowed');
}

$userna = $_SESSION['loggedin'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ='stylesheet' href='forum.css'>
    <title>forum</title>

<body>

<form action='forum.php'method='post'>
<input name = 'logout' type='submit' value='Logga ut'>
</form>

<?php

//Utloggningsknapp
if(isset($_POST['logout'])){
    session_unset();
    header('location: forumlogin.php?loggedOut');
}
?>

<form action="forum.php" method='post'>
    <p><label for='comm'>Kommentar:<br></label> <textarea name='comm' rows="5" cols="100"  placeholder='Kommentar' required></textarea></p>
    <button type='sumbit' name='skicka'>Skicka</button>
</form>

<?php

//Kod för att skicka kommentarer
if(isset($_POST['skicka'])){
    $anvcomm = $_POST['comm'];

    $sql = "INSERT INTO forumcomments VALUES ('$anvcomm', '$userna', NOW(), NULL, NULL)";

    $query = mysqli_query($conn, $sql)
       or die("Det gick inte att ansluta till databasen");
    
    echo "<p><strong>Tack för ditt inlägg $userna.</strong></p>";

    header('location: forum.php');
}

//Kod för att visa de kommentarer som redan finns
$sql = "SELECT * FROM forumcomments order by date desc";

$query = mysqli_query($conn, $sql);

//Extraherar och visar de kommentarer som finns
foreach($query as $usercomment){
    extract($usercomment);
    echo    "<section>
            <header class=namn>$userN $date</header>
            <h5>$comment<h5>
        </section><br>";
}

//var_export($_POST);
//var_export($_SESSION);
//var_export($_GET);
?>
</body>
</html>