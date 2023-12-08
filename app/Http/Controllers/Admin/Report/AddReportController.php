<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Client\Mail\ContactController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer_reports;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Illuminate\Support\Facades\DB;

class AddReportController extends Controller{

    public $report;
    public $mail;

    public function __construct(){
        $this->mail   = new ContactController();
        $this->report = new Customer_reports();
    }

    function addReport(Request $request){

        $condition = [
            'post_id' => $request->id_post,
            'user_id' => $request->id_user
        ];

        $value = [
            'user_id' => $request->id_user,
            'post_id' => $request->id_post,
            'content' => $request->input('content') ?: $request->type,
            'delete'  => 0,
            'status'  => 0,

        ];
        $data  = [
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'title'    => "Báo cáo"
        ];
        $report = $this->report->firstReport($condition) ;
        if ($report){
            if ($report && now()->diffInHours($report->created_at) < 6){
                return Redirect()
                    ->back()
                    ->with('error-report',
                        'Báo cáo của bạn hiện đang xử lý bạn vui lòng chờ hoặc 6 tiếng sau mới tiếp tục gửi yêu cầu');

            }else{
                if (Customer_reports::create($value)){
                    $this->mail->contactMail($data);

                    return Redirect()
                        ->back()
                        ->with('success',
                            'Gửi báo cáo thành công');
                }else{
                    return Redirect()
                        ->back()
                        ->with('error-report',
                            'Gửi báo cáo thất bại vui lòng thử lại');
                }
            }
        }else{
            if (Customer_reports::create($value)){
                $this->mail->contactMail($data);

                return Redirect()
                    ->back()
                    ->with('success',
                        'Gửi báo cáo thành công');
            }else{
                return Redirect()
                    ->back()
                    ->with('error-report',
                        'Gửi báo cáo thất bại vui lòng thử lại');

            }
        }


    }
}
