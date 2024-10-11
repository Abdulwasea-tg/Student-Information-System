<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
            
    if(isset($_POST["addEnrollment"])){
        include("validateEnrollmentInput.php");
        
          //check if the data is valid insert data if it is valid
          if($isValid){
            
            $query = "INSERT INTO enrollment (student_id, course_id, enrollment_date, grade)";
            $query.="VALUES($txtStudentID, $course,'$txtEnrollmentDate', '$txtGrade');";

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
    if(isset($_POST["DeleteEnrollment"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM enrollment WHERE enrollment_id={$_POST["recordId"]};";
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
    if(isset($_POST["EditEnrollment"])){
        if(isset($_POST["recordId"])){
            
            $query1 = "SELECT course_id, course_name FROM course;";
            $query2 = "SELECT*from enrollment WHERE student_id={$_POST["recordId"]}";
            $result_set1 = getData($query1, $conn);
            $result_set2 = getData($query2, $conn);

            if($result_set1 == false || $result_set2 == false){
                echo '<script> alert("Could not feach record.");</script>';
            }
            else{
                $_SESSION["course"]=$result_set1;
                $_SESSION["enroll_set"]=$result_set2;
                $_SESSION["student_Id"]=$_POST["recordId"];
                header("location: enrollment_edit.php" );
                echo '<script> alert("Updated data successfuly.");</script>';
            }
        }
    }
    //
    //Update Job data
    //
    if(isset($_POST["updateEnrollment"])){
        //validate user input
        include("validateEnrollmentInput.php");
        //check if all user input is valid data
        if($isValid){

          $query = "UPDATE enrollment SET enrollment_name='$txtenrollmentName', head_of_enrollment='$txtHeadOfenrollment'  WHERE enrollment_id={$_POST["enrollment_id"]}";

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
              header("location: enrollment_list.php");
              exit(); 
          }
        }
    }//
    

    


}

function getData($query, $conn){
    $retval = mysqli_query($conn, $query);
    if(!$retval){
        echo '<script> alert("Sory Could not Feach data.");</script>';
        return false;
        
    }
    else{
        $result_set=mysqli_fetch_all($retval, 2);
        return $result_set;
    }

}



?>