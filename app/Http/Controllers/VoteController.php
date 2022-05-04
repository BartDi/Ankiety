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

    public function putVote(VoteRequest $request)
    {
        $val = $request->validated();
        $this->pollService->handleVoterInfo($request);
        return redirect()->route('result', ['code'=>$request['code']]);
    }

    public function results($code)
    {
        $result = $this->pollService->GetResults($code);
        return view('result', ['results'=>$result, 'code'=>$code]);
    }
}
