@extends('welcome')
@section('content')
    <h1>hello Admin</h1>
    @if(count($users) > 1)
        @foreach($users as $user)
            <td class="well">
                @if($user->admin == 0)
                
                @endif
            </div>
        @endforeach
    @else
        <p>geen gebruikers gevonden</p>
    @endif
    
    <h2> gemaakte uren</h2>
    @if(count($hours) > 1)
        @foreach($hours as $hour)
            <div class="well">
                <h3>{{$hour->amount}}</h3>
            </div>
        @endforeach
    @else
        <p>geen uren gevonden</p>
    @endif
    
    <h2> gemaakte declaraties</h2>
    @if(count($declarations) > 1)
        @foreach($declarations as $declaration)
            <div class="well">
                <h3>{{$declaration->date_receipt}}</h3>
            </div>
        @endforeach
    @else
        <p>geen decalraties gevonden</p>
    @endif

@endsection