<?php include("server.php");

if (empty($_SESSION['username'])) {
    header('location: login-p.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h2>People Home</h2>
</div>
<div class="content" style="display: flex;flex-direction: column">
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
        <p>Welcome <strong><?php echo $_SESSION['username'] ?></strong></p>

    <?php endif ?>

    <div class="input-group">
        <button type="submit" class="btn"><a href="all-teachers.php" style="text-decoration: none">All Teachers</a>
        </button>
    </div>


    <?php for ($i = 0; $i < count($teacherArr); $i++): ?>
        <div style="width: 175px;height: auto; margin-bottom: 10px; margin-top: 10px">
            <div style="width: 170px; height: 200px; border: 1px solid #3c763d;display: flex;align-items: center;justify-content: center">
                <img src="/registration/<?= $teacherArr[$i]['image'] ?>" alt="" width="150" height="180">
            </div>
            <div style="width: 170px; height: 30px;display: flex; justify-content: space-between;
            align-items: center; border-left: 1px solid #3c763d;border-right: 1px solid #3c763d">
                <div style="width: 23px;height: 23px; text-align: center"><i class="fas fa-star"
                                                                             style="color: gold"></i>
                </div>

                <div style="width: 23px;height: 23px; text-align: center"><i class="fas fa-star"
                                                                             style="color: gold"></i>
                </div>
                <div style="width: 23px;height: 23px; text-align: center"><i class="fas fa-star"
                                                                             style="color: gold"></i>
                </div>
                <div style="width: 23px;height: 23px; text-align: center"><i class="fas fa-star"
                                                                             style="color: gold"></i>
                </div>
                <div style="width: 23px;height: 23px; text-align: center"><i class="fas fa-star"
                                                                             style="color: gold"></i>
                </div>
            </div>

            <div style="width: 170px;height: 30px; border: 1px solid #3c763d;text-align: center">
                <span style="font-size: 23px"><?= $teacherArr[$i]['name'] ?>   <?= $teacherArr[$i]['surname'] ?></span>
            </div>
        </div>
    <?php endfor; ?>

    <form action="index-p.php" method="get" id="logout">
        <button type="submit" name="logout" style="color: white; margin-left: 35px;background-color: red"><span
                    style="font-size: 20px;font-family: Arial;border-radius: 5px">Logout</span></button>
    </form>
</div>

</body>
</html>