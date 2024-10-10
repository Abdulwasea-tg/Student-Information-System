<?php 
session_start();
include("..//gridview.php");
$txtFirstName=$txtLastName=$txtMobile=$department_id="";
$error=array(
    "txtFirstNameErr"=>"",
    "txtLastNameErr"=>"",
    "txtMobileErr"=>"",
);
include("controll/instructor/ControllerInstructorData.php");

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
    header("Location: ../app/login.php");
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

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">First Name*</label>
                        <input type="text" name="txtFirstName" id="txtFirstName"  placeholder="Enter username" value="<?php echo $txtFirstName ;?>">
                        <span class="error"><?php echo $error["txtFirstNameErr"]; ?></span>
                    </td>

                    <td colspan="1"><label for="" class="label-input">Last Name*</label>
                        <input type="text" name="txtLastName" id="txtLastName" required  placeholder="Enter last name" value="<?php echo $txtLastName ;?>">
                        <span class="error"><?php echo $error["txtLastNameErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><label for="" class="label-input">Mobile*</label>
                        <input type="tel" name="txtMobile" id="txtMobile" required  placeholder="999594949559" value="<?php echo $txtMobile ;?>">
                        <span class="error"><?php echo "{$error["txtMobileErr"]}"; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="label-input">Birth Date*</label>
                        <input type="date" name="BirthDate" id="BirthDate" required>
                        <span class="error"><?php echo $error["BirthDateErr"]; ?>
                    </td>

                    <td><label for="" class="label-input">Address*</label>
                        <input type="text" name="txtAddress" id="txtAddress" required  placeholder="Jedah,23st" value="<?php echo $txtAddress ;?>">
                        <span class="error"><?php echo $error["txtAddressErr"]; ?></span>
                    </td>
                
                </tr>
                <tr>
                    <td><label for="" class="label-input">Gender*</label><br>  
                    <input type="radio" name="gender" id="gender"  value="male"   style="width:auto">  Male
                    <input type="radio" name="gender" id="gender" value="female"  style="width:auto">  Female
                    <span class="error"><?php echo $error["genderErr"]; ?></td>
                </tr>
                <tr>
                    <td><input type="submit" name="addStudent" id="addStudent" value="Add"></td>
                </tr>
            </table>
            </form>


            <?php  $tableName = "Student";
                    $colName = array("id","First Name", "Last Name", "Date of Birth","Gender", "Contact Info","Address", "delete", "edit");
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