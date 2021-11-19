<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    <style>
        * {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 25px;
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px 10px;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 100px auto;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        .hidden {
            display: none;
        }
    </style>
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
                        <input type='submit' name='userid' value='delete'>
                    </form>
               </th>
            </tr>";
    }

    ?>
</table>
<a href="logOut.php">Log Out</a>
</body>
</html>