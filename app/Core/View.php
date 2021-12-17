<?php


namespace App\Core;

use OSN\Framework\Facades\Request;
use App\Exceptions\FileNotFoundException;
use OSN\Framework\PowerParser\PowerParser;

class View
{
    protected string $name;
    protected $layout;
    protected array $data;
    protected PowerParser $parser;
    protected string $file;

    /**
     * View constructor.
     * @throws FileNotFoundException
     */
    public function __construct(string $name, $data = [], $layout = '')
    {
        $this->name = str_replace('.', '/', $name);
        $this->layout = $layout === '' ? App::$app->config["layout"] : $layout;
        $this->data = $data;

        $file = App::$app->config["root_dir"] . "/resources/views/" . $this->name . ".php";

        if (!is_file($file)) {
            $file = App::$app->config["root_dir"] . "/resources/views/" . $this->name . ".power.php";
        }

        if (!is_file($file)) {
            throw new FileNotFoundException("Couldn't find the specified view '{$this->name}': No such file or directory");
        }

        $this->file = $file;

        $this->parser = new PowerParser($file);
    }

    public function render()
    {
        $view = $this->renderView();

        if ($this->layout === false)
             return $view;

        $layout = new Layout($this->layout);
        return preg_replace("/\[\[( *)view( *)\]\]/", $view, $layout);
    }

    public function renderView()
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        if (preg_match('/\.power\.php/', basename($this->file))) {
            $isPower = true;
            $file = ($this->parser)()['file'];
        }
        else
            $file = $this->file;

        ob_start();
        include $file;
        $out = ob_get_clean();

        if (isset($isPower))
            unlink($file);

        return $out;
    }

    public function getURI()
    {
        return App::request()->baseURI;
    }

    public function __invoke()
    {
        return $this->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}