<?php


namespace App\ViewComponents;


use OSN\Framework\View\Component;
use OSN\Framework\View\View;

class Navbar extends Component
{
    /**
     * Render the component.
     *
     * @return View
     * @throws \OSN\Framework\Exceptions\FileNotFoundException
     */
    public function render(): View
    {
        return $this->view('components.home.navbar');
    }
}
