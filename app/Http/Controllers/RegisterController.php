<?php


namespace App\Http\Controllers;

use App\Http\Middlewares\LoginMiddleware;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use OSN\Framework\Core\Controller;
use OSN\Framework\Core\View;
use OSN\Framework\Facades\Hash;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Request;
use OSN\Framework\Facades\Response;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([LoginMiddleware::class]);
    }

    public function index(): View
    {
        return $this->render('register');
    }

    public function store(RegisterUserRequest $request): View
    {
        if (!$request->validate()) {
            return $this->render("register", [
                "request" => $request,
                "errors" => $request->getErrors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::sha1($request->password)
        ]);

        $user = Auth::authUser($user);

        if ($user !== false){
            Response::redirect("/dashboard");
        }
        else {
            App::session()->setFlash("Internal error occurred.");
            Response::redirect("/login");
        }

        exit();
    }
}
