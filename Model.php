<?php
session_start();
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class Model
{
    public function write(User $user)
    {
        if (self::isEmpty()) {
            file_put_contents('usersInfo.json', json_encode($user));
        } else {
            $users = self::read();
            $users[] = $user->user;
            file_put_contents('usersInfo.json', json_encode($users));
        }
    }

    public function read(): array
    {
        if (!self::isEmpty()) {
            return json_decode(file_get_contents("usersInfo.json"), 1);
        }
        return [];
    }

    public function update(array $users)
    {
        $myUsers = [];
        foreach ($users as $user) {
            $myUsers[] = $user;
        }
        file_put_contents('usersInfo.json', json_encode($myUsers));
    }

    public function isEmpty(): bool
    {
        return !filesize('usersInfo.json');
    }
}