<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/mainPage.css">
    <title>Main Page</title>
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>user Email</th>
        <th>Password</th>
    </tr>

    <?php
    session_start();
    spl_autoload_register(function ($className) {
        require $className . '.php';
    });
    $jsonDB = new JsonDB();
    $data = $jsonDB->read();

    foreach ($data as $key => $item) {
        echo "<tr> 
                <th>{$item['userid']}</th> 
                <th>{$item['username']}</th> 
                <th>{$item['email']}</th> 
                <th>{$item['password']}</th> 
                <th>
                    <form action='delete.php' method='post'>
                        <input class='hidden' type='text' name='id' value={$item['userid']}>
                        <input class='delete-button' type='submit' name='userid' value='delete'>
                    </form>
               </th>
            </tr>";
    }
    ?>
</table>
<a href="logOut.php">Log Out</a>
</body>
</html>