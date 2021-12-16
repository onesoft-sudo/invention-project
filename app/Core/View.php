<?php


namespace App\Core;

use OSN\Framework\Facades\Request;
use App\Exceptions\FileNotFoundException;

class View
{
    protected string $name;
    protected $layout;
    protected array $data;

    /**
     * View constructor.
     */
    public function __construct(string $name, $data = [], $layout = '')
    {
        $this->name = str_replace('.', '/', $name);
        $this->layout = $layout === '' ? App::$app->config["layout"] : $layout;
        $this->data = $data;
    }

    public function render()
    {
        $view = $this->renderView();

        if ($this->layout === false)
             return $view;

        $layout = new Layout($this->layout);
        return preg_replace("/\{\{( *)view( *)\}\}/", $view, $layout);
    }

    /**
     * @throws FileNotFoundException
     */
    public function renderView()
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        $file = App::$app->config["root_dir"] . "/resources/views/" . $this->name . ".php";

        if (!is_file($file)) {
            throw new FileNotFoundException("Couldn't find the specified view '{$this->name}': No such file or directory");
        }

        ob_start();
        include $file;
        return ob_get_clean();
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