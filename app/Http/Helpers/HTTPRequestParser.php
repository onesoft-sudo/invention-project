<?php


namespace App\Http\Helpers;


trait HTTPRequestParser
{
    protected function getHost(string $hostname)
    {
        return explode(":", $hostname)[0];
    }

    protected function getPort(string $hostname)
    {
        $array = explode(":", $hostname);
        return end($array);
    }

    protected function getBaseURI(string $uri)
    {
        $pos = strpos($uri, "?");
        return substr($uri,0, $pos === false ? strlen($uri) : $pos);
    }

    protected function getQueryString(string $uri)
    {
        $pos = strpos($uri, "?");
        return substr($uri, $pos === false ? strlen($uri) : ($pos + 1));
    }
}