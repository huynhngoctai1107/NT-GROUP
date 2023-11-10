<?php

namespace App\Livewire\Client\Pages;

use Livewire\Component;

class Calculate extends Component{

    public $principal;
    public $annualInterestRate;
    public $loanTermMonths;
    public $amortizationSchedule = [];
    public $equalMonthlyPayment = FALSE;
    public $monthlyReducedAmount = FALSE;
    public $error ;
    public function render(){
        return view('livewire.client.pages.calculate');
    }

    public function calculateAmortizationSchedule(){
        if($this->equalMonthlyPayment == TRUE){
            $schedule            = [];
            $principalRemaining  = $this->principal;
            $monthlyInterestRate = ($this->annualInterestRate / 12) / 100;
            $emi                 = $this->calculateEMI($this->principal, $this->annualInterestRate,
                $this->loanTermMonths);

            for ($i = 1; $i <= $this->loanTermMonths; $i ++){
                $interest           = $principalRemaining * $monthlyInterestRate;
                $principalPaid      = $emi - $interest;
                $principalRemaining -= $principalPaid;

                $schedule[] = [
                    'Month'              => $i,
                    'EMI'                => round($emi, 2),
                    'Principal'          => round($principalPaid, 2),
                    'Interest'           => round($interest, 2),
                    'RemainingPrincipal' => round($principalRemaining, 2),
                ];
            }
            $this->amortizationSchedule = $schedule ;
        }elseif($this->equalMonthlyPayment == true){

        }else{
            $this->error = "Vui lòng chọn phương thức tính lãi" ;
        }


//        dd( $this->amortizationSchedule = $schedule);
    }

    private function calculateEMI($principal, $annualInterestRate, $loanTermMonths){
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
        $numerator           = $principal * $monthlyInterestRate * pow((1 + $monthlyInterestRate),
                $loanTermMonths);
        $denominator         = pow((1 + $monthlyInterestRate), $loanTermMonths) - 1;
        $emi                 = $numerator / $denominator;

        return $emi;
    }
    public function equalMonthlyPayments(){
        if ($this->equalMonthlyPayment == TRUE){
            $this->equalMonthlyPayment = FALSE;
        }else{

            $this->monthlyReducedAmount = TRUE;
        };

    }
    public function monthlyReducedAmounts(){
        if ($this->monthlyReducedAmount == TRUE){
            $this->monthlyReducedAmount = FALSE;
        }else{

            $this->monthlyReducedAmount = TRUE;
        };
    }


}
