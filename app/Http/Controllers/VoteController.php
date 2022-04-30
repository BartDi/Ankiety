<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
