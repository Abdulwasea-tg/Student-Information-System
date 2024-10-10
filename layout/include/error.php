<?php
session_start();
if(isset($_SESSION["error"])){
    echo "<div class='error' id='error'>{$_SESSION['error']}</div>";
    echo "<script> alert({$_SESSION["error"]})</script>";
    unset($_SESSION["error"]);
}
?>