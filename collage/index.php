<?php 
session_start();
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT id, username FROM users WHERE username='{$_SESSION['username']}' AND password='{$_SESSION['password']}';";
    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_array($res, 1);
        $_SESSION["user_id"]= $result_set["id"];
        $_SESSION["user"] = $result_set ;
        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../auth/login.php");
}
include("controll/ControllerIndex.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="..//css.css">
    <style>
        .menu{
            padding: 10px 0px;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            list-style: none;
            width: 100%;
            background-color: white;

        }
        .l{
            /* width: 25%; */
            width:200px;
            height: 100px;
            margin-right:5px;
            margin-bottom: 20px;  
            height: 100px;
            background-color: white;
        }
        .btn{
            position: relative;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 8px;
            padding: 15px;

            display: flex;
            flex-flow:row nowrap;
            justify-content: space-between;
            text-align: left;
        }
        .menu li .btn img{
            width: 64px;
            height: 64px;
            padding: 15px;
            background-color: #6650a41a;
            border: none;
            border-radius: 8px;
        }
        .count{
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: last baseline;
        
        }
        .count h1{
            font-size: 20pt;
            color: #6750A4;
        }

    </style>


    

</head>
<body>
    <!-- header -->
    <?php include("..//layout//header.php") ?>
    <!-- side -->
    <?php include("..//side.php") ?>
    <div >
                <!-- titel -->
        <span class="titel">
            <i class="icon"><img class="title_ico" src="..//assets//img//icon//home.png" alt="noimg"></img></i>
            <h3>Dashbboard</h3>    
        </span>
    </div>

    <!-- center -->
    <div class="center">
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                    <ul class="menu">
                        <li class="l"><a href="student_list.php"><button id="tab_1" class="btn" href=""><i class="icon"><img src="..//assets//img//icon//job.png" alt="noimg"></img></i><span class="count"><h1><?php echo $total_student ?></h1>Students</span></button></a></li>
                        <li class="l"><a href="department_List.php"><button id="tab_2" class="btn" href=""><i class="icon"><img src="..//assets//img//icon//job.png" alt="noimg"></img></i><span class="count"><h1><?php echo $total_department ?></h1>Departments</span></button></a></li>
                        <li class="l"><a href="instructor_List.php"><button id="tab_3" class="btn" href=""><i class="icon"><img src="..//assets//img//icon//job.png" alt="noimg"></img></i><span class="count"><h1><?php echo $total_course ?></h1>Instructors</span></button></a></li>
                        <li class="l"><a href="course_List.php"><button id="tab_4" class="btn" href=""><i class="icon"><img src="..//assets//img//icon//job.png" alt="noimg"></img></i><span class="count"><h1><?php echo $total_instructor ?></h1>Courses</span></button></a></li>
                        <!-- <li class="l"><a href="course_List.php"><button id="tab_4" class="btn" href=""><i class="icon"><img src="..//assets//img//icon//job.png" alt="noimg"></img></i><span class="count"><h1>20</h1>Enrollments</span></button></a></li> -->
                    </ul>
            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>