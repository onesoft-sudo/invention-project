<?php
/**
 * Web routes.
 */

use App\Http\Controllers\APIController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MWController;
use App\Http\Controllers\TestFormController;
use App\Http\Middleware\AuthMiddleware;
use OSN\Framework\Facades\Router;


////Router::get("/test/(\d+)", [APIController::class, 'index'])->name('api.index')->pathRegex(true);
//Router::get("/", [HomeController::class])->name('home');
//Router::get("/posts", "posts");
//Router::assignAPIController("/form", TestFormController::class);
//Router::assignAPIController("/api/v1", APIController::class);
//Router::put("/form", [TestFormController::class, "update"]);
////
////Router::get("/login", [AuthController::class])->name("login");
////Router::post("/login", [AuthController::class, "login"]);
////Router::get("/logout", [AuthController::class, "logout"]);
//
//Router::get("/register", [RegisterController::class])->name('register');
//Router::post("/register", [RegisterController::class, "store"]);
//
//Router::get("/middleware", [MWController::class, 'index']);
//
//Router::get("/dashboard", [DashboardController::class]);
//Router::get('/bind', function (\OSN\Framework\Http\Request $request) {
//    dd($request);
//});
//Router::assignWebController("/params", \App\Http\Controllers\ParameterController::class);
//Router::get("/params/(\d+)/bs/(\d+)-([A-Za-z0-9]+)", [\App\Http\Controllers\ParameterController::class, 'test'])->name('abc');
//
//Router::autoRegister([
//    \App\Http\Controllers\CarController::class,
//    AuthController::class
//]);

//dp(\App\Core\App::$app->router);
