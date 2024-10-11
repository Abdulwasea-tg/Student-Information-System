<?php 
session_start();
include("..//gridview.php");
$txtFirstName=$txtLastName=$email=$department="";
$error=array(
    "txtFirstNameErr"=>"",
    "txtLastNameErr"=>"",
    "emailErr"=>"",
);
include("controll/instructor/ControllerInstructorData.php");

if(isset($_SESSION["username"])){

    if(isset($_SESSION["instructor"])){
        $instructor=$_SESSION["instructor"];
        // unset($_SESSION["instructor"]);

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
            <h3>Instructors Management</h3>    
        </span>
        
        <!-- countent1 -->
        <!-- <div> -->
        <?php include("..//layout//include//message.php");?>
             <!-- countent2 -->
            <div class="container">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="hidden" name="instructor_id" value="<?php echo $instructor['instructor_id'] ;?>">
            <table class="table-input">
                
                <tr>
                    <td colspan="1"><label for="" class="label-input">First Name*</label>
                        <input type="text" name="txtFirstName" id="txtFirstName"  placeholder="Enter username" value="<?php echo $instructor['first_name'] ;?>">
                        <span class="error"><?php echo $error["txtFirstNameErr"]; ?></span>
                    </td>

                    <td colspan="1"><label for="" class="label-input">Last Name*</label>
                        <input type="text" name="txtLastName" id="txtLastName" required  placeholder="Enter last name" value="<?php echo $instructor['last_name'] ;?>">
                        <span class="error"><?php echo $error["txtLastNameErr"]; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="1"><label for="" class="label-input">Contact info*</label>
                        <input type="email" name="email" id="email" required  placeholder="abcd@gmail.come" value="<?php echo $instructor['contact_info'] ;?>">
                        <span class="error"><?php echo "{$error["emailErr"]}"; ?></span>
                    </td>

                    <td>
                        <select name="department" id="department">
                            <?php foreach ($_SESSION["department_set"] as $row) { ?>
                                <option value="<?php echo $row[0] ?>" <?php if($row[0]== $instructor['department_id']) echo "selected"?>><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="updateInstructor" id="updateInstructor" value="Update"></td>
                </tr>
            </table>
            </form>

            </div>

        <!-- </div>    --> 
    </div><!-- End center -->
    
</body>
</html>