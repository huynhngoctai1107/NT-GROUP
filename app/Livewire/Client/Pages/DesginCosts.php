<?php

namespace App\Livewire\Client\Pages;

use Livewire\Component;
use App\Livewire\Client\Header\Title\DesginCosts as Title;

class DesginCosts extends Component{


    public $construction = '';
    public $design = "";
    public $check;
    public $check1;
    public $check2;
    public $check3;
    public $long;
    public $wide;
    public $longGarden;
    public $wideGarden;
    public $longPenthouse;
    public $widePenthouse;
    public $heightPenthouse;
    // số tầng
    public $floors;
    public $number;
    public $data;
    //diện tích
    public $acreage;
    //Tổng diện tích
    public $sumAcreage;
    public bool $gardenHiden = FALSE;
    public bool $penthouseHiden = FALSE;
    public $sumtotal;
    protected $rules = [
        'construction' => 'required',
        'design'       => 'required',
        'long'         => 'required',
        'wide'         => 'required',
        'floors'       => 'required',
    ];

    protected $messages = [
        'construction.required' => 'Xin vui lòng chọn gói thiết kế.',
        'design.required'       => 'Xin vui lòng chọn loại kiến trúc.',
        'long.required'         => 'Chiều dài không được rỗng',
        'wide.required'         => 'Chiều dài không được rỗng',
        'floors.required'       => 'Số tầng lầu không được rỗng',

    ];

    public function __construct(){

        $this->data = [
            ['id'          => 1,
             'title'       => 'Tầng trệt',
             'images'      => "images/tools/tret.jpg",
             'acreage'     => 25,
             'coefficient' => 100
            ],
        ];

    }

    public function render(){
        return view('livewire.client.pages.desgin-costs');
    }

    public function resset(){
        $this->resetExcept($this->construction, $this->design, $this->check, $this->check1,
            $this->check2, $this->check3, $this->long, $this->wide, $this->floors);
    }

    public
    function send(){
        $this->validate();
        $floorData = [];
        if ($this->check1 == TRUE){
            $floorData[] = [
                'id'          => 10,
                'title'       => 'Sân hàng rào',
                'images'      => "",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 50
            ];
        }

        if ($this->check2 == TRUE){
            $floorData[] = [
                'id'          => 9,
                'title'       => 'Mái',
                'images'      => "images/tools/mai.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 50
            ];
        }

        if ($this->check == TRUE){
            $coefficient = ($this->wide * $this->long) * $this->check2 == TRUE ? 75 : 50 / 100;
            $penthouse   = $this->longPenthouse * $this->widePenthouse * $this->heightPenthouse;
            $floorData[] = [
                'id'          => 7,
                'title'       => 'Sân thượng',
                'subtitle'    => 'Tự động tính theo tum thang',
                'images'      => "images/tools/santhuong.jpg",
                'acreage'     => $coefficient,
                'coefficient' => 100
            ];
            if ($penthouse > (0.5 * $coefficient)){

            }else{
                $floorData[] = [
                    'id'          => 8,
                    'title'       => 'Tum thang',
                    'images'      => "",
                    'acreage'     => $penthouse,
                    'coefficient' => 100
                ];
            }


        }

        if ($this->floors >= 5){
            $floorData[] = [
                'id'          => 6,
                'title'       => 'Diện tích lầu 5',
                'images'      => "images/tools/lau.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];
        }
        if ($this->floors >= 4){
            $floorData[] = [
                'id'          => 5,
                'title'       => 'Diện tích lầu 4',
                'images'      => "images/tools/lau.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];
        }
        if ($this->floors >= 3){
            $floorData[] = [
                'id'          => 4,
                'title'       => 'Diện tích lầu 3',
                'images'      => "images/tools/lau.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];
        }
        if ($this->floors >= 2){
            $floorData[] = [
                'id'          => 3,
                'title'       => 'Diện tích lầu 2',
                'images'      => "images/tools/lau.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];
        }

        if ($this->floors >= 1){
            $floorData[] = [
                'id'          => 2,
                'title'       => 'Diện tích lầu 1',
                'images'      => "images/tools/lau.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];
        }

        if ($this->floors >= 0){
            $floorData[] = [
                'id'          => 1,
                'title'       => 'Tầng trệt',
                'images'      => "images/tools/tret.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];
        }
        if ($this->check3 == TRUE){
            $floorData[] = [
                'id'          => 0,
                'title'       => 'Hầm',
                'images'      => "images/tools/ham.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 50
            ];
        }
        $this->data = $floorData;
    }

    public function garden(){
        if ($this->gardenHiden == TRUE){
            $this->gardenHiden = FALSE;
        }else{

            $this->gardenHiden = TRUE;
        };

    }
    public function penthouse(){
        if ($this->penthouseHiden == TRUE){
            $this->penthouseHiden = FALSE;
        }else{

            $this->penthouseHiden = TRUE;
        };

    }


}
