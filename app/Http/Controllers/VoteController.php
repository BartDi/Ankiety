<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckPollRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Http\Requests\VoteRequest;
use App\Services\PollService;
use App\Models\Poll;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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

    // Validating the request which contain code, which user entered
    public function verify(VerifyCodeRequest $request)
    {
        $val = $request->validated();
        return redirect()->route('vote', ['code'=>$val['code']]);
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

    // function check if code exists if not return back with message
    // if code exists function return to the voteing page
    public function vote($code)
    {
        try {
            $poll = Poll::where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('message', 'Twój kod nie pasuje do żadnej ankiety');
        }
        $options = $poll->options;
        return view('poll', ['poll' => $poll, 'options' => $options]);
        
    }

    // function which call function in service
    // in service vote is added and the user ip is saved
    public function putVote(VoteRequest $request)
    {
        $val = $request->validated();
        $this->pollService->handleVoterInfo($request);
        return redirect()->route('result', ['code'=>$request['code'], 'voted' => true]);
    }

    // call to service to get results
    // voted is optional, if voter voted first time he will receive the message
    public function results($code, $voted = false)
    {
        $result = $this->pollService->GetResults($code);
        if ($voted == 1) {
            return view('result', ['results'=>$result, 'code'=>$code, 'success'=>'Dziękujemy za oddany głos']);    
        }
        return view('result', ['results'=>$result, 'code'=>$code]);
    }
}
