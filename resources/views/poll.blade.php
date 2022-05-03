@extends('layouts.app')
@section('title', 'Ankieta - '. $poll->question)
<style>
    .option{
        width:100%;
        height:70px;
        margin-top:15px;
        padding-top:35px;
    }
    .vote{
        margin-top:30px;
        float:right;
    }
</style>
@section('content')
<form action='{{ url("add/vote") }}' method="POST">
    @csrf
    <div class="container">
        <h2>{{ $poll->question }}</h2>
        <input type="hidden" name="pollId" value="{{ $poll->id }}">
        <input type="hidden" name="code" value="{{ $poll->code }}">
        @foreach($options as $option)
            <div>
                <input class="btn-check" type="radio" name="votes" id="vote{{$option->id}}" value="{{ $option->id }}" autocomplete="off">
                <label class="btn btn-outline-primary option" for="vote{{$option->id}}">{{$option->option}}</label>
            </div>
        @endforeach
        <input class="btn btn-primary vote" type="submit" value="Potwierdź">
    </div>
</form>
@endsection