<?php 
session_start();
include("..//gridview.php");
$txtStudentID=$course=$txtEnrollmentDate=$txtGrade="";

$error=array(
    "txtStudentIDErr"=>"",
    "txtEnrollmentDateErr"=>"",
    "txtGradeErr"=>"",
);
include("controll/enrollment/ControllerEnrollmentData.php");

if(isset($_SESSION["username"])){

    if(isset($_SESSION["course"]) && isset($_SESSION["student_Id"])){
        $course=$_SESSION["course"];
        $txtStudentID=$_SESSION["student_Id"];
        $result_set = $_SESSION["enroll_set"];
        //unset($_SESSION["course"]);
    }else{
        return;
    }


}else{
    header("Location: ../auth/login.php");
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link rel="stylesheet" type="text/css" href="..//gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="..//css.css">
    <style>
        .error{
            font-size: small;
        }
        .nav{
            position:sticky;
            top: 10%;
        }
    </style>

</head>
<body>
    <!-- header -->
    <?php include("..//layout//header.php") ?>
    <!-- side -->
    <?php include("..//side.php") ?>

    <!-- center -->
    <div class="center">
        <!-- titel -->
        <span class="titel">
            <i class="icon"><img class="title_ico" src="..//assets//img//icon//enroll.png" alt="noimg"></img></i>
            <h3>New Enrollment </h3>    
        </span><br><br>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">Student ID</label>
                        <input type="text" name="txtStudentID" id="txtStudentID" value="<?php echo $txtStudentID ;?>">
                        <span class="error"><?php echo $error["txtStudentIDErr"]; ?></span>
                    </td>
                    <td>
                        <label for="" class="label-input">Choose Course*</label>
                        <select name="course" id="course">
                            <?php foreach ($course as $row) { ?>
                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="" class="label-input">Select Grade</label>
                        <select name="txtGrade" id="">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </td>

                    <td colspan="1"><label for="" class="label-input">Enrollment Date*</label>
                        <input type="date" name="txtEnrollmentDate" id="" >
                        <span class="error"><?php echo $error["txtEnrollmentDateErr"]; ?></span>
                    </td>
                </tr>

                <tr>

                </tr>
                <tr>
                    <td><input type="submit" name="addEnrollment" id="addEnrollment" value="Enroll"></td>
                </tr>
            </table>
            </form>
            </div>
            <div>
            <?php  $tableName = "Enrollment";
                    $colName = array("Enrollment ID","Student ID", "Course ID","Enrollment Date","Grade","edit");
                    $actions=array("Edit");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>
            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>