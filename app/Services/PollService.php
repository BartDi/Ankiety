<?php

namespace App\Services;

use App\Http\Requests\CheckPollRequest;
use App\Models\Poll;
use Illuminate\Support\Str;


class PollService
{

    public function StorePoll($request, $result)
    {
        $random = Str::random(4);
        if($result=="on"){
            $result = true;
        }
        else{
            $result = false;
        }
        Poll::create([
            'question' => $request['title'],
            'result' => $result,
            'minutes' => $request['time'],
            'code' => $random
        ]);
        return $random;
    }


}

?>