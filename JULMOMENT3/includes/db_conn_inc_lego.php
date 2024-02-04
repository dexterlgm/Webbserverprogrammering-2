<?php 

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'julmoment3';

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}//else{
//    print "<p>Det fungerade!</p>";
//}

?>