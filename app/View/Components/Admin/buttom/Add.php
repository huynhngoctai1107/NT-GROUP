<?php

namespace App\View\Components\admin\buttom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Add extends Component
{
    /**
     * Create a new component instance.
     */
    public $router;
    public $name;

    public function __construct($router, $name)
    {
        $this->router = $router;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.buttom.add');
    }
}
