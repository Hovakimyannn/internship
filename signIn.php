<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/signIn.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
    session_start();

    if(isset($_SESSION['user'])) {
        header("Location: mainPage.php");
        exit();
    }
    ?>
<div class="container">
    <h1 class="text">Sign In</h1>
    <form action="signingIn.php" method="post">
        <input type="text" placeholder="username" name="username">
        <p>
            <?php
            if(isset($_SESSION['incorrect_password'])) {
                echo $_SESSION['incorrect_password'];
            }
            ?>
        </p>
        <input type="password" placeholder="password" name="password">
        <input type="submit" class="submit">
    </form>
</div>
</body>
</html>