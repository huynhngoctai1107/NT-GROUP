<?php

namespace App\Livewire\Client\Pages;

use Livewire\Component;

class Calculate extends Component{

    public $principal;
    public $annualInterestRate;
    public $loanTermMonths;
    public $amortizationSchedule;
    public $method = '';

    // tổng số tiền lãi phải trả
    public $sumtotoalInterest = 0;


    public function render(){
        return view('livewire.client.pages.calculate');
    }


    public function calculate(){

        $fields   = [
            'principal'          => 'required|min:1|max:5000000000|numeric',
            'loanTermMonths'     => 'required|min:1|max:300|numeric',
            'annualInterestRate' => 'required|min:0|max:20|numeric',
            'method'             => 'required',


        ];
        $messages = [
            'principal.required'          => 'Số tiền gốc là bắt buộc.',
            'principal.min'               => 'Số tiền gốc phải ít nhất là 1',
            'principal.max'               => 'Số tiền gốc cho vay lớn nhất là 5 tỷ',
            'annualInterestRate.max'      => 'Số lãi cao nhất trong một năm là 20%',
            'loanTermMonths.max'          => 'Thời gian vay tối đa là 300 tháng',
            'principal.numeric'           => 'Số tiền gốc phải là một giá trị số.',
            'loanTermMonths.required'     => 'Thời hạn vay (tháng) là bắt buộc.',
            'loanTermMonths.min'          => 'Thời hạn vay (tháng) phải ít nhất là 1.',
            'loanTermMonths.numeric'      => 'Thời hạn vay (tháng) phải là một giá trị số.',
            'annualInterestRate.required' => 'Lãi suất hàng năm là bắt buộc.',
            'annualInterestRate.min'      => 'Lãi suất hàng năm phải ít nhất là 0.',
            'annualInterestRate.numeric'  => 'Lãi suất hàng năm phải là một giá trị số.',
            'method.required'             => 'Phương thức là bắt buộc.',

        ];
        $this->validate($fields, $messages);
        $this->sumtotoalInterest    = 0;
        $this->amortizationSchedule = [];
        $schedule                   = [];


        if ($this->method == 'equalMonthlyPayments'){

            $principalRemaining  = $this->principal;
            $monthlyInterestRate = ($this->annualInterestRate / 12) / 100;
            $emi                 = $this->calculateEMI($this->principal, $this->loanTermMonths,
                $this->annualInterestRate
            );
            for ($i = 1; $i <= $this->loanTermMonths; $i ++){
                $interest           = $principalRemaining * $monthlyInterestRate;
                $principalPaid      = $emi - $interest;
                $principalRemaining -= $principalPaid;

                $schedule[]              = [
                    'Month'              => $i,
                    'EMI'                => round($emi, 0),
                    'Principal'          => round($principalPaid, 0),
                    'Interest'           => round($interest, 0),
                    'RemainingPrincipal' => round($principalRemaining, 0),
                ];
                $this->sumtotoalInterest += round($emi, 0);
            }

        }else{
            $schedule = $this->calculateLoan($this->principal, $this->loanTermMonths,
                $this->annualInterestRate);
        }

        $this->amortizationSchedule = $schedule;
        dd( $this->amortizationSchedule) ;
    }

    private function calculateEMI($principal, $loanTermMonths, $annualInterestRate){
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
        $numerator           = $principal * $monthlyInterestRate * pow((1 + $monthlyInterestRate),
                $loanTermMonths);
        $denominator         = pow((1 + $monthlyInterestRate), $loanTermMonths) - 1;
        $emi                 = $numerator / $denominator;

        return $emi;
    }

    public function calculateLoan($principal, $loanTermMonths, $annualInterestRate){
        $monthlyInterestRate = $annualInterestRate / 100 / 12;
        $monthlyPayment = $principal * ($monthlyInterestRate * pow((1 + $monthlyInterestRate), $loanTermMonths)) / (pow((1 + $monthlyInterestRate), $loanTermMonths) - 1);

        $results = [];
        $remainingBalance = $principal;

        for ($i = 1; $i <= $loanTermMonths; $i++) {
            $interestPayment = ($remainingBalance) * $monthlyInterestRate;
            $principalPayment = $monthlyPayment - $interestPayment;
            $remainingBalance -= $principalPayment;

            $results[] = [
                'Month' => $i,
                'EMI' => round($monthlyPayment, 0),
                'Principal' => round($principalPayment, 0),
                'Interest' => round($interestPayment, 0),
                'RemainingPrincipal' => round($remainingBalance, 0),
            ];

            $this->sumtotoalInterest += round($monthlyPayment, 0);
        }


        return $results;
    }

    public function reset_input(){
        $this->resetExcept($this->principal, $this->annualInterestRate,
            $this->loanTermMonths, $this->method);
    }


}
