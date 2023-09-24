<?php

namespace App\View\Components\Client\blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogList extends Component{

    /**
     * Create a new component instance.
     */
    public $name;
    public $img;
    public $date;
    public $description;

    public function __construct($name, $img, $date, $description)
    {
        $this->name= $name ;
        $this->img= $img ;
        $this->date= $date ;
        $this->description= $description ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clients.blog.blog-list');
    }
}
