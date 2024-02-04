<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comments</title>

    <style>
.comments { 
    border: solid;
    border-color: black;
    background-color:beige;
    height: 80px;
    border-radius: 10px;
}

.namn {
    text-decoration: underline;
}
</style>
</head>
<body>

<form action="" method='post'>
    <p><label for='firstname'>Förnamn:<br></label> <input type='text' name='firstname'  placeholder='Förnamn' required></p>
    <p><label for='lastname'>Efternamn:<br></label> <input type='text' name='lastname'  placeholder='Efternamn' required></p>
    <p><label for='comment'>Kommentar:<br></label> <textarea name='comment' rows="5" cols="50"  placeholder='Kommentar' required></textarea></p>
    <button type='sumbit' name='sumbit'>Skicka</button>
</form>

<?php

require_once 'includes/db_conn_inc.php';

if(isset($_POST['sumbit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO tblusers VALUES ('$firstname', '$lastname', '$comment', NULL, NOW())";

    $query = mysqli_query($conn, $sql)
        or die("Det gick inte att ansluta till databasen");
    
    echo "<p><strong>Tack för ditt inlägg $firstname.</strong></p>";
}

$sql = "SELECT * FROM tblusers ORDER BY date DESC";

$query = mysqli_query($conn, $sql);

foreach($query as $usercomment){
    extract($usercomment);
    echo    "<h4 class=comments><section>
                <header class=namn>$firstname $date</header>
                <h5>$comment<h5>
            </section></h4>";
}

mysqli_close($conn);
?>

</body>
</html>