@extends('layouts.app')

@section('content')
    <form action='{{ url("/verify") }}' method="POST">
        @csrf
        <input type="text" name="code" id="code">
        <input type="submit" value="Potwierdź">
    </form>
@endsection