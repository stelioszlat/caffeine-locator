<?php
  session_start();
  
  if(isset($_SESSION['username'])){
    session_unset();
    session_destroy();
  }
  
  header("Refresh:0.1;url=index.php");
  die();
  
?>