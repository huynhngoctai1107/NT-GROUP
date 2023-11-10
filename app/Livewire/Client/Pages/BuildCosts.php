<?php

namespace App\Livewire\Client\Pages;

use Livewire\Component;

class BuildCosts extends Component
{
    public $investment_level=NULL,$land=NULL,$construction=NULL,$construction1=NULL
    ,$road=NULL,$floors=NULL,$basement_type=NULL,$floor_type=NULL, $terrace=NULL,$foundation=NULL,$wide=0,$long=0
    ,$basement=NULL,$yard=NULL,$yard_check=NULL,$calc_area=25,$calc_terrace=NULL,$mezzanine=NULL, $san=NULL,
        $totalPrice=0,$totalArea=NULL;

    protected function rules(){
        return [
            'investment_level' => 'required',
            'construction' => 'required',
            'land' => 'required',
            'construction1' => 'required',
            'road' => 'required',
            'foundation' => 'required',
            'floor_type' => 'required',
            'basement_type' => 'required',
            'wide' => 'required|numeric',
            'long' => 'required|numeric',
        ];
    }
    protected $validationAttributes = [
        'investment_level' => 'Mức đầu tư',
        'construction' => 'Số mặt tiền',
        'land' => 'Mái công trình',
        'construction1' => 'Công trình',
        'road' => 'Đường',
        'foundation' => 'Móng công trình',
        'floor_type' => 'Số tầng',
        'basement_type' => 'Tầng hầm',
        'wide' => 'Chiều rộng',
        'long' => 'Chiều dài',
    ];
    protected $messages = [
        '*.required' => ':attribute không bỏ trống.',
        '*.numeric' => ':attribute không hợp lệ',
        ];
    public function calc_price(){
        //(mái * dv * %) + ((trệt + lầu)*dv * %)+ (hầm * dv * %) + (sân * dv * %) + (tum  * dv * %) + (thượng * dv * %)
        //mái - trệt - lầu - hầm :calc_area | dv: $investment_level | sân: yard | tum: $mezzanine
        // thượng: $calc_terrace | %
        $this->totalPrice = ($this->calc_area * $this->investment_level * $this->land)
        + ((($this->calc_area) + ($this->floor_type *$this->calc_area)) * $this->investment_level * $this->construction * $this->construction1 * $this->road * $this->foundation)
        + ($this->calc_area * $this->investment_level * $this->basement_type)
        + ($this->yard * $this->investment_level * 0.5)
        + ($this->mezzanine * $this->investment_level)
        + ($this->calc_terrace * $this->investment_level * 0.5);
    }


    public function render()
    {
        return view('livewire.client.pages.build-costs');
    }

    public function updated($property){
      //  dd($this->investment_level);
        if($property == 'yard_check'){
            if (isset($this->yard_check)){
                $this->yard = 25;
            }else{
                $this->yard = 0;
            }
        }
        $this->validate();
            $this->calc_terr();
            // tum mezzanine , thượng calc_terrace, dt calc_area, lầu, yard sân
        //dd($this->mezzanine,$this->calc_terrace,($this->calc_area*2),($this->calc_area * $this->floor_type),$this->yard,$this->basement);
        if(isset($this->wide) && isset($this->long)){
            $this->calc_area_();
        }
            if (isset($this->basement_type) && $this->basement_type != 0){
                $this->basement = $this->calc_area;
            }elseif ($this->basement_type == 0){
                $this->basement = 0;
            }
        if($property == 'terrace'){
            if(isset($this->terrace)){
                $this->calc_terr();
            }else{
                $this->calc_terrace = 0;
            }
        }


        if(!$this->yard_check){
            $this->yard= 0;
        }
        if(!$this->terrace){
            $this->calc_terrace= 0;
            $this->mezzanine = 0;
        }




        $this->totalArea = $this->mezzanine +  $this->calc_terrace + ($this->calc_area*2) +
                               ($this->calc_area * $this->floor_type) + $this->yard + $this->basement;
        $this->calc_price();

    }


    public function calc_terr()
    {
        if (isset($this->terrace) && isset($this->calc_area)) {
            $minMazzanine = 0.1 * $this->calc_area; // Giá trị tối thiểu của $mezzanine (10%)
            $maxMazzanine = 0.3 * $this->calc_area; // Giá trị tối đa của $mezzanine (30%)

            // Giới hạn giá trị của $mezzanine trong khoảng từ $minMazzanine đến $maxMazzanine
            if ($this->mezzanine < $minMazzanine) {
                $this->mezzanine = $minMazzanine;
            } elseif ($this->mezzanine > $maxMazzanine) {
                //tum
                $this->mezzanine = $maxMazzanine;
            }

            //sân thượng
            $this->calc_terrace = $this->calc_area - $this->mezzanine;
        }
    }

    public function calc_area_(){
        $this->validate();
        $this->calc_area = intval($this->wide) * intval($this->long);
        if(isset($this->calc_terrace)){
            $this->calc_terr();
        }
    }
    public function reset_cs(){
        $this->investment_level = NULL;
        $this->construction = NULL;
        $this->construction1 = NULL;
        $this->land = NULL;
        $this->road = NULL;
        $this->foundation = NULL;
    }
    public function reset_hs(){
        $this->floors=NULL;
        $this->basement_type=NULL;
        $this->terrace=NULL;
        $this->yard = NULL;
        $this->yard_check = NULL;
        $this->wide=NULL;
        $this->basement = NULL;
        $this->long=NULL;
        $this->floor_type = NULL;
        $this->calc_area = NULL;
    }

    public function mount(){

    }

    public function send(){
    }
}
