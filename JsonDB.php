<?php
session_start();
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class JsonDB
{
    public function write(User $user)
    {
        if (self::isEmpty()){
            file_put_contents('usersInfo.json', json_encode($user));
        }else{

            $users = self::read();
            $users[] = $user->user;
            file_put_contents('usersInfo.json', json_encode($users));
        }

      /*  if ($user->uniqueUser() && $user->validation()) {
            $user->setId();*/

       /* } else {
            header('Location:signUp.php');
            exit;
        }*/
    }

    public function read(): array
    {
        if (!self::isEmpty())
        {
            return json_decode(file_get_contents("usersInfo.json"),1);
        }
        return [];
    }

    public function isEmpty(): bool
    {
        return !is_readable('usersInfo.json');
    }
}