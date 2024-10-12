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

if(isset($_POST['updateStudent'])){
    include("controll/student/ControllerStudentData.php");
}

if(isset($_SESSION["username"])){
    
    if(isset($_SESSION["student"])){
        $student=$_SESSION["student"];
        // unset($_SESSION["student"]);

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
            <i class="icon"><img class="title_ico" src="..//assets//img//icon//student.png" alt="noimg"></img></i>
            <h3>Edite Student</h3>    
        </span><br><br>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include/message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="student_id" value="<?php echo $student['student_id'] ;?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">First Name*</label>
                        <input type="text" name="txtFirstName" id="txtFirstName"  value="<?php echo $student['first_name'] ;?>">
                        <span class="error"><?php echo $error["txtFirstNameErr"]; ?></span>
                    </td>

                    <td colspan="1"><label for="" class="label-input">Last Name*</label>
                        <input type="text" name="txtLastName" id="txtLastName" required  value="<?php echo $student['last_name'] ;?>">
                        <span class="error"><?php echo $error["txtLastNameErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><label for="" class="label-input">Mobile*</label>
                        <input type="tel" name="txtMobile" id="txtMobile" required  value="<?php echo $student['contact_info'] ;?>">
                        <span class="error"><?php echo "{$error["txtMobileErr"]}"; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="label-input">Birth Date*</label>
                        <input type="date" name="BirthDate" id="BirthDate" required value="<?php echo $student['date_of_birth']; ?>">
                        <span class="error"><?php echo $error["BirthDateErr"]; ?>
                    </td>

                    <td><label for="" class="label-input">Address*</label>
                        <input type="text" name="txtAddress" id="txtAddress" required  value="<?php echo $student['address'] ;?>">
                        <span class="error"><?php echo $error["txtAddressErr"]; ?></span>
                    </td>
                
                </tr>
                <tr>
                    <td><label for="" class="label-input">Gender*</label><br>  
                        <input type="radio" name="gender" id="gender"  value="male"  <?php if($student["gender"]=="male"){echo "checked";} ?> style="width:auto">  Male
                        <input type="radio" name="gender" id="gender" value="female" <?php if($student["gender"]=="female"){echo "checked";} ?> style="width:auto">  Female
                    <span class="error"><?php echo $error["genderErr"]; ?></td>
                </tr>
                <tr>
                    <td><input type="submit" name="updateStudent" id="updateStudent" value="Update"></td>
                </tr>
            </table>
            </form>


            

            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>