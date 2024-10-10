<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
            
    if(isset($_POST["addStudent"])){
        include("validateStudentInput.php");
          //check if the data is valid insert data if it is valid
          if($isValid){
            $query = "INSERT INTO student (first_name, last_name, date_of_birth, gender, contact_info, address)";
            $query.="VALUES('$txtFirstName','$txtLastName', '$BirthDate', '$gender','$txtMobile','$txtAddress');";

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
    if(isset($_POST["DeleteStudent"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM student WHERE student_id={$_POST["recordId"]};";
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
    if(isset($_POST["EditStudent"])){
        if(isset($_POST["recordId"])){
            var_dump($_POST["recordId"]);
            $query = "SELECT*FROM student WHERE student_id={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not Update record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["student"]=$result_set;
                header("location: student_edit.php" );
                echo '<script> alert("Deleted data successfuly.");</script>';
            }
        }
    }
    //
    //Update Job data
    //
    if(isset($_POST["updateStudent"])){
        //validate user input
        include("controll/validateStudentInput.php");
        //check if all user input is valid data
        if($isValid){
            var_dump($_POST["student_id"]);
          $query = "UPDATE student SET first_name='$txtFirstName', last_name='$txtLastName', date_of_birth='$BirthDate', gender='$gender', contact_info='$txtMobile', address='$txtAddress' WHERE student_id={$_POST["student_id"]}";

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
              header("location: student_list.php");
              exit(); 
          }
        }
    }//
    

    


}



?>