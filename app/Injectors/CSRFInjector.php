<?php


namespace App\Injectors;

use OSN\Framework\Core\App;
use OSN\Framework\Core\Injector;
use OSN\Framework\Http\CSRFHelper;

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
