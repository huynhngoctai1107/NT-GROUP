<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tools\CalculateRequest;
use Illuminate\Http\Request;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class CalculateController extends Controller{

    public function index(){
        return view('client.pages.calculate',
            [ 'sumtotoalInterest' => 0,'principal' => 0]);
    }

    public function calculate(CalculateRequest $request){
            $sumtotoalInterest    = 0;
            $amortizationSchedule = [];
            $schedule             = [];
            //Phương thức thanh toán, trong trường hợp này là gốc cố định,lãi giảm dần
            if ($request->method == 'equalMonthlyPayments'){
                $principalRemaining  = $request->principal; //Số tiền còn lại của khoản vay, được khởi tạo bằng số tiền vay ban đầu.
                $monthlyInterestRate = ($request->annualInterestRate / 12) / 100;//Lãi suất hàng tháng, được tính bằng cách chia lãi suất hàng năm cho 12 và chia cho 100.
                $emi                 = $this->calculateEMI($request->principal,//Số tiền thanh toán hàng tháng, được tính toán bằng hàm calculateEMI.
                    $request->loanTermMonths,//Thời hạn vay tính bằng tháng.
                    $request->annualInterestRate //Lãi suất hàng năm.
                );
                for ($i = 1; $i <= $request->loanTermMonths; $i ++){
                    $interest           = $principalRemaining * $monthlyInterestRate;
                    $principalPaid      = $emi - $interest;
                    $principalRemaining -= $principalPaid; //Cập nhật số tiền gốc còn lại ($principalRemaining).
                    //Mảng lưu trữ lịch trình thanh toán hàng tháng.
                    $schedule[]        = [
                        'Month'              => $i,
                        'EMI'                => round($emi, 0),//Số tiền thanh toán hàng tháng
                        'Principal'          => round($principalPaid, 0),//Lãi xuất hằng tháng
                        'Interest'           => round($interest, 0),//Lãi phải trả
                        'RemainingPrincipal' => round($principalRemaining, 0),//Số tiền còn lại
                    ];
                    $sumtotoalInterest += round($emi, 0);//Tính tổng lãi suất đã trả trong toàn bộ kỳ vay ($sumtotoalInterest), bằng cách cộng thêm lượng thanh toán hàng tháng (round($emi, 0)) vào tổng.
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
    }

    private function calculateEMI($principal, $loanTermMonths, $annualInterestRate){
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
        $numerator           = $principal * $monthlyInterestRate * pow((1 + $monthlyInterestRate),
                $loanTermMonths);
        $denominator         = pow((1 + $monthlyInterestRate), $loanTermMonths) - 1;
        $emi                 = $numerator / $denominator;

        return $emi;
    }



    //Phương thức thanh toán, trong trường hợp này là gốc cố định, hằng tháng
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
            $sumtotoalInterest += round(($amount * $interest_rate / 12 * ($term - $i + 1)+($amount / $term)));
        }

        return [
            'schedule'          => $payments,
            'sumtotoalInterest' => $sumtotoalInterest
        ];
    }


    public function resetTool(Request $request){
        $request->flush();
        return redirect()->route('viewCalculate');
        //làm mới
    }


}
