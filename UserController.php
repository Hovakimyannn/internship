<?php
session_start();
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class UserController
{
    private Model $jsonDB;
    private User $user;

    public function __construct()
    {
        $this->jsonDB = new Model();
    }

    public function addUser(User $user)
    {
        $this->user = $user;
        if ($this->user->uniqueUser() && $this->user->validation()) {
            $this->jsonDB->write($this->user);
            $_SESSION['user'] = $this->jsonDB->read();
            header('Location:mainPage.php');
        } else {
            header('Location:signUp.php');
            exit;
        }
    }

    public function deleteById(int $id): void
    {
        $users = $this->jsonDB->read();
        foreach ($users as $key => $user) {
            if ($user['userid'] == $id) {
                unset($users[$key]);
                $this->jsonDB->update($users);
                header('location:mainPage.php');
                exit;
            }
        }
    }

    public function getById($id): array|bool
    {
        $users = $this->jsonDB->read();
        $findUser = 0;
        foreach ($users as $key => $user) {
            if ($user['userid'] == $id) {
                $findUser = $user;
            }
        }
        return $findUser;
    }

    public function getAll(): array
    {
        return $this->jsonDB->read();
    }
}

