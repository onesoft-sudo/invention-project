<?php


namespace App\Http\Controllers;

use OSN\Framework\Core\App;
use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use OSN\Framework\Core\Controller;
use OSN\Framework\Facades\Response;
use App\Http\Middleware\LoginMiddleware;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Hash;
use OSN\Framework\View\View;

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

    public function login(AuthUserRequest $request)
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
            return Response::redirect("/dashboard");
        }
        else {
            App::session()->setFlash("Incorrect username or password.");
            return Response::redirect("/login");
        }
    }

    public function logout()
    {
        Auth::destroyAuth();
        return Response::redirect("/login");
    }
}
