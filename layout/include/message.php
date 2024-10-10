<?php
if(isset($_SESSION["message"])){
    #echo "<div class='message' id='message'>{$_SESSION['message']}</div>";
    echo "<script> alert('{$_SESSION["message"]}')</script>";
    unset($_SESSION["message"]);
}
?>