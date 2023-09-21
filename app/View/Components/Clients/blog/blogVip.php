<?php

namespace App\View\Components\Clients\blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogVip extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $img;
    public $address;
    public $price;

    public function __construct($name, $img, $address, $price)
    {
        $this->name= $name ;
        $this->img= $img ;
        $this->address= $address ;
        $this->price= $price ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clients.blog.blog-vip');
    }
}
