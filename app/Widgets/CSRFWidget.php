<?php


namespace App\Widgets;


use App\Core\App;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Http\Helpers\CSRFHelper;

class CSRFWidget
{
    use CSRFHelper;

    public function __toString()
    {
        $token = self::generate();
        App::$app->session->set("__csrf_token", $token);
        return sprintf("\n<input type='hidden' name='__csrf_token' value='%s'>\n", $token);
    }
}