<?php
session_start();

//if(!isset($_SESSION['loggedin'])){
//    header('location:banklogin.php?notAllowed');
//}

require_once 'includes/db_conn_inc_bank.php';

$balance = 0;
$listOfTransactions = "";
$date = "";

$sql = "SELECT * FROM transactions order by date desc";

$query = mysqli_query($conn, $sql);

foreach($query as $arr){
    extract($arr);
    $balance += $transaction;
}

foreach($query as $arr){
    extract($arr);
    $listOfTransactions .= "<p>$transaction kr. Datum: $date</p>";
}

if(isset($_POST['submit'])){
    if($_POST['tag'] == 'deposit'){
        $amount = $_POST['amount'];
    }else{
        $amount -= $_POST['amount'];
    }    

    $sql = "INSERT INTO transactions VALUES ($amount, NOW())";

    $query = mysqli_query($conn, $sql);

    header('location: bank.php');
}
    
//    if((isset($_POST['username'])) && isset($_POST['password'])){
//        if((($_POST['username'])=="namn") && ($_POST['password'])=="lös"){
//            header('location:welcome.php');
//            $_SESSION['loggedin']=$_POST['username'];
//        }elseif(isset($_SESSION['loggedin'])){
//            header('location:bank.php');
//        }else{
//            header('location: banklogin.php?unauthorized');
//        }
//    }else{
//        header('location: banklogin.php?notAllowed');
//    }

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='bank.css'>
    <title>bank</title>
</head>
<body>


<section>
    <form action="bank.php" method='post'>
        <h2>Ta ut/Sätt in</h2><input type='number' name='amount' placeholder='Belopp'>
        <p>Uttag</p><input type='radio' name='tag' value='withdraw' required checked>
        <p>Insättning</p><input type='radio' name='tag' value='deposit'>
        <p><input type='submit' name="submit" value='Submit'></p>
        <p><input type='submit' name="logout" value='Logga ut'></p>
    </form>
</section>

<section id='balancetransaction'>
    <?php
        echo "<p>Balance: " . $balance . " kr</p>";
        echo "<p>List of transactions: </p>" . "$listOfTransactions";
    ?>
</section>

<?php 
if(isset($_POST['logout'])){
    session_unset();
    header('location: banklogin.php?loggedOut');
}

echo ".$conn.";

var_export($_POST); 
var_export($_SESSION);
var_export($_GET);
?>
</body>
</html>