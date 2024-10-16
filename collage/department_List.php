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
    include("../config/connection.php");

    $query = "SELECT*FROM department;";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_all($res,2);
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../auth/login.php");
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
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
            <i class="icon"><img class="title_ico" src="..//assets//img//icon//building.png" alt="noimg"></img></i>
            <h3>Departments Management</h3>    
        </span><br><br>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">department Name*</label>
                        <input type="text" name="txtDepartmentName" id="txtDepartmentName"  placeholder="Enter department name" value="<?php echo $txtDepartmentName ;?>">
                        <span class="error"><?php echo $error["txtDepartmentNameErr"]; ?></span>
                    </td>
                    <td>
                        <label for="" class="label-input">Head Of Department*</label>
                        <input type="text" name="txtHeadOfDepartment" id="txtHeadOfDepartment" placeholder="Enter Head">
                        <span class="error"><?php echo $error["txtHeadOfDepartmentErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="addDepartment" id="addDepartment" value="Add"></td>
                </tr>
            </table>
            </form>


            <?php  $tableName = "Department";
                    $colName = array("id","department Name", "Head of Department","edit");
                    $actions=array("Edit");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>


            

            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>