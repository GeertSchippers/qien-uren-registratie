@extends('welcome')
@section('content')
    <h1>hello Admin</h1>

    <h3>gemaakte uren</h3>
    @if(count($hours) > 1)
        @foreach($hours as $hour)
            <div class="well">
                <h3>{{$hour->aantal}}</h3>
            </div>
        @endforeach
    @else
        <p>no users found</p>
    @endif
@endsection