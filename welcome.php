<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            height: 100vh;
            margin: 0 auto;
            text-align: center;
        }

        .text {
            font-size: 50px;
            padding-top: 150px;
        }

        .link {
            width: 200px;
            height: 30px;
            display: block;
            text-decoration: none;
            color: black;
            border: 2px solid black;
            margin-left: 150px;
            margin-top: 20px;
            padding: 5px 10px;
            font-size: 25px;
            font-weight: bold;
            transition: 1s;
            background-color: white;
            border-radius: 10px;
        }

        .link:hover {
            background-color: black;
            color: white;
        }

    </style>
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
        <h1 class="text">Welcome <3</h1>
        <a href="signIn.php" class="link">Sign In</a>
        <a href="signUp.php" class="link">Sign Up</a>
    </div>
</body>
</html>