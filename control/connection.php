<?php 
$hostname = "localhost";
$username = "";
$password = "";
$database = "job";

$conn = mysqli_connect($hostname, $username, $password);

if(!$conn){
    die("Erorr: Couden't connect to the database.");
}

?>