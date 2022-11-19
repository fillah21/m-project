<?php 
  include("function.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M Project</title>
    <link rel="stylesheet" href="folder_css/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="content">
      <div class="form-box">
        <button type="button" class="toggle-button">WELCOME to M PROJECT</button>
        <div class="logo">
          <img src="image/Logo.png" alt="" />
        </div>
        <form id="login" action="post" class="input-group">
          <input type="text" class="input-field" placeholder="Username" />
          <input type="password" class="input-field" placeholder="Password" />
          <div class="check-box">
            <input type="checkbox" />
            <span>Remember Me</span>
          </div>
          <button type="submit" class="submit-button">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
