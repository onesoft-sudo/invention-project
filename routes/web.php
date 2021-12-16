<?php
/**
 * Web routes.
 */

use App\Http\Controllers\RegisterController;
use OSN\Framework\Facades\Router;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MWController;
use App\Http\Controllers\TestFormController;


Router::get("/", [HomeController::class]);
Router::get("/posts", "posts");
Router::assignAPIController("/form", TestFormController::class);

Router::get("/login", [AuthController::class]);
Router::post("/login", [AuthController::class, "login"]);
Router::get("/logout", [AuthController::class, "logout"]);

Router::get("/register", [RegisterController::class]);
Router::post("/register", [RegisterController::class, "store"]);

Router::get("/middleware", [MWController::class]);
Router::post("/middleware", [MWController::class]);

Router::get("/dashboard", [DashboardController::class]);
