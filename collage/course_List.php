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
    include("../config/connection.php");

    $query = "SELECT*FROM course;";
    $query2 = "SELECT department_id, department_name from Department";

    $res = mysqli_query($conn, $query);
    $department_result = mysqli_query($conn, $query2);
    if($res && $department_result ){
        $result_set = mysqli_fetch_all($res,2);
        $department_set  = mysqli_fetch_all($department_result,2);

        // Keep department set for editing action page
        $_SESSION["department_set"] = $department_set;
        // var_dump($department_set);
        
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
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
            <i class="icon"><img class="title_ico" src="..//assets//img//icon//job.png" alt="noimg"></img></i>
            <h3>Course Management</h3>    
        </span>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">Course Name*</label>
                        <input type="text" name="txtCourseName" id="txtCourseName"  placeholder="Enter course name" value="<?php echo $txtCourseName ;?>">
                        <span class="error"><?php echo $error["txtCourseNameErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="label-input">Credits*</label>
                        <input type="number" name="txtCredits" id="txtCredits" placeholder="Enter Credits">
                        <span class="error"><?php echo $error["txtCreditsErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="label-input">Department*</label>
                        <select name="department" id="department">
                            <?php foreach ($department_set as $row) { ?>
                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="addCourse" id="addCourse" value="Add"></td>
                </tr>
            </table>
            </form>


            <?php  $tableName = "Course";
                    $colName = array("id","Course Name", "Credits","Department","delete", "edit");
                    $actions=array("Delete", "Edit");
                        //$data_set = array(array("1", "3", "air","single", "No", "Delete"));
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>


            

            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>