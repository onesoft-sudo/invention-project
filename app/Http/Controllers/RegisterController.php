<?php


namespace App\Http\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Core\View;
use App\Models\User;
use App\Models\UserLogin;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Request;
use OSN\Framework\Facades\Response;

class RegisterController extends Controller
{
    public function index(): View
    {
        return $this->render('register');
    }

    public function store(): View
    {
        $user = new User();

        $user->load([
            "name" => Request::post('name'),
            "email" => Request::post('email'),
            "username" => Request::post('username'),
            "password" => Request::post('password'),
            "passwordConfirmation" => Request::post('passwordConfirmation'),
        ]);

        if (!$user->validate() || $user->isUnique() !== true || !$user->save()) {
            return $this->render("register", [
                "model" => $user,
                "errors" => $user->getErrors()
            ]);
        }

        $user = Auth::authUser(new UserLogin([
            "username" => $user->username,
            "password" => $user->password
        ]));

        if ($user !== false){
            App::session()->setFromModel($user, ["password", "passwordConfirmation"]);
            Response::redirect("/dashboard");
        }
        else {
            App::session()->setFlash("Internal error occurred.");
            Response::redirect("/login");
        }

        exit();
    }
}