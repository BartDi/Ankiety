@extends('layouts.app')
<style>
    .enter{
        width:40%;
        height:200px;
        margin-left:30%;
        margin-top:5%;
    }
    .inp{
        margin-top:5px;
        height:100px;
        font-size:80px;
        text-align:center;
        font-size:2em;
    }
    .inp::placeholder{
        color:gray;
        font-size:2em;
        text-align:center;
        vertical-align:middle;
    }

</style>
@section('content')
@if(Session::has('message'))
<div class="alert alert-warning text-center">
    <h5>{{Session::get('message')}}</h5>
</div> 
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="enter">
    <form action='{{ url("/verify") }}' method="POST">
        @csrf
        <input class="form-control inp" type="text" name="code" id="code" maxlength="4" placeholder="CODE">
        <button class="form-control inp border-4 border-success" type="submit"><h3 class="text-info">Potwierdź</h3></button>
    </form>
</div>
@endsection