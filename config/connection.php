<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "student_info";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    die("Erorr: Couden't connect to the database.");
}

?>