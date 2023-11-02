<?php

namespace App\View\Components\Client\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Searchpost extends Component
{
    /**
     * Create a new component instance.
     */
    public $category;
    public function __construct($category)
    {
        $this->category= $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.pages.searchpost');
    }
}
