<?php
if(empty($_POST["txtComName"]))
    {
        $error["txtComNameErr"] = "Company name is required.";
        $isError = true;
    }
    else{
        $txtComName = test_input($_POST["txtComName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtComName)){
            $error["txtComNameErr"] = "Only latters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtContactPerson"]))
    {
        $error["txtContactPersonErr"] = "Contact person is required.";
        $isError = true;
    }
    else{
        $txtContactPerson = test_input($_POST["txtContactPerson"]);
        // check if Contact person name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtContactPerson)){
            $error["txtContactPersonErr"] = "Only latters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtAddress"]))
    {
        $error["txtAddressErr"] = "Address is required.";
        $isError = true;
    }
    else{
        $txtAddress = test_input($_POST["txtAddress"]);
    }// End else

    if(empty($_POST["txtCity"]))
    {
        $error["txtCityErr"] = "City is required.";
        $isError = true;
    }
    else{
        $txtCity = test_input($_POST["txtCity"]);
        // check if city name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtCity)){
            $error["txtCityErr"] = "Only latters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtEmail"]))
    {
        $error["txtEmailErr"] = "E-mail is required.";
        $isError = true;
    }
    else{
        $txtEmail = test_input($_POST["txtEmail"]);
        // // check if e-mail address is well-formed
        if(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
            $error["txtEmailErr"] = "Invalid e-mail address!";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtMobile"]))
    {
        $error["txtMobileErr"] = "Mobile is required.";
        $isError = true;
    }
    else{
        $txtMobile = test_input($_POST["txtMobile"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9- ]*$/", $txtMobile)){
            $error["txtMobileErr"] = "Only numbers and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtAOW"]))
    {
        $error["txtAOWErr"] = "Area of work is required.";
        $isError = true;
    }
    else{
        $txtAOW = test_input($_POST["txtAOW"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtAOW)){
            $error["txtAOWErr"] = "Only letters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    
    if(empty($_POST["txtUname"]))
    {
        $error["txtUnameErr"] = "Username is required.";
        $isError = true;
    }
    else{
        $txtUname = test_input($_POST["txtUname"]);
        // check if username only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtUname)){
            $error["txtUnameErr"] = "Only letters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtPassword"]))
    {
        $error["txtPasswordErr"] = "Password is required.";
        $isError = true;
    }
    else{
        $txtUname = test_input($_POST["txtPassword"]);
    }// End else

    if(empty($_POST["txtCPassword"]))
    {
        $error["txtCPasswordErr"] = "Confirme Password is required.";
        $isError = true;
    }
    else{
        $txtCPassword = test_input($_POST["txtCPassword"]);
    }// End else





function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>