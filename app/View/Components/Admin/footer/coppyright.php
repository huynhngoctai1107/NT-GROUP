<?php

namespace App\View\Components\Admin\footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class coppyright extends Component
{
    /**
     * Create a new component instance.
     */
    public $name ;
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.footer.coppyright');
    }
}
