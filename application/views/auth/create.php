<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/sign_up.css') ?>">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
        <?php echo validation_errors(); ?>
        <?php echo form_open('createuser'); ?>
          <!-- Tabs Titles -->
          <h2 class="inactive underlineHover"><a href="<?php echo base_url('login') ?>">Sign In</a></h2>
          <h2 class="active"><a href="signup.html">Sign Up</a></h2>
      
          <!-- Icon -->
          <div class="fadeIn first">
          </div>
      
          <!-- Login Form -->
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="password" class="form-control fadeIn second" name="re_enter" placeholder="Konfirmasi Password">
        <input type="text" id="email" class="fadeIn third" name="email" placeholder="email">
        <input type="text" id="name" class="fadeIn second" name="nama" placeholder="nama">
        <input type="submit" class="fadeIn fourth" value="Join">
        
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            
          </div>
      
        </div>
      </div>
</body>
</html>