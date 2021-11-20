<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/signUp.css">
    <title>Sign Up</title>
</head>
<body>
<?php
session_start();
?>
<div class="container">
    <h1 class="text">Sign Up</h1>
    <form action="register.php" method="post">
        <p>
            <?php
            if (isset($_SESSION['username_error'])) {
                echo $_SESSION['username_error'];
                unset($_SESSION['username_error']);
            }
            ?>
        </p>
        <input type="text" placeholder="username" name="username" required>
        <p>
            <?php
            if (isset($_SESSION['unique_email'])) {
                echo $_SESSION['unique_email'];
                unset($_SESSION['unique_email']);
            }
            ?>
        </p>
        <input type="email" placeholder="email" name="email" required>
        <input type="password" placeholder="password" name="password" required>
        <p>
            <?php
            if (isset($_SESSION['password_error'])) {
                echo $_SESSION['password_error'];
                unset($_SESSION['password_error']);
            }
            ?>
        </p>
        <input type="password" placeholder="confirm password" name="secondPass" required>
        <input type="submit" class="submit">
    </form>
</div>
</body>
</html>