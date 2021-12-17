<?php


namespace App\Core;


use App\Exceptions\FileNotFoundException;
use OSN\Framework\PowerParser\PowerParser;

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
            $isPower = true;
            $file = App::$app->config["root_dir"] . "/resources/views/layouts/" . $this->name . ".power.php";
        }

        if (!is_file($file)) {
            throw new FileNotFoundException("Couldn't find the specified layout '{$this->name}': No such file or directory");
        }

        if(isset($isPower)) {
            $power = new PowerParser($file);
            $file = ($power)()['file'];
        }

        ob_start();
        include $file;
        $out = ob_get_clean();

        if (isset($isPower))
            unlink($file);

        return $out;
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