<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $random = Str::random(5);
        return $random;
    }

    public function setPoll(Request $request)
    {
        dd($request->result);
    }
}
