<?php
session_start();

unset($_SESSION['username_error']);
unset($_SESSION['password_error']);

class User implements JsonSerializable
{
    protected string $username;
    protected string $email;
    protected string $password;
    public array $user;
    protected int $userid = 0;

    public function __construct($username, $email, $password)
    {
        //$this->setId();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->user = [
            'userid' => $this->userid,
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];

    }

    public function validation(): bool
    {
        if (strlen($this->username) < 2) {
            $_SESSION['username_error'] = 'username is short';
            return false;
        } elseif ($this->password != $_POST['secondPass']) {
            $_SESSION['password_error'] = 'wrong password';
            return false;
        }
        return true;
    }

    public function uniqueUser(): bool
    {
        unset($_SESSION['unique_email']);
        $data = file_get_contents("usersInfo.json");
        $data = json_decode($data, true);
        $result = true;
        foreach ($data as $user) {
            if ($_POST['email'] == $user['email']) {
                $result = false;
                $_SESSION['unique_email'] = 'This mail already exists';
                break;
            }
        }
        return $result;
    }

    public function setId()
    {
        if (!JsonDB::class->isEmpty()) {
            $users = JsonDB::class->read();
            $this->userid = end($users)['userid'] + 1;
        } else {
            $this->userid = 1;
        }
    }

    public function jsonSerialize()
    {
        print_r(JsonDB::class->isEmpty());
        if (JsonDB::class->isEmpty()) {
            return [
                $this->user,
            ];
        } else
            return $this->user;
    }
}



















