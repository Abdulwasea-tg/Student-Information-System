<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
            
    if(isset($_POST["addInstructor"])){
        include("validateInstructorInput.php");
          //check if the data is valid insert data if it is valid
          if($isValid){
            $query = "INSERT INTO instructor (first_name, last_name,department_id,contact_info)";
            $query.="VALUES('$txtFirstName','$txtLastName', '$department', '$email');";

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
    if(isset($_POST["DeleteInstructor"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM instructor WHERE instructor_id={$_POST["recordId"]};";
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
    if(isset($_POST["EditInstructor"])){
        if(isset($_POST["recordId"])){
            var_dump($_POST["recordId"]);
            $query = "SELECT*FROM instructor WHERE instructor_id={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not Update record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["instructor"]=$result_set;

                header("location: instructor_edit.php" );
                echo '<script> alert("Deleted data successfuly.");</script>';
            }
        }
    }
    //
    //Update Job data
    //
    if(isset($_POST["updateInstructor"])){
        //validate user input
        include("validateInstructorInput.php");
        //check if all user input is valid data
        if($isValid){
            var_dump($_POST["instructor_id"]);
          $query = "UPDATE instructor SET first_name='$txtFirstName', last_name='$txtLastName', department_id=$department, contact_info='$email'  WHERE instructor_id={$_POST["instructor_id"]}";

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
              header("location: instructor_list.php");
              exit(); 
          }
        }
    }//
    

    


}



?>