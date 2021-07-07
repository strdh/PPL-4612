<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/') ?>login.css">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <?php if ($this->session->userdata('msg') != NULL) {
                echo "<b>Username atau password salah <b><br>";
            } ?>
            <h2 class="active"><a href="login.html">Sign In</a></h2>
            <h2 class="inactive underlineHover"><a href="<?php echo base_url('createuser') ?>">Sign Up</a></h2>

            <!-- Icon -->
            <div class="fadeIn first">
            </div>

            <!-- Login Form -->
            <?php echo form_open('login') ?>
            <form>
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>