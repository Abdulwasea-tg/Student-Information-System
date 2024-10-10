<?php 
require("../control/ControllerUserData.php");
/* 
$username=$password="";
$usernameErr=$passwordErr="";
$isError = false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["username"])){
        $usernameErr = "User name is required.";
        $isError = true;

    }else{
        $username = test_input($_POST["username"]);
    }

    if(empty($_POST["password"])){
        $passwordErr = "Password is required.";

    }else{
        $password = test_input($_POST["password"]);
    }

    if(!$isError){
        header('Location: ../Employer/index.php');
        exit("go to employer");//die() 
        

    }
    else{
        die("ther is error cant reach header errorpass:  $passwordErr and unameerror:$usernameErr" );
    }



} */
/* function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} */



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        .container{
            width: 50%;
            margin: auto;
            margin-left: 25%;
            color: #212529;
            font-family:16px "Muli",sans-serif;
            color: #0b1c39;
            font-style: normal;
            font-weight: 500;
            
            
        }
        table td,table{
            background-color: #fff;
            border: none;
        }
        table{border:2px solid #f9f9ff ;
        box-shadow:0.80 0 0 0.80;}


        input,select{
            width: 100%;
            font-size: 16px;
            background-color: #f9f9ff;
            line-height:40px ;
            border:none;
            border-radius: 4px;
            padding: 0px 20px;
            
            
        }
    </style>

</head>
<body>
    <!-- header -->
    <?php include("header.php") ?>
    <!-- side -->
    <?php include("side.php") ?>

    <!-- center -->
    <div class="center">
        <!-- titel -->
        <span class="titel">
            <i class="icon">add icon</i>
            <h3>Login</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form action="login.php" method="post"  >
                <?php 
                if(!$isError){

                    echo '<p><span class="error">Error in input field !</span></p>';
                    /* $isError=false; */
                }
                ?>
                    <table>
                        <tr><td>User Name</td></tr>
                        <tr><tr></tr><td><input type="text" name="username" id="uname" placeholder="Username" ></td></tr>
                        <tr><td>Password</td></tr>
                        <tr><td><input type="password" name="password" id="password" placeholder="Password" required></td></tr>
                        <tr><td>Select User Type</td></tr>
                        <tr>
                        <td>
                            <select name="user_type" id="user_type">
                                <option value="Employer">Employer</option>
                                <option value="JobSeeker">JobSeeker</option>
                                <option value="Admin">Admin</option>
                            </select>

                        </td>
                        </tr>
                        <tr><td><input type="submit" name="login" id="login" value="login"></td></tr>
                        <tr><td>Dont have account?<a href="employeReg.php" style="color:blue">Registe</a></td></tr>
                    </table>


                </form>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>