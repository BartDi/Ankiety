@extends('layouts.app')

@section('title', 'Wyniki')
@section('content')
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
                    {{$result->votes}}
                </h6>
            </div>
        @endforeach
    
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var suma = "{{ $total }}"
</script>
<script type="text/javascript" src="{{ asset('js/stats.js')}}"></script>
    
@endsection
