<?php


namespace App\Http\Controllers;

use App\Http\Middleware\AuthMiddleware;
use OSN\Framework\Attributes\GETRoute;
use OSN\Framework\Core\Controller;
use OSN\Framework\Facades\Auth;
use OSN\Framework\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([AuthMiddleware::class]);
    }

    #[GETRoute('/dashboard')]
    public function index(): View
    {
        return $this->render("dashboard", ["model" => Auth::user()]);
    }
}
