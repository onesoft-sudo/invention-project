<?php


namespace App\Core;


use App\Exceptions\HTTPException;
use App\Http\Kernel;
use OSN\Envoy\Exception;
use OSN\Envoy\ParseENV;

/**
 * Class App
 * @package App\Core
 */
class App
{
    public array $config = [
        "root_dir" => ".",
        "layout" => "main"
    ];

    public static self $app;

    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;

    public array $env = [];

    /**
     * @throws Exception
     */
    public function __construct(string $rootpath = ".")
    {
        $this->config["root_dir"] = $rootpath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->session = new Session();
        $this->env = (new ParseENV())->parseFile($this->config["root_dir"] . "/.env");
        $this->db = new Database($this->env);
        self::$app = $this;
    }

    public static function session(): Session
    {
        return self::$app->session;
    }

    public static function db(): Database
    {
        return self::$app->db;
    }

    public static function request(): Request
    {
        return self::$app->request;
    }

    public static function response(): Response
    {
        return self::$app->response;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        }
        catch (HTTPException $e) {
            $this->response->setStatus($e->getCode() . " " . $e->getMessage());
            echo new View("errors." . $e->getCode(), ["uri" => $this->request->baseURI, "method" => $this->request->method]);
        }
    }
}