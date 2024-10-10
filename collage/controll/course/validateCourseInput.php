<?php 

// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtCourseName"]))
    {
        $error["txtCourseNameErr"] = "Course Name is required.";
        $isValid = false;
    }
    else{
        $txtCourseName = test_input($_POST["txtCourseName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtCourseName)){
            $error["txtCourseNameErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtCredits"]))
    {
        $error["txtCreditsErr"] = "Credits is required.";
        $isValid = false;
    }
    else{
        $txtCredits = test_input($_POST["txtCredits"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[0-9-. ]*$/", $txtCredits)){
            $error["txtCreditsErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else


    if(empty($_POST["department"]))
    {
        $error["department"] = "Department is required";
    }
    else{
        $department= $_POST["department"];
    }// End else
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
