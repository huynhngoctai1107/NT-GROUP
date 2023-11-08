<?php

namespace App\View\Components\client\account\charts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class userChart extends Component
{
    /**
     * Create a new component instance.
     */
    public $userchart;
    public function __construct($userchart)
    {
        $this->userchart= $userchart ;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.account.charts.user-chart');
    }
}
