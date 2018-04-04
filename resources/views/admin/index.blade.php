@extends('welcome')
@section('content')
    <h1>hello Admin</h1>
    @if(count($users) > 1)
        @foreach($users as $user)
            <div class="well">
                <h3>{{$user->email}}</h3>
            </div>
        @endforeach
    @else
        <p>no users found</p>
    @endif
@endsection