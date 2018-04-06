@extends('welcome')
@section('content')
<style>
    th, td{
        border: 1px solid;
        padding: 5px;
    }  
</style>
    <h1>hello Admin</h1>
    <table>
        <tr>
            <th>first name </th>
            <th>last name </th>
            <th>email </th>
            <th>employee number </th>
            <th>company id </th>
        </tr>
        @foreach($users as $user)
        
            @if($user->admin == 0)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->employee_number}}</td>
                            @foreach($companies as $company)
                                @if ($company->id == $user->company_id)
                                    <td>{{$company->name}}</td>
                                @endif
                            @endforeach
                    </tr>       
            @endif
        @endforeach
    </table>
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