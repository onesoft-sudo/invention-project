<?php

require "../vendor/autoload.php";

use App\Core\App;
use OSN\Framework\Facades\Router;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MWController;
use App\Http\Controllers\TestFormController;

$app = new App("..");

Router::get("/", [HomeController::class]);
Router::get("/posts", "posts");
Router::assignAPIController("/form", TestFormController::class);

Router::get("/login", [AuthController::class]);
Router::post("/login", [AuthController::class, "login"]);
Router::get("/logout", [AuthController::class, "logout"]);

Router::get("/middleware", [MWController::class]);
Router::post("/middleware", [MWController::class]);

Router::get("/dashboard", [DashboardController::class]);

$app->run();