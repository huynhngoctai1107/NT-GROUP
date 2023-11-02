<?php

namespace App\View\Components\Client\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class report extends Component
{
    /**
     * Create a new component instance.
     */
    public $report ;
    public function __construct($report)
    {
        $this->report = $report ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.pages.report');
    }
}
