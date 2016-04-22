<?php

    session_start();

    //if the session is not exist , we return to login page
    if(!isset($_SESSION['mid'])){
        header("location: login.php");
    }
?>