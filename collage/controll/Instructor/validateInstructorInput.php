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


    if(empty($_POST["txtAddress"]))
    {
        $error["txtAddressErr"] = "Address is required.";
        $isValid = false;
    }
    else{
        $txtAddress = test_input($_POST["txtAddress"]);
    }// End else



    if(empty($_POST["txtMobile"]))
    {
        $error["txtMobileErr"] = "Mobile is required.";
        $isValid = false;
    }
    else{
        $txtMobile = test_input($_POST["txtMobile"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9-(-)- ]*$/", $txtMobile)){
            $error["txtMobileErr"] = "Only numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else


    if(empty($_POST["gender"]))
    {
        $error["genderErr"] = "Gender is required";
    }
    else{
        $gender= test_input($_POST["gender"]);
    }// End else

    if(empty($_POST["BirthDate"]))
    {
        $error["BirthDateErr"] = "Birth date is required";
    }
    else{
        $BirthDate= test_input($_POST["BirthDate"]);
    }// End else




}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
