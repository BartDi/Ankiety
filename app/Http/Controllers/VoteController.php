<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckPollRequest;
use App\Services\PollService;

class VoteController extends Controller
{
    public function createPoll()
    {
        return view('create');
    }

    public function enterCode()
    {
        return view('enter');
    }

    public function verify(Request $request)
    {

    }

    // Request validate
    // call to service, which create poll
    // redirect to created poll's page
    public function setPoll(CheckPollRequest $request)
    {
        $val = $request->validated();
        $result = $request->result;
        $pollService = new PollService();
        $code = $pollService->StorePoll($val, $result);
        return redirect()->route('vote', [$code]);
    }

    public function vote($code)
    {
        return $code;
    }
}
