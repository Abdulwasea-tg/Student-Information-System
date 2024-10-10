<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
            
    if(isset($_POST["addCourse"])){
        include("validateCourseInput.php");
          //check if the data is valid insert data if it is valid
          if($isValid){
            $query = "INSERT INTO course (course_name, credits, department_id)";
            $query.="VALUES('$txtCourseName','$txtCredits', '$department');";

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
    if(isset($_POST["DeleteCourse"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM course WHERE course_id={$_POST["recordId"]};";
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
    if(isset($_POST["EditCourse"])){
        if(isset($_POST["recordId"])){

            $query = "SELECT*FROM course WHERE course_id={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not Update record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["course"]=$result_set;

                header("location: course_edit.php" );
                echo '<script> alert("Deleted data successfuly.");</script>';
            }
        }
    }
    //
    //Update Job data
    //
    if(isset($_POST["updateCourse"])){
        //validate user input
        include("validateCourseInput.php");
        //check if all user input is valid data
        if($isValid){

          $query = "UPDATE course SET course_name='$txtCourseName', credits='$txtCredits', department_id=$department  WHERE course_id={$_POST["course_id"]}";

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
              header("location: course_list.php");
              exit(); 
          }
        }
    }//
    

    


}



?>