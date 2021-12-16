<?php


namespace App\Core;


use App\Exceptions\FileNotFoundException;

class Layout
{
    protected string $name;

    /**
     * Layout constructor.
     */
    public function __construct(string $name)
    {
        $this->name = str_replace('.', '/', $name);
    }

    /**
     * @throws FileNotFoundException
     */
    public function getContents()
    {
        $file = App::$app->config["root_dir"] . "/resources/views/layouts/" . $this->name . ".php";

        if (!is_file($file)) {
            throw new FileNotFoundException("Couldn't find the specified layout '{$this->name}': No such file or directory");
        }

        ob_start();
        include $file;
        return ob_get_clean();
    }

    public function getName()
    {
        return $this->name;
    }

    public function __invoke()
    {
        return $this->getContents();
    }

    public function __toString()
    {
        return $this->getContents();
    }
}