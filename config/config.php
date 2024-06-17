<?php 

  session_start();

  define('SITEURL', 'http://localhost/foodie/');

  define('LOCALHOST', 'localhost');
  define('ROOT', 'root');
  define('PASSWORD', '');
  define('DATABASE', 'foodiedb');

  $conn =  mysqli_connect(LOCALHOST, ROOT, PASSWORD, DATABASE) or die();
  $db_select = mysqli_select_db($conn, DATABASE) or die();

?>