<?php
   //start the session
   session_start();

   //creating contants to store non repeating values
   define('SITEURL','http://localhost/KNTT/');
   define('LOCALHOST','localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD','');
   define('DB_NAME','recipe-database');
   $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//database connection
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());//selecting database

?>