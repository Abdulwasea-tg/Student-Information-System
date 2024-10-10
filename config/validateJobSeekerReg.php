<?php 

// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtName"]))
    {
        $error["txtNameErr"] = "Name is required.";
        $isValid = false;
    }
    else{
        $txtName = test_input($_POST["txtName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtName)){
            $error["txtNameErr"] = "Only latters and whitespace allowed.";
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

    if(empty($_POST["txtCity"]))
    {
        $error["txtCityErr"] = "City is required.";
        $isValid = false;
    }
    else{
        $txtCity = test_input($_POST["txtCity"]);
        // check if city name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtCity)){
            $error["txtCityErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtEmail"]))
    {
        $error["txtEmailErr"] = "E-mail is required.";
        $isValid = false;
    }
    else{
        $txtEmail = test_input($_POST["txtEmail"]);
        // // check if e-mail address is well-formed
        if(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
            $error["txtEmailErr"] = "Invalid e-mail address!";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtMobile"]))
    {
        $error["txtMobileErr"] = "Mobile is required.";
        $isValid = false;
    }
    else{
        $txtMobile = test_input($_POST["txtMobile"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9- ]*$/", $txtMobile)){
            $error["txtMobileErr"] = "Only numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtQualification"]))
    {
        $error["txtQualificationErr"] = "Area of work is required.";
        $isValid = false;
    }
    else{
        $txtQualification= test_input($_POST["txtQualification"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtQualification)){
            $error["txtQualificationErr"] = "Only letters and whitespace allowed.";
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

    if(empty($_POST["birthOD"]))
    {
        $error["birthODErr"] = "Birth date is required";
    }
    else{
        $birthOD= test_input($_POST["birthOD"]);
    }// End else

    if(empty($_POST["Resume"]))
    {
        $error["ResumeErr"] = "Upload file is required";
    }
    else{
        $Resume= test_input($_POST["Resume"]);
    }// End else

    
    if(empty($_POST["txtUname"]))
    {
        $error["txtUnameErr"] = "Username is required.";
        $isValid = false;
    }
    else{
        $txtUname = test_input($_POST["txtUname"]);
        // check if username only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z0-9-' ]*$/", $txtUname)){
            $error["txtUnameErr"] = "Only letters ,numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtPassword"]))
    {
        $error["txtPasswordErr"] = "Password is required.";
        $isValid = false;
    }
    else{
        $txtPassword = test_input($_POST["txtPassword"]);
    }// End else

    if(empty($_POST["txtCPassword"]))
    {
        $error["txtCPasswordErr"] = "Confirme Password is required.";
        $isValid = false;
    }
    else{
        $txtCPassword = test_input($_POST["txtCPassword"]);
    }// End else


}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 

?>
