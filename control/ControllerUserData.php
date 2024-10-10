<?php 
session_start();
require("../config/connection.php");
$isError=false;
$db_error="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //User login
    if(isset($_POST["login"])){
        $username=$password=$user_type="";
        $usernameErr=$passwordErr=$user_typeErr="";
        $isError = false;

        require("../config/validatLogin.php");
        if(!$isError){
            if($_POST["user_type"]=="Employer"){
                $query = "SELECT*FROM users WHERE username='$username' AND "."password='$password'";
                // var_dump($query);
                $res = mysqli_query($conn, $query);
                if(!$res){
                    die('<script> alert("Error:Coud not access database.");</script>');
                }
                $result_set= mysqli_fetch_all($res, 1);
                print_r($result_set);
                print(count($result_set));
                
                if(count($result_set) !=0){
                    $_SESSION['username'] = $username;
                    $_SESSION["password"] = $password;
                    print($_SESSION["username"]);
                    //echo '<script> alert("{$_SEETION["username"]} loged in sacessfuly.");</script>';
                    header('Location: ../collage/index.php');
                    //exit();//die() 
                    
                }
                else{
                    echo '<script> alert("Error username or password.");</script>';
                    $db_error = "Error username or password.";
                    $isError=true;
                }
            }//End if

        }


    }
    
}
//var_dump($error);



?>