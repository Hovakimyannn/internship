<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/welcome.css">
    <title>Welcome</title>
</head>
<body>
<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: mainPage.php");
    exit();
}
?>
<div class="container">
    <h1 class="text">Welcome <3</h1>
    <a href="signIn.php" class="link">Sign In</a>
    <a href="signUp.php" class="link">Sign Up</a>
</div>
</body>
</html>