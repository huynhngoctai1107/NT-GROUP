<?php

namespace App\View\Components\Client\Account;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class follower extends Component{

    /**
     * Create a new component instance.
     */
    public $getFollow;
        public $check;
    public function __construct($getFollow,$check){
        $this->getFollow = $getFollow;
        $this->check =$check  ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    : View|Closure|string{
        return view('components.client.account.follower');
    }
}
