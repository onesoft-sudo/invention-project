<?php


namespace App\Http\Controllers;

use OSN\Framework\Attributes\GETRoute;
use OSN\Framework\Attributes\Route;
use OSN\Framework\Core\Controller;

class CarController extends Controller
{
    #[Route(route: "/cars/index", method: 'GET')]
    public function index()
    {
        return 'indexing';
    }

    #[GETRoute(route: "/cars/load")]
    public function onderz()
    {
        return 'cejh';
    }
}
