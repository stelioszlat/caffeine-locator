<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
  else{
    $user = $_SESSION['username'];
  }
  include "main.php";

  require_once('db_functions.php');
  $conn = db_connect();
  // echo $user;
  if(isset($_POST['show'])){
    $favorites = array();
    $errors = array();
    // $query = "select * from favorites where name='$user'";
    // $result = mysqli_query($conn, $query);
    if($result === 'false'){
      echo "Error ".mysqli_error($conn);
    }
    // while($row = mysqli_fetch_array($result)){
      // echo $row."</br>";
    // }
    echo $result."</br>";
  }

  header("Location: main.php");
  die();
?>
