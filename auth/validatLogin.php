<?php 
    if(empty($_POST["username"])){
        $usernameErr = "User name is required.";
        $isError = true;

    }else{
        $username = test_input($_POST["username"]);
    }

    if(empty($_POST["password"])){
        $passwordErr = "Password is required.";
        $isError = true;

    }else{
        $password = test_input($_POST["password"]);
    }


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>