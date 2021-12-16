<?php


namespace App\Http\Helpers;


use App\Core\App;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;

trait CSRFHelper
{
    public static function generate(): string
    {
        return sha1(rand());
    }

    public static function get()
    {
        return App::$app->session->get("__csrf_token");
    }

    public static function endCSRF()
    {
        App::$app->session->unset("__csrf_token");
    }
}