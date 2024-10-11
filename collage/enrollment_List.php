<?php 
session_start();
include("..//gridview.php");
$txtFirstName=$txtLastName=$BirthDate=$gender=$txtMobile=$txtAddress="";
$error=array(
    "txtFirstNameErr"=>"",
    "txtLastNameErr"=>"",
    "txtAddressErr"=>"",
    "txtMobileErr"=>"",
    "genderErr"=>"",
    "BirthDateErr"=>"",
);
include("controll/enrollment/ControllerEnrollmentData.php");

if(isset($_SESSION["username"])){
    include("../config/connection.php");

    $query = "SELECT student_id, first_name, last_name, date_of_birth, gender,contact_info, address  FROM Student ;";

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
    <title>Document</title>
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
            <h3>Students Management</h3>    
        </span>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                <div class="filter_box">
                    <table>
                        <tr>
                            <td>Search by student name:</td>
                            <td>
                                <input type="search" name="keyword" id="" placeholder="Enter student name...">
                            </td>  
                            <td>
                                <input type="submit" name="Search" value="search">
                                <input type="submit" name="clear" value="clear">
                            </td>
                        </tr>

                    </table>
                </div>

            </form>

            <?php  $tableName = "Enrollment";
                    $colName = array("id","First Name", "Last Name", "Date of Birth","Gender", "Contact Info","Address", "Enroll");
                    $actions=array("Edit");
                        //$data_set = array(array("1", "3", "air","single", "No", "Delete"));
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>
            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>