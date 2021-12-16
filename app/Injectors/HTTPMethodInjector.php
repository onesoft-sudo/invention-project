<?php

namespace App\Injectors;

use OSN\Framework\Core\Injector;

class HTTPMethodInjector extends Injector
{
    private string $method;

    /**
     * HTTPMethodInjector constructor.
     * @param string $method
     */
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function __toString()
    {
        return $this->renderHTML("\n<input type='hidden' name='__method' value='%s'>\n", $this->method);
    }
}