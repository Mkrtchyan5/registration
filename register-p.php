<?php
include("server.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>People Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register People</h2>
</div>
<form action="register-p.php" method="post">
    <?php include('errors-p.php') ?>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name-p">
    </div>
    <div class="input-group">
        <label>Surname</label>
        <input type="text" name="surname-p">
    </div>
    <div class="input-group">
        <label>Class</label>
        <input type="text" name="class-p">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email-p">
    </div>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username-p">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1_p">
    </div>
    <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_2_p">
    </div>
    <div class="input-group">
        <button type="submit" name="register-p" class="btn">Register</button>
    </div>
    <div class="input-group">
        <a href="homepage.php" style="text-decoration: none" class="btn">
            <span style="color: white;font-family: Arial">Home Page</span>
        </a>
    </div>
    <p>
        Already a member? <a href="login-p.php">Sign in</a>
    </p>
</form>
</body>
</html>
