<?php 
session_start();
if(!empty($_SESSION)){
    if(session_destroy()){
        header("Location:../app/index.php");
    }
}

?>