<?php

namespace App\Services;

use App\Models\Poll;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $poll = Poll::create([
            'question' => $request['title'],
            'result' => $result,
            'minutes' => $request['time'],
            'code' => $random
        ]);

        foreach($request['options'] as $option){
            Option::create([
                'pollId' => $poll->id,
                'option' => $option,
                'votes' => 0        
            ]);
        }
        return $random;
    }

    public function GetResults($code)
    {
        //INNER JOIN METHOD
        $results = DB::table('polls')
            ->join('options', 'polls.id', '=', 'options.pollId')
            ->where('polls.code', $code)
            ->select('polls.question', 'options.votes', 'options.option')
            ->get();
        return $results;
    }

    public function handleVoterInfo($request)
    {
        $option = DB::table('options')
        ->where('id', $request['votes'])
        ->increment('votes');

        DB::table('ipadresses')->insert([
            'pollId' => $request->pollId,
            'voter' => $request->getClientIp()
        ]);
    }

}

?>