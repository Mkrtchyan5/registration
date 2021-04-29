<?php include('server.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h2>Login Teacher</h2>
</div>
<form action="login.php" method="post">
    <?php include('errors.php') ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
    </div>
    <div class="input-group">
        <a href="homepage.php" style="text-decoration: none" class="btn">
            <span style="color: white;font-family: Arial">Home Page</span>
        </a>
    </div>
    <p>
        Not yet a member <a href="register.php">Register</a>
    </p>
</form>
</body>
</html>