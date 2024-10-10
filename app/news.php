<?php 
include("gridview.php");

?>

<?php 


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="css.css">

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
    
</body>
</html>