<?php 
    //include constant.php for SITEURL
    include('../config/constants.php');
    //1. destroy the session
    session_destroy(); // unsets

    //2. redirect to login page
    header('location:'.SITEURL.'admin/login.php');

?>