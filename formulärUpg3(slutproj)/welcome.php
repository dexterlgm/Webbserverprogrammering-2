<?php
session_start();
require_once 'includes\db_conn_inc.php';
if(!isset($_SESSION['loggedin'])){
    header('location: login.php?notAllowed');
    exit;
}
$userN = $_SESSION['loggedin'];

//Kollar adressen om ett inlägg ska svaras på eller om ett inlägg ska raderas
if(isset($_SERVER['QUERY_STRING'])){
    $querystring = $_SERVER['QUERY_STRING'];
    if(is_string($querystring) && $querystring != ''){
        if(str_contains($querystring, 'delete')){
            $deleteID = ltrim($querystring, 'delete'); //Trimmar bort "delete", lämnar kvar ID't av kommentaren som ska raderas
            $sqlDelete = "SELECT * FROM comments WHERE (commentID = $deleteID) ORDER BY date DESC";
            $queryDelete = mysqli_query($conn, $sqlDelete);
            if(mysqli_num_rows($queryDelete) < 1){ //Försöker man ta bort en kommentar som inte finns skickas man tillbaka
                header('location: welcome.php');
            }
            foreach($queryDelete as $deleteCheck){
                extract($deleteCheck);
                if($username == $userN){ //Kollar om användaren vars kommentar ska raderas är densamma som den inloggade användaren
                    $sqlDelete = "DELETE FROM comments WHERE (commentID = $deleteID)";
                    $query = mysqli_query($conn, $sqlDelete)
                        or die('Det gick inte att ansluta till databasen');
                    
                    $sqlDeleteReplies = "DELETE FROM comments WHERE (replyTo = $deleteID)"; //Raderar svar till det raderade inlägget
                    $query = mysqli_query($conn, $sqlDeleteReplies)
                        or die('Det gick inte att ansluta till databasen');
                    header('location: welcome.php');
                }else{
                    header('location: welcome.php'); //Om man försöker radera någon annans kommentar skickas man tillbaka
                }
            }
        }else{
            $responding = $querystring;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ='stylesheet' href='welcome.css'>
    <title>Forum</title>
</head>
<body>
    <section class="main">
        <?php
            echo "<h1>Välkommen</h1><p>Du är inloggad som: <strong>$userN</strong></p>"
        ?>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logga ut">
        </form>

        <?php
            if(isset($_POST['logout'])){
                session_destroy();
                header('location: login.php?loggedout');
            }
        ?>
        <form action="" method='post'>
            <?php
                if(!isset($responding)){
                    echo "<p><label for='comm'>Skriv ett inlägg:<br></label> <textarea class = 'textbox' name='comm' rows=10 cols=60 maxlength=700 placeholder='Inlägg' required></textarea></p>";
                }else{
                    echo "<p><label for='comm'>Svara på inlägget:<br></label> <textarea class = 'textbox' name='comm' rows=10 cols=60 maxlength=700 placeholder='Svar'></textarea></p>";
                    echo "<button name='back'>Gå tillbaka</button>";
                }
                if(isset($_POST['back'])){
                    header('location: welcome.php');
                }
            ?>
            <button type='sumbit' name='submit'>Skicka</button>
        </form>
    </section>

<section class="messages">
    <?php
        if(isset($_POST['submit'])){
            $comment = $_POST['comm'];

            $sql = "INSERT INTO comments (username, comment, date, replyTo) VALUES ('$userN', '$comment', NOW(), '$responding')";
            $query = mysqli_query($conn, $sql)
                or die('Det gick inte att ansluta till databasen');
            header('location: welcome.php'); //Förhindrar formuläret från att skickas en gång till om man laddar om sidan
        }
        
        $sql = "SELECT * FROM comments WHERE (replyTo IS NULL or replyTo = 0) ORDER BY date DESC";
        $sqlReply = "SELECT * FROM comments WHERE (replyTo > 0) ORDER BY date ASC";

        $query = mysqli_query($conn, $sql);
        $queryReply = mysqli_query($conn, $sqlReply);

        foreach($query as $userComment){//Hämtar inlägg
            extract($userComment);
            $commentID2 = $commentID;
            if($userN == $username){
                echo    "<section class='commentsection'>
                            <header>$username<h5 id='date'>$date</h5><a class='replybtn' href='welcome.php?$commentID'>Svara</a><a href='welcome.php?delete$commentID' class='deletebtn'>Radera</a></header>
                            <p class='comment'>$comment</p>
                        </section>";
            }else{
                echo    "<section class='commentsection'>
                <header>$username<h5 id='date'>$date</h5><a class='replybtn' href='welcome.php?$commentID'>Svara</a></header>
                <p class='comment'>$comment</p>
            </section>";
            }
            foreach($queryReply as $userReply){//Hämtar svar på inlägg
                extract($userReply);
                if($replyTo == $commentID2 && $userN == $username){
                    echo    "<section class='commentreply'>
                    <header>$username<h5>$date</h5><a class='deletebtn' href='welcome.php?delete$commentID'>Radera</a></header>
                    <p class='comment'>$comment</p>
                </section>";
                }elseif($replyTo == $commentID2){
                    echo    "<section class='commentreply'>
                    <header>$username<h5>$date</h5></header>
                    <p class='comment'>$comment</p>
                </section>";
                }
            }
        }
        mysqli_close($conn);
    ?>
</section>

</body>
</html>