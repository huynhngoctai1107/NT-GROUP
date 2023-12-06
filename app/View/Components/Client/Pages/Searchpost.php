<?php

namespace App\View\Components\Client\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class searchpost extends Component
{
    /**
     * Create a new component instance.
     */
    public $dataToCategory;
    public $dataToDemand;
    public $dataToPrice;
    public $dataToAcreage;
    public function __construct($dataToCategory, $dataToDemand, $dataToPrice, $dataToAcreage)
    {
        $this->dataToCategory= $dataToCategory;
        $this->dataToDemand= $dataToDemand;
        $this->dataToPrice= $dataToPrice;
        $this->dataToAcreage= $dataToAcreage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.pages.searchpost');
    }
}
