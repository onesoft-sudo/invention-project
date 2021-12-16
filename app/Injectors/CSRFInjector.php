<?php


namespace App\Injectors;


use App\Core\App;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Http\Helpers\CSRFHelper;
use OSN\Framework\Core\Injector;

class CSRFInjector extends Injector
{
    use CSRFHelper;

    public function __toString()
    {
        $token = self::generate();
        App::$app->session->set("__csrf_token", $token);
        return $this->renderHTML("\n<input type='hidden' name='__csrf_token' value='%s'>\n", $token);
    }
}