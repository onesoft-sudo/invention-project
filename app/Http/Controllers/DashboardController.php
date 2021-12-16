<?php


namespace App\Http\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Http\Middlewares\AuthMiddleware;
use OSN\Framework\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([AuthMiddleware::class]);
    }

    public function index(): View
    {
        return $this->render("dashboard", ["model" => Auth::user()]);
    }
}