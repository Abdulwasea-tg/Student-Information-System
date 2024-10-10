<?php 
session_start();
include("..//gridview.php");
$txtDepartmentName=$txtHeadOfDepartment="";
$error=array(
    "txtDepartmentNameErr"=>"",
    "txtHeadOfDepartmentErr"=>"",
);
include("controll/department/ControllerDepartmentData.php");

if(isset($_SESSION["username"])){

    if(isset($_SESSION["department"])){
        $department=$_SESSION["department"];
        // unset($_SESSION["department"]);
        
    }

}else{
    header("Location: ../app/login.php");
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>department</title>
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
            <h3>departments Management</h3>    
        </span>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="hidden" name="department_id" value="<?php echo $department['department_id'] ;?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">Department Name*</label>
                        <input type="text" name="txtDepartmentName" id="txtDepartmentName"  placeholder="Enter department name" value="<?php echo $department['department_name'] ;?>">
                        <span class="error"><?php echo $error["txtDepartmentNameErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="label-input">Head Of Department*</label>
                        <input type="text" name="txtHeadOfDepartment" id="txtHeadOfDepartment" placeholder="Enter Head" value="<?php echo $department['head_of_department'] ;?>">
                        <span class="error"><?php echo $error["txtHeadOfDepartmentErr"]; ?></span>
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" name="updateDepartment" id="updateDepartment" value="Add"></td>
                </tr>
            </table>
            </form>

            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>