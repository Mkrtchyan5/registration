<?php include("server.php");

if (empty($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h2>Teacher Home</h2>
</div>
<div class="content">
    <?php include('errors.php') ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['username'])): ?>
        <p style="margin-top: 10px">Welcome <strong><?php echo $_SESSION['username'] ?></strong></p>
    <?php endif ?>

    <div style="width: 200px; border: 1px solid green;float: right">
        <p style="font-size: 15px">Ընտրված աշակերտներ</p>
        <?php for ($i = 0; $i < count($peoplesTP); $i++): ?>
            <p>ID: <?= $peoplesTP[$i]['id'] ?>: NAME: <?=  $peoplesTP[$i]['name'] ?> </p>
        <?php endfor; ?>
    </div>

    <h2>Աշակերտներ</h2>
    <?php for ($i = 0; $i < count($peopleArr); $i++): ?>

        <div style="border: 1px solid green; width: 175px;margin-bottom: 10px;">
            <ul style="list-style-type: none">
                <li>id: <?= $peopleArr[$i]['id'] ?></li>
                <li>Name: <?= $peopleArr[$i]['name'] ?></li>
                <li>Surname: <?= $peopleArr[$i]['surname'] ?></li>
                <li>Class: <?= $peopleArr[$i]['class'] ?></li>
                <form action="index.php" method="post">
                    <input type="hidden" value=" <?= $peopleArr[$i]['id'] ?>" name="people_id">
                    <input type="submit" value="choose" name="people_btn">
                </form>
            </ul>
        </div>

    <?php endfor; ?>



    <?php if (isset($_SESSION['username'])): ?>

        <form action=" " method="get" id="logout">
            <button type="submit" name="logout" style="color: white; margin-left: 35px;background-color: red"><span
                        style="font-size: 20px;font-family: Arial;border-radius: 5px">Logout</span></button>
        </form>
    <?php endif ?>

</div>


</body>
</html>