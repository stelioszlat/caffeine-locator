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
        include 'index.html';
      }
      if(isset($_SESSION['username'])){
        header("Refresh:0;url=main.php");
      }
    ?>
    <!--<div id="top">  
      <h1>Caffeine Locator</h1>
      <div id="signin_div">
        <form id="signin" action="login.php" method="post">
          <input class="if"type="text" name="username" value=""/>
          <input class="if"type="password" name="password" value=""/>
          <input class="if"type="submit" name="signin" value="Sign In"/>
        </form>
      </div>
    </div>
    <div id="main">
        <form id="signup" action="register.php" method="post">
          <h1>Sign Up</h1>
          <h4>It's free!</h4>
          <input class="uf"type="text" name="firstname" value="First Name" />
          <input class="uf"type="text" name="lastname" value="Last Name"><br />
          <input class="uf"type="text" name="username" value="Username">
          <input class="uf"type="password" name="password" value="Password"><br />
          <input class="uf"type="text" name="email" value="E-mail">
          <input class="uf"type="password" name="confirm" value="Confirm Password"><br />
          <input class="uf"type="submit" name="signup" value="Sign Up"/><br />
        </form>
    </div>
    <div id="footer">
        
    </div> -->
  </body>
</html> 