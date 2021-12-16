<?php


namespace App\Http\Helpers;


/**
 * @method get(string $route, array $array)
 * @method post(string $route, array $array)
 * @method put(string $route, array $array)
 * @method patch(string $route, array $array)
 * @method delete(string $route, array $array)
 *
 * @todo Add functionality to interact with web controllers properly.
 */
trait HTTPMethodControllerHelper
{
    protected array $apiHandlers = [
        "get" => "index",
        "post" => "store",
        "put" => "update",
        "patch" => "update",
        "delete" => "delete",
    ];
    protected array $webHandlers = [
        "get" => "index",
        "post" => "create",
    ];

    public function assignAPIController(string $route, string $controller, ?array $handlers = null)
    {
        if (class_exists($controller)) {
            if ($handlers !== null) {
                $this->apiHandlers = $handlers;
            }

            $this->get($route, [$controller, $this->apiHandlers['get']]);
            $this->post($route, [$controller, $this->apiHandlers['post']]);
            $this->put($route, [$controller, $this->apiHandlers['put']]);
            $this->patch($route, [$controller, $this->apiHandlers['patch']]);
            $this->delete($route, [$controller, $this->apiHandlers['delete']]);
        }
    }

    public function assignWebController(string $route, string $controller, ?array $handlers = null)
    {
        if (class_exists($controller)) {
            if ($handlers !== null) {
                $this->webHandlers = $handlers;
            }

            $this->get($route, [$controller, $this->webHandlers['get']]);
            $this->post($route, [$controller, $this->webHandlers['post']]);
        }
    }
}