<?php
    //start session
    session_start();


    //create constants to store non repeating values
    define('SITEURL', 'http://192.168.64.2/dropclockfix2/');
    define('LOCALHOST', 'localhost');    
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'dbdropclock');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting db

?>