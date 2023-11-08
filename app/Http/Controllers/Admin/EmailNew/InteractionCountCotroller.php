<?php

namespace App\Http\Controllers\Admin\EmailNew;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;

class InteractionCountCotroller extends Controller{

    function interactionCount($email){
        $check     = new Email();
        $condition = [
            'email' => $email,
        ];
        $customers = $check->first($condition);

        $currentTime = Carbon::now();

        $fiveMinutesAgo = $currentTime->subMinutes(5);

        if (!$customers->updated_at || $customers->updated_at <= $fiveMinutesAgo){
            $value     = [
                'interaction_count' => $customers->interaction_count + 1,
                'updated_at'        => Carbon::now()
            ];
            $condition = [
                'email' => $email,
            ];
            $check->updateEmail($condition, $value);
            return Redirect()->route('listPost');

        }else{
            return Redirect()->route('listPost');
        }

    }
}
