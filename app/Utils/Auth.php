<?php


namespace App\Utils;


use App\Core\App;
use App\Models\User;
use App\Models\UserLogin;
use OSN\Framework\Facades\Hash;

class Auth
{
    public function isAuthenticated(): bool
    {
        return App::session()->get("uid") !== false;
    }

    /**
     *  @return User|bool
     */
    public function authUser(UserLogin $model)
    {
        $q = App::db()->prepare("SELECT * FROM users WHERE username = :u AND password = :p");

        $username = $model->username;
        $password = $model->password;

        $q->execute([
            "u" => $username,
            "p" => Hash::sha1($password)
        ]);

        $userData = $q->fetchAll(\PDO::FETCH_ASSOC);

        if (count($userData) > 0) {
            $user = new User();

            $user->load([
                "name" => $userData[0]["name"],
                "email" => $userData[0]["email"],
                "uid" => $userData[0]["uid"],
                "username" => $username,
                "password" => $password
            ], true);

            return $user;
        }
        else {
            return false;
        }
    }

    public function user(): ?User
    {
        if (!self::isAuthenticated()) {
            return null;
        }

        $q = App::db()->prepare("SELECT * FROM users WHERE uid = :uid");
        $q->execute(["uid" => App::session()->get("uid")]);
        $userData = $q->fetchAll(\PDO::FETCH_ASSOC);

        if (count($userData) > 0) {
            $user = new User();
            $user->load($userData[0], true);

            return $user;
        }

        return null;
    }

    public function destroyAuth()
    {
        App::session()->destroy();
    }
}