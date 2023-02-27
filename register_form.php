<!DOCTYPE html>
<html>
  <head>
    <title>Caffeine Locator</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <?php
      if(!isset($_SESSION['username'])){
        session_start();
        include 'register.html';
      }
      if(isset($_SESSION['username'])){
        header("Refresh:0;url=main.php");
      }
    ?>
