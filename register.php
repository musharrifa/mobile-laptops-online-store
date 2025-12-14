<?php

include "connection.php";

$error = []; // Initialize the $error variable as an empty array

if (isset($_POST['submit'])) {
    $name =  mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = ($_POST['user_type']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass'  ";

    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpassword) {
            $error[] = 'Passwords do not match!';
            echo "<script>document.addEventListener('DOMContentLoaded',()=>{document.querySelector('.wrapper').classList.add('active')})</script>";
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";
            mysqli_query($connect, $insert);
            header('location: display.php');
            exit();
        }
    }
}

session_start();

if (isset($_POST['rsubmit'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass'  ";

    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'user') {
            $_SESSION['userId'] = $row['id'];
            header('location: display.php');
            exit();
        } else {
            $loginErrors[] = 'Incorrect email or password';
        }
    } else {
        $loginErrors[] = 'Incorrect email or password';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/styleR.css">
    <style type="text/css">
        body {
            background-image: url("pic/login.jpg");
            background-size: cover;
        }
    </style>
    <script src="register.js" lang="javascript" defer></script>
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <?php
                if (isset($loginErrors)) {
                    foreach ($loginErrors as $loginError) {
                        echo '<span class="error-msg">' . $loginError . '</span>';
                    }
                }
                ?>
                <button type="submit" name="rsubmit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't Have An Account?<a href="#" class="register-link"> Register</a></p>
                </div>
                <div class="login-register">
                    <p>Admin Login<a href="adminlog.php" class="register-link"> admin</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="cpassword" required>
                    <label>Confirm Password</label>
                </div>
                <select name="user_type">
                    <option value="user">
                        <label>User</label>
                    </option>
                    
                </select>
                <?php
                if (isset($error)) {
                    foreach ($error as $errorMsg) {
                        echo '<span class="error-msg">' . $errorMsg . '</span>';
                    }
                }
                ?>
                <br>
                <div class="remember-forget"></div>
                <label>
                    <input type="checkbox">I Agree to the terms & conditions
                </label>
                <br>
                <br>
                <button type="submit" class="btn" name="submit">Register</button>
                <div class="login-register">
                    <p>Don't Have An Account?<a href="register.php" class="login-link"> Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
