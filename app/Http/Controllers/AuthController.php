<?php


namespace App\Http\Controllers;

use OSN\Framework\Core\App;
use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use OSN\Framework\Core\Controller;
use OSN\Framework\Core\View;
use OSN\Framework\Facades\Request;
use OSN\Framework\Facades\Response;
use App\Http\Middlewares\LoginMiddleware;
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

    public function login(AuthUserRequest $request): View
    {
        if (!$request->validate()) {
            return $this->render("auth", [
                "request" => $request,
                "errors" => $request->getErrors()
            ]);
        }

        $user = new User();

        $user->load([
            "username" => $request->username,
            "password" => Hash::sha1($request->password),
        ]);

        $user = Auth::authUser($user);

        if ($user !== false){
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
