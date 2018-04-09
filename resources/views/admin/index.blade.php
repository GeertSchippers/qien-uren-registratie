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
                        <td><a href="/admin/trainee/{{$user->id}}">{{$user->email}}</a></td>
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
        <table>
        <tr>
            <th>amount</th>
            <th>type</th>
            <th>statement</th>
            <th>paid</th>
            <th>created_at</th>
            <th>user</th>
        </tr>
        @foreach($hours as $hour)
                    <tr>
                        <td>{{$hour->amount}}</td>
                        <td>{{$hour->type}}</td>
                        <td>{{$hour->statement}}</td>
                        <td>{{$hour->paid}}</td>
                        <td>{{$hour->created_at}}</td>
                            @foreach($users as $user)
                                @if ($hour->user_id == $user->id)
                                    <td>{{$user->email}}</td>
                                @endif
                            @endforeach
                    </tr>
        @endforeach
    </table>
       <h2> gemaakte declaraties</h2>
        <table>
        <tr>
            <th>date_receipt</th>
            <th>type</th>
            <th>total_receipt</th>
            <th>btw</th>
            <th>description</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>user_id</th>
        </tr>
        @foreach($declarations as $declaration)
                    <tr>
                        <td>{{$declaration->date_receipt}}</td>
                        <td>{{$declaration->type}}</td>
                        <td>{{$declaration->total_receipt}}</td>
                        <td>{{$declaration->btw}}</td>
                        <td>{{$declaration->description}}</td>
                        <td>{{$declaration->created_at}}</td>
                        <td>{{$declaration->updated_at}}</td>
                            @foreach($users as $user)
                                @if ($declaration->user_id == $user->id)
                                    <td>{{$user->email}}</td>
                                @endif
                            @endforeach
                    </tr>
        @endforeach
    </table>
@endsection
