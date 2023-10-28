<?php

namespace App\View\Components\Client\account;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class wallet extends Component
{
     public $payment  ;
    public function __construct($payment)
    {
        $this->payment = $payment ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.account.wallet');
    }
}
