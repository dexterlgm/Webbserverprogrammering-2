<?php
    session_start();
    require_once 'includes\db_conn_inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Simon</title>
</head>
<body>
    <audio id="rSound" src="https://s3.amazonaws.com/freecodecamp/simonSound1.mp3"></audio>
    <audio id="gSound" src="https://s3.amazonaws.com/freecodecamp/simonSound2.mp3"></audio>
    <audio id="bSound" src="https://s3.amazonaws.com/freecodecamp/simonSound3.mp3"></audio>
    <audio id="ySound" src="https://s3.amazonaws.com/freecodecamp/simonSound4.mp3"></audio>
    <audio id="incorrectSound" src="http://www.freesound.org/data/previews/331/331912_3248244-lq.mp3"></audio>

    <section class="game">
        <h3 class="rounds">Runda: </h3>
        <div class="r"></div>
        <div class="g"></div>
        <div class="b"></div>
        <div class="y"></div>
    <?php
        $sql = "SELECT * FROM simon ORDER BY rounds DESC LIMIT 10";
        $query = mysqli_query($conn, $sql);

        echo "<section class='leaderboard'>
            <h3>Leaderboard</h3>";
        foreach($query as $leaderboard){
            extract($leaderboard);
            echo "<p><strong>$username: $rounds</strong>st rundor</p>";
        }
        echo "</section>";

    ?>
    </section>
    <section class="formbox">
        <p>Spara rekord?*OBS* Ej funktionell</p>
        <form action="" method='post'>
            <input type='text' name = 'name' placeholder='Namn'><br><br>
            <button type='sumbit' name='submit' id="submitBtn">Skicka</button>
            <button type='sumbit' name='playagain'>Spela igen</button>
        </form>
    </section>

    <?php
        if(isset($_POST['playagain'])){
            header('location: index.php');
        }
        if(isset($_POST['submit'])){
            header('location: index.php');   
        }
    ?>
    <div class="newgame">
        <h1>New Game</h1>
    </div>
    <div class="wait">
        <h2>Vänta...</h2>
    </div>
<script src="index.js"></script>
</body>
</html>