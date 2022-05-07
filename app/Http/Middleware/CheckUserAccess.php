<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if user has already voted, the middleware return him to the result's page with message 
        if(DB::table('ipadresses')->where('pollId', $request->pollId)->where('voter', $request->ip())->exists()){
            return redirect()->route('result', ['code'=>$request->code])->with('voted', 'Już raz zagłosowałeś');
        }
        return $next($request);
    }
}
