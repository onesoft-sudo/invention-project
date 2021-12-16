<?php


namespace App\Http\Helpers;


use App\Core\Request;

trait HTTPMethodRouterHelper
{
    public function addRoute(string $method, string $route, $callback)
    {
        $this->routes[$method][$route] = $callback;
    }

    public function get(string $route, $callback)
    {
        $this->addRoute("GET", $route, $callback);
    }

    public function post(string $route, $callback)
    {
        $this->addRoute("POST", $route, $callback);
    }

    public function put(string $route, $callback)
    {
        $this->addRoute("PUT", $route, $callback);
    }

    public function patch(string $route, $callback)
    {
        $this->addRoute("PATCH", $route, $callback);
    }

    public function delete(string $route, $callback)
    {
        $this->addRoute("DELETE", $route, $callback);
    }

    public function hasRoute(string $route, string $givenMethod = '')
    {
        foreach ($this->routes as $method => $routes) {
            if (array_key_exists($route, $routes)) {
                if ($givenMethod != "" && $method != $givenMethod){
                    continue;
                }

                return ["method" => $method, "route" => $route];
            }
        }

        return false;
    }
}