<?php 
session_start();
if(!empty($_SESSION)){
    if(session_destroy()){
        header("Location:../auth/login.php");
    }
}

?>