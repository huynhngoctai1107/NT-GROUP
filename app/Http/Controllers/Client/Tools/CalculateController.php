<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tools\CalculateRequest;
use Illuminate\Http\Request;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class CalculateController extends Controller{

    public function index(){
        return view('client.pages.calculate',
            ['amortizationSchedule' => 0, 'sumtotoalInterest' => 0, 'principal' => 0]);
    }

    public function calculate(CalculateRequest $request){
//        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));
//        if ($score > 0.7){
            $sumtotoalInterest    = 0;
            $amortizationSchedule = [];
            $schedule             = [];
            if ($request->method == 'equalMonthlyPayments'){
                $principalRemaining  = $request->principal;
                $monthlyInterestRate = ($request->annualInterestRate / 12) / 100;
                $emi                 = $this->calculateEMI($request->principal,
                    $request->loanTermMonths,
                    $request->annualInterestRate
                );
                for ($i = 1; $i <= $request->loanTermMonths; $i ++){
                    $interest           = $principalRemaining * $monthlyInterestRate;
                    $principalPaid      = $emi - $interest;
                    $principalRemaining -= $principalPaid;

                    $schedule[]        = [
                        'Month'              => $i,
                        'EMI'                => round($emi, 0),
                        'Principal'          => round($principalPaid, 0),
                        'Interest'           => round($interest, 0),
                        'RemainingPrincipal' => round($principalRemaining, 0),
                    ];
                    $sumtotoalInterest += round($emi, 0);
                }

            }else{
                $temp              = $this->calculateLoan($request->principal,
                    $request->loanTermMonths,
                    $request->annualInterestRate);
                $schedule          = $temp['schedule'];
                $sumtotoalInterest = $temp['sumtotoalInterest'];
            }

            $amortizationSchedule = $schedule;

            return view('client.pages.calculate',
                ['amortizationSchedule' => $amortizationSchedule, 'sumtotoalInterest' => $sumtotoalInterest,
                 'principal'            => $request->principal,
                 "annualInterestRate"   => $request->annualInterestRate,
                 "loanTermMonths"       => $request->loanTermMonths,
                 "method"               => $request->method]);
//        }else{
//            return Redirect()
//                ->route('error')
//                ->with(['error' => "Có thể bạn là robot. Vui lòng thử lại", "title" => 403]); //404
//        }
    }

    private function calculateEMI($principal, $loanTermMonths, $annualInterestRate){
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
        $numerator           = $principal * $monthlyInterestRate * pow((1 + $monthlyInterestRate),
                $loanTermMonths);
        $denominator         = pow((1 + $monthlyInterestRate), $loanTermMonths) - 1;
        $emi                 = $numerator / $denominator;

        return $emi;
    }

    //    public function calculateLoan($principal, $loanTermMonths, $annualInterestRate){
    //        $sumtotoalInterest   = 0;
    //        $monthlyInterestRate = $annualInterestRate / 100 / 12;
    //        $monthlyPayment      = $principal * ($monthlyInterestRate * pow((1 + $monthlyInterestRate),
    //                    $loanTermMonths)) / (pow((1 + $monthlyInterestRate), $loanTermMonths) - 1);
    //
    //        $schedule         = [];
    //        $remainingBalance = $principal;
    //
    //        for ($i = 1; $i <= $loanTermMonths; $i ++){
    //            $interestPayment  = ($remainingBalance) * $monthlyInterestRate;
    //            $principalPayment = $monthlyPayment - $interestPayment;
    //            $remainingBalance -= $principalPayment;
    //
    //            $schedule[] = [
    //                'Month'              => $i,
    //                'EMI'                => round($monthlyPayment, 0),
    //                'Principal'          => round($principalPayment, 0),
    //                'Interest'           => round($interestPayment, 0),
    //                'RemainingPrincipal' => round($remainingBalance, 0),
    //            ];
    //
    //            $sumtotoalInterest += round($monthlyPayment, 0);
    //        }
    //
    //
    //        return [
    //            'schedule'          => $schedule,
    //            'sumtotoalInterest' => $sumtotoalInterest
    //        ];
    //    }

    public function calculateLoan($principal, $loanTermMonths, $annualInterestRate){
        $amount        = $principal;
        $interest_rate = $annualInterestRate;
        $term          = $loanTermMonths;

        $interest_rate = $interest_rate / 100 / 12;

        $monthly_payment = $amount * (
                (1 + $interest_rate) ** $term - 1
            ) / $interest_rate;

        $sumtotoalInterest = 0;
//
        $payments          = [];
        for ($i = 1; $i <= $term; $i ++){
            $principal -= ($amount / $term);
            $payments[]        = [
                'Month'              => $i,
                'EMI'                => round($monthly_payment, 0),
                'Principal'          => round(($amount / $term)),
                'Interest'           => round($amount * $interest_rate / 12 * ($term - $i + 1)),
                'RemainingPrincipal' => $principal,

            ];
            $sumtotoalInterest += round($monthly_payment, 0);
        }

        return [
            'schedule'          => $payments,
            'sumtotoalInterest' => $sumtotoalInterest
        ];
    }


    public function resetTool(Request $request){
        $request->flush();

        return redirect()->back();
    }


}
