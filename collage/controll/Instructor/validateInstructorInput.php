<?php 

// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtFirstName"]))
    {
        $error["txtFirstNameErr"] = "First Name is required.";
        $isValid = false;
    }
    else{
        $txtFirstName = test_input($_POST["txtFirstName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtFirstName)){
            $error["txtFirstNameErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtLastName"]))
    {
        $error["txLastNameErr"] = "Last Name is required.";
        $isValid = false;
    }
    else{
        $txtLastName = test_input($_POST["txtLastName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtLastName)){
            $error["txtLastNameErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else


    if(empty($_POST["department"]))
    {
        $error["department"] = "Department is required";
    }
    else{
        echo $_POST["department"];
        $department= $_POST["department"];
    }// End else

        // Email validation
    if (empty($_POST["email"])) {
        $error["emailErr"] = "Email is required.";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error["emailErr"] = "Invalid email format.";
            $isValid = false;
        }
    }




}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
