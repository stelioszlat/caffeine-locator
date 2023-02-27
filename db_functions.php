<?php 
  function db_connect(){
    static $connection;
    if(!isset($connection)){
      $config=parse_ini_file('conf.ini');
      $connection=mysqli_connect($config['server'],$config['username'],$config['password'],$config['dbname']);
    }
    if($connection===false){
      echo mysqli_connect_error();
      die();
    }
    return $connection;
  }
 ?>