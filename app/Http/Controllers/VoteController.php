<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckPollRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Services\PollService;
use App\Models\Poll;
use Illuminate\Support\Facades\DB;


class VoteController extends Controller
{
    private $pollService;
    public function __construct(PollService $service)
    {
        $this->pollService = $service;
    }
    public function createPoll()
    {
        return view('create');
    }

    public function enterCode()
    {
        return view('enter');
    }

    public function verify(VerifyCodeRequest $request)
    {
        $val = $request->validated();
        $poll = Poll::where('code', $val['code'])->firstOrFail();
        $options = $poll->options;
        return view('poll', ['poll' => $poll, 'options' => $options]);
    }

    // Request validate
    // call to service, which create poll
    // redirect to created poll's page
    public function setPoll(CheckPollRequest $request)
    {
        $val = $request->validated();
        $result = $request->result;
        $code = $this->pollService->StorePoll($val, $result);
        return redirect()->route('vote', [$code]);
    }

    public function vote($code)
    {
        $poll = Poll::where('code', $code)->firstOrFail();
        $options = $poll->options;
        return view('poll', ['poll' => $poll, 'options' => $options]);
        
    }

    public function putVote(Request $request)
    {
        $option = DB::table('options')
            ->where('id', $request['votes'])
            ->increment('votes');

        return redirect()->route('result', ['code'=>$request['code']]);
    }

    public function results($code)
    {
        $result = $this->pollService->GetResults($code);
        return view('result', ['results'=>$result, 'code'=>$code]);
    }
}
