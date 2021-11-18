<?php

$json = file_get_contents('usersInfo.json');
$users = json_decode($json,1);

foreach ($users as $key =>$item) {
    if ($item['userid']==$_POST['id'])
    {
        unset($users[$key]);
        file_put_contents('usersInfo.json',json_encode($users));
        header('location:mainPage.php');
        exit;
    }
}