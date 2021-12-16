<?php


namespace App\Http\Controllers;

use App\Core\App;
use App\Core\Controller;
use OSN\Framework\Facades\Request;
use OSN\Framework\Facades\Response;
use App\Core\View;
use App\Http\Middlewares\LoginMiddleware;
use App\Models\UserLogin;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([LoginMiddleware::class], ["index", "login"]);
    }

    public function index(): View
    {
        return $this->render("auth");
    }

    public function login(): View
    {
        $username = Request::post("username");
        $password = Request::post("password");

        $userLogin = new UserLogin();

        $userLogin->load([
            "username" => $username,
            "password" => $password,
        ]);

        if (!$userLogin->validate()) {
            return $this->render("auth", [
                "model" => $userLogin,
                "errors" => $userLogin->getErrors()
            ]);
        }

        $userLogin->load([
            "password" => Hash::sha1($password),
        ]);

        $user = Auth::authUser($userLogin);

        if ($user !== false){
            App::session()->setFromModel($user, ["password", "passwordConfirmation"]);
            Response::redirect("/dashboard");
        }
        else {
            App::session()->setFlash("Incorrect username or password.");
            Response::redirect("/login");
        }

        exit();
    }

    public function logout()
    {
        Auth::destroyAuth();
        Response::redirect("/login");
        exit();
    }
}