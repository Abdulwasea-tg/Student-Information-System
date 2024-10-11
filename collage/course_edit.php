<?php 
session_start();
include("..//gridview.php");
$txtCourseName=$txtCredits=$department="";
$error=array(
    "txtCourseNameErr"=>"",
    "txtCreditsErr"=>"",
);
include("controll/course/ControllerCourseData.php");

if(isset($_SESSION["username"])){

    if(isset($_SESSION["course"])){
        $course=$_SESSION["course"];
        // unset($_SESSION["course"]);
        

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
<body>enrollment_List
    <!-- header -->
    <?php include("..//layout//header.php") ?>
    <!-- side -->
    <?php include("..//side.php") ?>

    <!-- center -->
    <div class="center">
        <!-- titel -->
        <span class="titel">
            <i class="icon"><img class="title_ico" src="..//assets//img//icon//job.png" alt="noimg"></img></i>
            <h3>Course Management</h3>    
        </span>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="hidden" name="course_id" value="<?php echo $course['course_id'] ;?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">Course Name*</label>
                        <input type="text" name="txtCourseName" id="txtCourseName"  placeholder="Enter course name" value="<?php echo $course['course_name'] ;?>">
                        <span class="error"><?php echo $error["txtCourseNameErr"]; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="" class="label-input">Credits*</label>
                        <input type="number" name="txtCredits" id="txtCredits" placeholder="Enter Credits" value="<?php echo $course['credits'] ;?>">
                        <span class="error"><?php echo $error["txtCreditsErr"]; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="" class="label-input">Department*</label>
                        <select name="department" id="department">
                            <?php foreach ($_SESSION["department_set"] as $row) { ?>
                                <option value="<?php echo $row[0] ?>" <?php if($row[0]== $course['department_id']) echo "selected"?>><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="updateCourse" id="updateCourse" value="Update"></td>
                </tr>
            </table>
            </form>

            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>