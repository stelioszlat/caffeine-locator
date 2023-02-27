<?php
  session_start();
  require_once('db_functions.php');
  $conn = db_connect();
  
  if(isset($_POST['signin'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $p = md5($p);
    $query = "select * from user where username='$u' and password='$p'";
    $result=mysqli_query($conn, $query);
    if($result === false){
      echo "Error: ". mysqli_error($conn);
      die();
    }
    else{
      if(mysqli_num_rows($result)==1){
        // echo "Log in successful<br />";
        $_SESSION['username']=$u;
        header("Refresh:2;url=main.php");
        die();
      }
      else{
        echo "<script>window.alert('Wrong Username or Password');</script><br />";
        header("Refresh:1;url=index.php");
      }
    }
  }
  
  $admin_p_query="select * from user where username='admin'";
  $admin_p=mysqli_query($conn, $admin_p_query);
  if($_POST['username'] == 'admin' && $_POST['password'] == '0000'){
    include("admin.php");
  }
  else {
    if($_POST['username'] == 'admin'){
      echo "You have not admin access.";
    }
  }
  
 ?>