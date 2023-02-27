<?php
  session_start();
  if(isset($_SESSION['username'])){
    // echo "<h1>This is the main page</h1>";
    // echo '<a href="logout.php">Log Out</a><br />';
    include('GMapsApi/index.html');
  }
  else{
    session_destroy();
    header("Refresh:0.1;url=index.php");
  }

 ?>
