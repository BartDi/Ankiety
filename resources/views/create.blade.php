@extends('layouts.app')
@section('title', 'Stwórz Ankiete')
<style>
    .option{
        width:90%;
        height:45px;
        margin-left: 5px;
        margin-top: 5px;
        border: 1px solid black;
    }
    .title{
        border: 2px solid black;
        width:90%;
        height:50px;
        margin-left: 5px;
        margin-top: 5px;
    }
    .b{
        width:20%;
        height:45px;
        margin-top:5px;
    }
    .bin:hover{
        cursor:pointer;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/add.js')}}"></script>
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div style="margin-left:15px;">
    <form class="form" action='{{ url("/set/poll") }}' method="POST">
        @csrf
        <input type="text" name="title" id="title" class="title" placeholder="Pytanie">
        <div class="inputDiv">
            <input type="text" class="option"  name="options[]" placeholder="Opcja 1">
        </div>
        <div class="inputDiv">
            <input type="text" class="option" name="options[]" placeholder="Opcja 2">
        </div>
        <div class="addDiv">
            <button type="button" class="add b">Dodaj opcję</button>
            <input type="number" class="numberAdd" name="toAdd" min='1' placeholder="Ile opcji dodać" min="1">
            <button type="button" class="add2">Dodaj</button>
            <label for="result">Widoczność wyników</label>
            <input type="checkbox" name="result">
            <input type="number" name="time" placeholder="Czas ankiety (min)" min="1">
            <input type="submit" value="Wyślij" class="b">
        </div>
    </form>
</div>

@endsection