<?php 
include("gridview.php");


?>





<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="css.css">

    <style>
        .home_img{
            padding:0px;
            width: 100%;
            height: 100%;

            
            background-image: url("Resorce/banner-4.jpg");
            background-size: cover;
            background-repeat:no-repeat;
            background-origin: inherit;

            
    
            

        }
        table{
            color: white;
            padding: 0px;
            height: 100%;
            margin: 0px;
            align-items: stretch;
            
        }
        td{
            height: auto;
        }
        table .col_2{
            width: 50%;
            
        }
        .detail-box{
            height: 100%;
            background-image: url("Resorce/banner-5.jpg");
            background-repeat: no-repeat;
            background-size:cover;
        }

    </style>

</head>
<body>
    <!-- header -->
    <?php include("header.php") ?>
    <!-- side -->
    <?php include("side.php") ?>

    <!-- center -->
    <div class="center">
        <div class="detail-box">
                <!-- titel -->
                <h1>Welcome to  Job Portal System</h1>
                <p>
                Welcome to online Job Portal. It provides facility to the Job Seeker.
                </p>
                <div class="btn-div">
                  <button type="button">Contact Us</button>
                 </div>
        </div>
        <!-- <div class="div-img"><img src="Resorce/banner-4.jpg" alt="noimage"></div> -->
    
    </div><!-- End center -->

        <!-- Employre center -->
        <div class="center">
        <!-- titel -->
        <span class="titel">
            <i class="icon">add icon</i>
            <h3>Our Employers</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <form action="" method="post">
            <?php  $colName = array("Company Name", "Contact Person", "Email");
                   $data_set = array(array("Microsoft", "Abdu", "abdu@gmail.com"));
               $grid = new Gridview($colName) ;
              $grid->creat_table($data_set);
              $grid->addAndCloseEnd()?>
            </form>

            </div>

        </div>    
    </div><!-- End center -->

        <!-- Job seeker center -->
        <div class="center">
        <!-- titel -->
        <span class="titel">
            <i class="icon">add icon</i>
            <h3>Our Job Seekers</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <form action="" method="post">
            <?php  $colName = array("Name", "Address", "Email");
                   $data_set = array(array("Abdulwasea", "Taiz", "abdulwasea@gmail.com"));
               $grid = new Gridview($colName) ;
              $grid->creat_table($data_set);
              $grid->addAndCloseEnd()?>
            </form>

            </div>

        </div>    
    </div><!-- End center -->

        <!-- News center -->
        <div class="center">
        <!-- titel -->
        <span class="titel">

            <h3>Latest News</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                

            <form action="" method="post">
            <?php  $colName = array("News", "News Date");
                   $data_set = array(array("Register and Get JOB", "2020-09-24"));
               $grid = new Gridview($colName) ;
              $grid->creat_table($data_set);
              $grid->addAndCloseEnd()?>
            </form>

            </div>

        </div>    
    </div><!-- End center -->

        <!-- About Us center -->
        <div class="center">
        <!-- titel -->
        <span class="titel">
            <h3>About Us</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <p width=50%>
                Welcome to online Job Portal. It provides facility to the Job Seeker to search for various jobs as per his qualification. Here Job Seeker can registered himself on the web portal and create his profile along with his educational information. Job Seeker can search various jobs and apply for the Job.

This Portal is also designed for the various employer who required to recruit employees in their organization. Employer can registered himself on the web portal and then he can upload information of various job vacancies in their organization. Employeer can view the applications of Job Seeker and send call latter to the job seekers.
                </p>
                <p width=50%>
                Welcome to online Job Portal. It provides facility to the Job Seeker to search for various jobs as per his qualification. Here Job Seeker can registered himself on the web portal and create his profile along with his educational information. Job Seeker can search various jobs and apply for the Job.

This Portal is also designed for the various employer who required to recruit employees in their organization. Employer can registered himself on the web portal and then he can upload information of various job vacancies in their organization. Employeer can view the applications of Job Seeker and send call latter to the job seekers.
                </p>

            </div>

        </div>    
    </div><!-- End center -->

        <!-- Contact Us center -->
        <div class="center" style="background-color:#3b4a6b">
        <!-- titel -->
        <span class="titel">
            <i class="icon">add icon</i>
            <h3>tab_6</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container" >
                <table>
                    <tr>
                        <td>Jobportal.com<br>

                         Yemen - Taiz
                        </td>
                    </tr>
                    <tr>
                        <td>Office No:772053912 Mobile: 717168783</td>
                    </tr>
                    <tr>
                        <td>Email :jobportal@gmail.com </td>
                    </tr>
                    <tr>
                        <td>Websit :Jobportal.com </td>
                    </tr>

                </table>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>