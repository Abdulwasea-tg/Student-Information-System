<?php 
include("gridview.php");

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">


</head>
<body>
    <!-- header -->
    <?php include("header.php") ?>
    <!-- side -->
    <?php include("side.php") ?>

    <!-- center -->
    <div class="center">
        
        <!-- titel -->
        <span class="titel">
            <i class="icon">add icon</i>
            <h2>Our Employers</h2>    
        </span>

        <a href="employeReg.php">
            <button type="button"> Register</button>
        </a>
        
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
    
</body>
</html>