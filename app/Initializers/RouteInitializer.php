<?php


namespace App\Initializers;


use OSN\Framework\Core\Initializer;
use OSN\Framework\Facades\Router;

class RouteInitializer extends Initializer
{
    public ?bool $cgi = true;

    /**
     * Before app initialization.
     * Note that some components/objects might not be initialized at this point.
     *
     * @return void
     */
    public function preinit()
    {

    }

    /**
     * Initialize the router.
     *
     * @return void
     */
    public function init()
    {
        /*
         * The web routes.
         */
        require basepath("/routes/web.php");

        /*
         * The API routes.
         */
        require basepath("/routes/api.php");

        Router::registerAllControllers();
    }

    /**
     * After initialization, when the run() method is called.
     *
     * @return void
     */
    public function afterinit()
    {

    }
}
