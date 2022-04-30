@extends('layouts.app')
@section('content')
<div class="text-center" style="margin-top:10%;">
    <div style="width:50%;margin:auto;height:200px;">
    <a href='{{ url("/create") }}'>
        <button class="rounded border-0 text-decoration-none text-secondary btn-info w-100 h-50 my-auto">
            <h3 class="d-inline">STWÓRZ ANKIETE</h3>
            <i class="fa-solid fa-circle-plus fa-2x d-inline"></i>
        </button>
    </a>
    </div>
    <div style="width:50%;margin:auto;height:200px;">
    <a href='{{ url("/enter") }}'>
        <button class="rounded border-0 text-decoration-none text-secondary btn-success w-100 h-50">
            <h3 class="d-inline" style="padding-right:20px;">WPISZ KOD I ZAGŁOSUJ</h3>
            <i class="fa-solid fa-keyboard fa-2x text-secondary d-inline"></i>
        </button>
    </a>
    </div>
</div>
@endsection