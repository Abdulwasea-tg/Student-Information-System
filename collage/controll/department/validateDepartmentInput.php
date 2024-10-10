<?php 

// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtDepartmentName"]))
    {
        $error["txtDepartmentNameErr"] = "Department Name is required.";
        $isValid = false;
    }
    else{
        $txtDepartmentName = test_input($_POST["txtDepartmentName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtDepartmentName)){
            $error["txtDepartmentNameErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtHeadOfDepartment"]))
    {
        $error["txtHeadOfDepartmentErr"] = "Head of department is required.";
        $isValid = false;
    }
    else{
        $txtHeadOfDepartment = test_input($_POST["txtHeadOfDepartment"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-.' ]*$/", $txtHeadOfDepartment)){
            $error["txtHeadOfDepartmentErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
