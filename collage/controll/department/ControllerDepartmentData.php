<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
            
    if(isset($_POST["addDepartment"])){
        include("validateDepartmentInput.php");
        
          //check if the data is valid insert data if it is valid
          if($isValid){
            $query = "INSERT INTO Department (department_name, head_of_department)";
            $query.="VALUES('$txtDepartmentName','$txtHeadOfDepartment');";

            //Insert data to the database
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                $db_error = "DB_ERROR: Sorry coudn't insert data.";
                $isError=true;
                echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
            }
            else{
                echo '<script> alert("Added data successfuly.");</script>';
    
            }
          }
        

    }

    // delete action
    if(isset($_POST["DeleteDepartment"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM department WHERE department_id={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not delete record.");</script>';
            }
            else{
                echo '<script> alert("Deleted data successfuly.");</script>';
            }
        }
    }
    //
    //Edite Job
    //
    if(isset($_POST["EditDepartment"])){
        if(isset($_POST["recordId"])){

            $query = "SELECT*FROM department WHERE department_id={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not Update record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["department"]=$result_set;

                header("location: department_edit.php" );
                echo '<script> alert("Updated data successfuly.");</script>';
            }
        }
    }
    //
    //Update Job data
    //
    if(isset($_POST["updateDepartment"])){
        //validate user input
        include("validateDepartmentInput.php");
        //check if all user input is valid data
        if($isValid){

          $query = "UPDATE department SET department_name='$txtDepartmentName', head_of_department='$txtHeadOfDepartment'  WHERE department_id={$_POST["department_id"]}";

          //Execute query
          $retval = mysqli_query($conn, $query);
          if(!$retval){
              $db_error = "DB_ERROR: Sorry coudn't update data.";
              $isError=true;
   
              echo '<script> alert("DB_ERROR: Sorry coudn not update data.");</script>';
          }
          else{
            $_SESSION["message"] = "Updated data successfuly.";
              #echo '<script> alert("Updated data successfuly.");</script>';
              header("location: department_list.php");
              exit(); 
          }
        }
    }//
    

    


}



?>