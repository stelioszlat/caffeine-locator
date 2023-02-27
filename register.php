<?php
  session_start();
  if(!isset($_SESSION['username'])){
    session_destroy();
    header("Location: index.php");
    die();
  }
  else{
    header("Refresh:0.1;url=main.php");
    die();
  }
  require_once('db_functions.php');
  $conn=db_connect();

  if(isset($_POST['signup'])){
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $conf=$_POST['confirm']; // password confirm
    $errors=array();
    if(strlen($user) < 3){
      array_push($errors, "Username less than 3 characters");
    }
    // if(strlen($password) < 8){
    //   array_push($errors, "Password less than 8 characters");
    // }
    if($pass != $conf){
      array_push($errors, "Password not confirmed");
    }

    if(!empty($errors)){
      echo "<h2>Errors</h2><br />";

      foreach ($errors as $e){
        echo $e."<br />";
      }
    }
    else{
      $query="select * from user where username='$user' or email='$email'";
      $result=mysqli_query($conn, $query);  
      if($result===false){
        echo "Error ".mysqli_error($conn);
        die();
      }
      if(mysqli_num_rows($result)>0){
        echo "<script>window.alert('This username or email is already been used!')</script><br />";
        header("Location: index.php");
        die();
      }
      else{
        $pass=md5($pass);
        $query="insert into user values('$user','$pass','$email')";
        // echo $query."<br />";
        $result=mysqli_query($conn, $query);
        if($result===false){
          echo "Error ".mysqli_error($conn);
          die();
        }
        else{
          echo "<script>window.alert('You have been registered!')</script><br />";
          header("Refresh:1;url=index.php");
          die();
        }
      }
    }
  }
  session_destroy();
  header("Location : index.php");
  die();
 ?>
