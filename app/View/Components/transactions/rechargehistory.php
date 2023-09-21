<?php

namespace App\View\Components\transactions;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class rechargehistory extends Component
{
    /**
     * Create a new component instance.
     */
    public $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.transactions.rechargehistory');
    }
}
