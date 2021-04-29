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
    <title>User Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register Teacher</h2>
</div>
<form action="register.php" method="post" enctype="multipart/form-data">
    <?php include('errors.php') ?>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" >
    </div>
    <div class="input-group">
        <label>Surname</label>
        <input type="text" name="surname">
    </div>
    <div class="input-group">
        <label>Subject</label>
        <input type="text" name="subject">
    </div>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email">
    </div>
    <div class="input-group">
        <label>Image</label>
        <input type="file" name="file">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" name="register" class="btn">Register</button>
    </div>
    <div class="input-group">
        <a href="homepage.php" style="text-decoration: none" class="btn">
            <span style="color: white;font-family: Arial">Home Page</span>
        </a>
    </div>
    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
</body>
</html>