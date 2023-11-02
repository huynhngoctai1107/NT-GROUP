<?php

namespace App\View\Components\client\account\charts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class postCharts extends Component
{
    /**
     * Create a new component instance.
     */
    public $dates;
    public $vip;
    public $charts;
    public function __construct($dates, $vip, $charts)
    {
        $this->dates= $dates ;
        $this->vip= $vip ;
        $this->charts= $charts ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.account.charts.post-charts');
    }
}
