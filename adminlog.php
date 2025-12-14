<?php
include "connection.php";
session_start();

$loginErrors = array();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pass = md5($_POST['password']); // Consider using a more secure password hashing method

    $select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass'";
    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['user_type'] == 'admin') {
            $_SESSION['userId'] =  $row['id'];
            header('location: product.php');
            exit(); // Add an exit() after the header redirect to prevent further execution
        } else {
            $loginErrors[] = 'Incorrect email or password';
        }
    } else {
        $loginErrors[] = 'Incorrect email or password'; // Add an error message for no matching rows
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
            <?php
            if (!empty($loginErrors)) {
                foreach ($loginErrors as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>
            <h2>Admin Login</h2>
            <form action="#" method="POST">
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
                <button type="submit" name="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
