<?php
session_start();
$name = "";
$surname = "";
$subject = "";
$username = "";
$email = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'register');
//register teacher
if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $subject = mysqli_real_escape_string($db, $_POST['subject']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $image = $_FILES['file'];

    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($surname)) {
        array_push($errors, "Surname is required");
    }
    if (empty($subject)) {
        array_push($errors, "Subject is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    $q = "SELECT username FROM teachers WHERE username = '$username'";
    $em = "SELECT email FROM teachers WHERE email = '$email'";
    $query = mysqli_query($db, $q);
    $queryEM = mysqli_query($db, $em);
    if (mysqli_num_rows($query) !== 0) {
        array_push($errors, "Username is already busse");

    } else if (mysqli_num_rows($queryEM) !== 0) {
        array_push($errors, "Email is already busse");

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not correct");

    } else if (count($errors) == 0) {
        $image = 'upload/' . time() . "." . pathinfo($_FILES['file']['name'])['extension'];
        $password = md5($password_1);
        $sql = "INSERT INTO teachers (name,surname,subject,username,email,image,password) 
VALUES ('$name','$surname','$subject','$username','$email','$image','$password')";
        if (!empty($_FILES)) {
            move_uploaded_file($_FILES['file']['tmp_name'], $image);
        }
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['teacher_id'] = $db->insert_id;
        $_SESSION['success'] = 'You are now logged in';
        header('location: index.php');
    }

}
//login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM teachers WHERE username = '$username' AND 
                          password = '$password'";
        $result = mysqli_query($db, $query);
        $teacher = $result->fetch_assoc();
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['teacher_id'] = $teacher['id'];
            $_SESSION['success'] = 'You are now logged in';
            header('location: index.php');
        } else {
            array_push($errors, 'Wrong Username or Password combination');
        }

    }
}

//register pupil
$name_p = "";
$surname_p = "";
$class_p = "";
$username_p = "";
$email_p = "";
$errors_p = array();
if (isset($_POST['register-p'])) {

    $name_p = mysqli_real_escape_string($db, $_POST['name-p']);
    $surname_p = mysqli_real_escape_string($db, $_POST['surname-p']);
    $username_p = mysqli_real_escape_string($db, $_POST['username-p']);
    $class_p = mysqli_real_escape_string($db, $_POST['class-p']);
    $email_p = mysqli_real_escape_string($db, $_POST['email-p']);
    $password_1_p = mysqli_real_escape_string($db, $_POST['password_1_p']);
    $password_2_p = mysqli_real_escape_string($db, $_POST['password_2_p']);

    if (empty($name_p)) {
        array_push($errors_p, "Name is required");
    }
    if (empty($surname_p)) {
        array_push($errors_p, "Surname is required");
    }
    if (empty($username_p)) {
        array_push($errors_p, "Username is required");
    }
    if (empty($class_p)) {
        array_push($errors_p, "Class is required");
    }
    if (empty($email_p)) {
        array_push($errors_p, "Email is required");
    }
    if (empty($password_1_p)) {
        array_push($errors_p, "Password is required");
    }

    if ($password_1_p != $password_2_p) {
        array_push($errors_p, "The two passwords do not match");
    }

    $qq = "SELECT username FROM people WHERE username = '$username_p'";
    $emP = "SELECT email FROM people WHERE email = '$email_p'";

    $queryP = mysqli_query($db, $qq);
    $queryEMP = mysqli_query($db, $emP);

    if (mysqli_num_rows($queryP) !== 0) {
        array_push($errors_p, "Username is already busse");

    } else if (mysqli_num_rows($queryEMP) !== 0) {
        array_push($errors_p, "Email is already busse");

    } else if (!filter_var($email_p, FILTER_VALIDATE_EMAIL)) {
        array_push($errors_p, "Email is not correct");

    } else if (count($errors_p) == 0) {
        $password_p = md5($password_1_p);
        $sql = "INSERT INTO people (name,surname,email,class,username,password) 
VALUES ('$name_p','$surname_p','$email_p','$class_p','$username_p','$password_p')";

        mysqli_query($db, $sql);
        $_SESSION['username'] = $username_p;
        $_SESSION['success'] = 'You are now logged in';
        header('location: index-p.php');
    }

}


//people login
if (isset($_POST['login-p'])) {
    $username_p = mysqli_real_escape_string($db, $_POST['username-p']);
    $password_p = mysqli_real_escape_string($db, $_POST['password-p']);

    if (empty($username_p)) {
        array_push($errors_p, "Username is required");
    }
    if (empty($password_p)) {
        array_push($errors_p, "Password is required");
    }

    if (count($errors_p) == 0) {
        $password_p = md5($password_p);
        $query = "SELECT * FROM people WHERE username = '$username_p' AND 
                          password = '$password_p'";
        $result = mysqli_query($db, $query);
        $people = $result->fetch_assoc();
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username_p;
            $_SESSION['success'] = 'You are now logged in';
            $_SESSION['people_id'] = $people['id'];
            header('location: index-p.php');
        } else {
            array_push($errors_p, 'Wrong Username or Password combination');
        }

    }
}

//teacehr chek people
if (isset($_POST['people_btn'])) {
    $p_id = $_POST['people_id'];
    $t_id = $_SESSION['teacher_id'];
    $a = $query = "SELECT * FROM teacher_people WHERE people_id = '$p_id' AND teacher_id = '$t_id' ";
    $res = mysqli_query($db, $a);
    if (mysqli_num_rows($res) == 0) {
        $people_q = "INSERT INTO teacher_people (teacher_id, people_id) VALUE ('$t_id','$p_id')";
        mysqli_query($db, $people_q);
        header('Location: index.php');
    } else {
        array_push($errors, 'This people is already has been added');
    }
}


//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location: homepage.php');
}


    $allTeachers = $db->query("SELECT * FROM teachers");
    $teacherArr = [];
    while ($row = mysqli_fetch_array($allTeachers)) {
        array_push($teacherArr, ["id" => $row['id'], "name" => $row['name'],
            "surname" => $row['surname'], "image" => $row['image']]);
    }


if (isset($_SESSION['teacher_id'])) {
    $teacherID = $_SESSION['teacher_id'];

    $allPeoples = $db->query("SELECT * FROM people");
    $peopleArr = [];
    while ($rowP = mysqli_fetch_array($allPeoples)) {
        array_push($peopleArr, ["id" => $rowP['id'], "name" => $rowP['name'],
            "surname" => $rowP['surname'], "class" => $rowP['class']]);
    }

    $peopleQuery = "SELECT * FROM teacher_people inner join people on people.id = teacher_people.people_id where teacher_people.teacher_id = $teacherID";
    $peoplesTP = [];
    if ($resultTP = $db->query($peopleQuery)) {
        while ($rowTP = $resultTP->fetch_array()) {
            array_push($peoplesTP, ["teacher_id" => $_SESSION['teacher_id'], "id" => $rowTP['id'], "name" => $rowTP['name']]);
        }
    }
}


$db->close();
?>