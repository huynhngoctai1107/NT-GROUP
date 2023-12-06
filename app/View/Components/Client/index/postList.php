<?php

namespace App\View\Components\Client\Index;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class postlist extends Component
{
    /**
     * Create a new component instance.
     */
    public $list;
    public function __construct($list)
    {
        $this->list= $list ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.index.postlist');
    }
}
