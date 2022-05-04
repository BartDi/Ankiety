@extends('layouts.app')

@section('title', 'Wyniki')
@section('content')
@if(Session::has('voted'))
<div class="alert alert-warning text-center">
    <h5>{{Session::get('voted')}}</h5>
</div> 
@endif
@if($success ?? null)
<div class="alert alert-success text-center">
    <h5>{{$success}}</h5>
</div> 
@endif
    <div class="container">
        <div>
            <h2>
                {{ $results[0]->question }}
            </h2>
        </div>
    
        @foreach($results as $result)
            <div>
                <h6>
                    {{$result->option}}
                    | głosy:
                    <span class="votes" data-text="{{$result->option}}">{{$result->votes}}</span>
                </h6>
            </div>
        @endforeach
    
    </div>
    <div class="container">
        <div class="card w-50" style="min-height:100px;">
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/stats.js')}}"></script>
    
<div class="container">
<h1>Kod ankiety: {{$code}}</h1>
<a href='{{url("vote/{$code}")}}'><h3>Jeszcze nie zagłosowałeś/aś? Zagłosuj</h3></a>
</div>
@endsection
