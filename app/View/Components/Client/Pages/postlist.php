<?php

namespace App\View\Components\client\pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class postlist extends Component
{
    /**
     * Create a new component instance.
     */
    public $postList;
    public function __construct($postList)
    {
        $this->postList = $postList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.pages.postlist');
    }
}
