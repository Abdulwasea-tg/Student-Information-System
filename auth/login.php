<?php 
require("ControllerUserData.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        .container{
            width: 50%;
            margin: auto;
            padding: 16px;
            font-family:16px "Muli",sans-serif;
            color: #0b1c39;
            background-color: #fff;
            font-weight: 500;
            border: 1px solid #0b1c39;
            border-radius: 7px;
            box-shadow:0.80 0 0 0.80;
        }
        table td,table{
            
            border: none;
        }
        table{border:2px solid #f9f9ff ;
        box-shadow:0.80 0 0 0.80;}
        input[type="submit"]{
            background-color: #00B0F0;
            background-color: #4c7caf;
            color: white;
            background: linear-gradient(to right,  rgba(0, 42, 255, 0.492),#4c7caf);
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .header{
            background: linear-gradient(to right,  rgba(0, 42, 255, 0.492),#4c7caf);
        }
    </style>

</head>
<body>
    <!-- header -->
    <?php include("header.php") ?>
    <!-- side -->

    <!-- center -->
    <div class="center">
        <!-- titel -->
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            
                <center><h2>Login</h2> </center>  
            
                <form action="login.php" method="post"  >
                    <table>
                        <tr><td>User Name</td></tr>
                        <tr><tr></tr><td><input type="text" name="username" id="uname" placeholder="Username" ></td></tr>
                        <tr><td>Password</td></tr>
                        <tr><td><input type="password" name="password" id="password" placeholder="Password" required></td></tr>

                        <tr><td><input type="submit" name="login" id="login" value="login"></td></tr>
                        <tr><td><center>Dont have account?<a href="#" style="color:blue">Registe</a></center></td></tr>
                    </table>


                </form>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>