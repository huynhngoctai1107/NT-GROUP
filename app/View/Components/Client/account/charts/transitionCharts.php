<?php

namespace App\View\Components\client\account\charts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class transitionCharts extends Component
{
    /**
     * Create a new component instance.
     */
    public $dateT;
    public $transitionPay;
    public $transitionMua;
    public function __construct($dateT, $transitionPay, $transitionMua)
    {
        $this->dateT= $dateT;
        $this->transitionPay= $transitionPay;
        $this->transitionMua= $transitionMua;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.account.charts.transition-charts');
    }
}
