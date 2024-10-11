<?php 

// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtStudentID"]))
    {
        $error["txtStudentIDErr"] = "Student id  is required";
        $isValid = false;
    }
    else{
        $txtStudentID= $_POST["txtStudentID"];
    }// End else

    if(empty($_POST["course"]))
    {
        $error["courseErr"] = "Pease choose course";
        $isValid = false;
    }
    else{
        $course= $_POST["course"];
    }// End else


    if(!empty($_POST["txtGrade"]))
    {
        $txtGrade= test_input($_POST["txtGrade"]);
    }
    // End if

    if(empty($_POST["txtEnrollmentDate"]))
    {
        $error["txtEnrollmentDateErr"] = "Enrollment date is required";
        $isValid = false;
    }
    else{
        $txtEnrollmentDate= test_input($_POST["txtEnrollmentDate"]);
    }// End else



}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
