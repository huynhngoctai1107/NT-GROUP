<?php

namespace App\Livewire\Client\Pages;

use Livewire\Component;
use App\Livewire\Client\Header\Title\DesginCosts as Title;

class DesginCosts extends Component{


    public $construction = 0, $design, $check, $check1, $check2, $check3, $long,
        $wide, $hightGarden, $longGarden, $longPenthouse, $widePenthouse,
        $heightPenthouse, $errorPenthouse = "", $sumtotal, $penthouseHiden = FALSE, $errorGarden = "", $gardenHiden = FALSE, $floors, $number, $data, $acreage, $sumAcreage, $Areafloor, $floorsAcreage;



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
        $fields   = [
            'construction' => 'required|min:0|numeric',
            'design'       => 'required|min:0|max:999|numeric',
            'long'         => 'required|min:0|max:999|numeric',
            'wide'         => 'required|min:0|max:999|numeric',
            'floors'       => 'required|min:0|max:999|numeric',
        ];
        $messages = [
            'construction.required' => 'Xây dựng là bắt buộc.',
            'construction.min'      => 'Xây dựng phải lớn hơn hoặc bằng 0.',
            'construction.numeric'  => 'Xây dựng phải là một giá trị số.',
            'design.required'       => 'Thiết kế là bắt buộc.',
            'design.min'            => 'Thiết kế phải lớn hơn hoặc bằng 0.',
            'design.max'            => 'Thiết kế phải nhỏ hơn hoặc bằng 999.',
            'design.numeric'        => 'Thiết kế phải là một giá trị số.',
            'long.required'         => 'Chiều dài là bắt buộc.',
            'long.min'              => 'Chiều dài phải lớn hơn hoặc bằng 0.',
            'long.max'              => 'Chiều dài phải nhỏ hơn hoặc bằng 999.',
            'wide.required'         => 'Chiều rộng là bắt buộc.',
            'wide.min'              => 'Chiều rộng phải lớn hơn hoặc bằng 0.',
            'wide.numeric'          => 'Chiều rộng phải là một giá trị số.',
            'wide.max'              => 'Chiều rộng phải nhỏ hơn hoặc bằng 999.',
            'floors.required'       => 'Số tầng là bắt buộc.',
            'floors.min'            => 'Số tầng phải lớn hơn hoặc bằng 0.',
            'floors.max'            => 'Số tầng phải nhỏ hơn hoặc bằng 999.',
            'floors.numeric'        => 'Số tầng phải là một giá trị số.',
        ];
        if ($this->penthouseHiden == TRUE){
            $fields['longPenthouse']   = 'required|min:0|max:999|numeric';
            $fields['widePenthouse']   = 'required|min:0|max:999|numeric';
            $fields['heightPenthouse'] = 'required|min:0|max:999|numeric';

            $messages['longPenthouse.required']   = 'Chiều dài của tum thắng là bắt buộc.';
            $messages['longPenthouse.min']        = 'Chiều dài của tum thắng phải lớn hơn hoặc bằng 0.';
            $messages['longPenthouse.numeric']    = 'Chiều dài của tum thắng phải là một giá trị số.';
            $messages['longPenthouse.max']        = 'Chiều dài của tum thắng phải nhỏ hơn hoặc bằng 999.';
            $messages['widePenthouse.required']   = 'Chiều rộng của tum thắng là bắt buộc.';
            $messages['widePenthouse.min']        = 'Chiều rộng của tum thắng phải lớn hơn hoặc bằng 0.';
            $messages['widePenthouse.max']        = 'Chiều rộng của tum thắng phải nhỏ hơn hoặc bằng 999.';
            $messages['widePenthouse.numeric']    = 'Chiều rộng của tum thắng phải là một giá trị số.';
            $messages['heightPenthouse.required'] = 'Chiều cao của tum thắng là bắt buộc.';
            $messages['heightPenthouse.min']      = 'Chiều cao của tum thắng phải lớn hơn hoặc bằng 0.';
            $messages['heightPenthouse.numeric']  = 'Chiều cao của tum thắng phải là một giá trị số.';
            $messages['heightPenthouse.max']      = 'Chiều cao của tum thắng phải nhỏ hơn hoặc bằng 999.';
        }
        if ($this->gardenHiden == TRUE){
            $fields['hightGarden'] = 'required|min:0|numeric';
            $fields['longGarden']  = 'required|min:0|max:999|numeric';

            $messages['hightGarden.required'] = 'Chiều cao của Vườn là bắt buộc.';
            $messages['hightGarden.min']      = 'Chiều cao của Vườn phải lớn hơn hoặc bằng 0.';
            $messages['hightGarden.numeric']  = 'Chiều cao của Vườn phải là một giá trị số.';

            $messages['wideGarden.required'] = 'Chiều rộng của Vườn là bắt buộc.';
            $messages['longGarden.numeric']  = 'Chiều rộng của Vườn phải là một giá trị số.';
            $messages['longGarden.min']      = 'Chiều rộng của Vườn phải lớn hơn hoặc bằng 0.';
            $messages['longGarden.max']      = 'Chiều rộng của Vườn phải nhỏ hơn hoặc bằng 999.';
        }

        $this->validate($fields, $messages);
        $floorData        = [];
        $this->sumtotal   = 0;
        $this->sumAcreage = 0;
        $this->Areafloor  = $this->wide * $this->long;
        if ($this->gardenHiden == TRUE){
            $errorGarden   = "";
            $acreageGarden = $this->wide * ($this->longGarden + $this->hightGarden);
            if ($this->hightGarden < 2.6){
                $floorData[]      = [
                    'id'          => 10,
                    'title'       => 'Sân hàng rào',
                    'images'      => "",
                    'acreage'     => $acreageGarden,
                    'coefficient' => 50
                ];
                $this->sumAcreage += ($acreageGarden);
                $this->sumtotal   += $this->construction * $acreageGarden * 0.5;
            }else{
                $this->errorGarden = "Chiều cao tối đa của hàng rào là 2.6m. Xin vui lòng thử lại";

            }

        }else{
            $this->hightGarden = '';
            $this->wideGarden  = '';
        }

        if ($this->check2 == TRUE){
            $floorData[]      = [
                'id'          => 9,
                'title'       => 'Mái và lam trang trí',
                'images'      => "images/tools/mai.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 50
            ];
            $this->sumAcreage += ($this->wide * $this->long);

            $this->sumtotal += $this->construction * ($this->wide * $this->long) * 0.5;

        }

        if ($this->penthouseHiden == TRUE){
            $this->errorPenthouse = "";
                $coefficient          = ($this->wide * $this->long) * ($this->check2 == TRUE ? 75 : 50) / 100;
            $penthouse            = $this->longPenthouse * $this->widePenthouse * $this->heightPenthouse;
            if ($penthouse > (0.3 * $coefficient)){
                $this->errorPenthouse = "Diện tích tum thắng vượt 30% tổng hiện tích sàn";
            }else{

                $this->sumAcreage += $coefficient;


                $floorData[]    = [
                    'id'          => 7,
                    'title'       => 'Sân thượng',
                    'subtitle'    => 'Tự động tính theo tum thang',
                    'images'      => "images/tools/santhuong.jpg",
                    'acreage'     => $coefficient - $penthouse,
                    'coefficient' => 50
                ];
                $this->sumtotal += $this->construction * ($coefficient - $penthouse) * 0.5;
                $floorData[]    = [
                    'id'          => 8,
                    'title'       => 'Tum thang',
                    'images'      => "",
                    'acreage'     => $penthouse,
                    'coefficient' => 100
                ];
                $this->sumtotal += $this->construction * $penthouse;
            }
        }else{
            $this->longPenthouse   = "";
            $this->widePenthouse   = "";
            $this->heightPenthouse = "";
        }
        for ($i = $this->floors; $i <= $this->floors; $i --){
            $title       = ($i == 0) ? 'Tầng trệt' : "Diện tích lầu $i";
            $images      = ($i == 0) ? 'images/tools/tret.jpg' : 'images/tools/lau.jpg';
            $floorData[] = [
                'id'          => $i + 1,
                'title'       => $title,
                'images'      => $images,
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 100
            ];

            $this->sumAcreage += ($this->wide * $this->long);
            $this->sumtotal   += $this->construction * $this->wide * $this->long;
            if ($i <= 0){
                break;
            }
        }


        if ($this->check3 == TRUE){
            $floorData[]     = [
                'id'          => 0,
                'title'       => 'Hầm',
                'images'      => "images/tools/ham.jpg",
                'acreage'     => $this->wide * $this->long,
                'coefficient' => 50
            ];
            $this->sumAcreage += ($this->wide * $this->long);
            $this->Areafloor += $this->Areafloor;
            $this->sumtotal  += ($this->wide * $this->long) * $this->construction * 0.5;
        }

        $this->floorsAcreage = $this->floors * ($this->wide * $this->long);
        $this->data          = $floorData;

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
