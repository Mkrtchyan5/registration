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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Teachers info</title>
</head>
<body>
<?php for ($i = 0; $i < count($teacherArr); $i++): ?>
    <div style="width: 175px;height: auto; margin-bottom: 10px; margin-top: 10px">
        <div style="width: 170px; height: 200px; border: 1px solid #3c763d;display: flex;align-items: center;justify-content: center">
            <img src="/registration/<?= $teacherArr[$i]['image'] ?>" alt="" width="150" height="180">
        </div>
        <div style="width: 170px; height: 30px;display: flex; justify-content: space-between;align-items: center; border-left: 1px solid #3c763d;border-right: 1px solid #3c763d">
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
</body>
</html>