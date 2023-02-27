<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
  else{
    header("Refresh:1;url=main.php");
  }
  require_once('db_functions.php');
  $conn = db_connect();

  if(isset($_POST['Add']) && isset($_SESSION['username'])){
    $name = $_POST['name'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $user = $_SESSION['username'];

    $query = "insert into favorites values('$name', '$lat', '$lng', '$user')";
    $result = mysqli_query($conn , $query);

    if($result === false){
      echo "Error ".mysqli_error($conn);
      die();
    }
  }
  header("Location: main.php");
  die();
 ?>
