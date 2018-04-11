@extends('welcome')
@extends('segment')
<style>
    th, td{
        border: 1px solid;
        padding: 5px;
    }
</style>
@section('review')
    <table>
        <h2>Review</h2>
            <tr>
                <th>amount</th>
                <th>type</th>
                <th>statement</th>
                <th>paid</th>
                <th>created_at</th>
                <th>user</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->paid == 0)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->statement}}</td>
                    <td>{{$hour->paid}}</td>
                    <td>{{$hour->created_at}}</td>
                    <td>{{$hour->user_id}}</td>
                </tr>
                @endif
            @endforeach
    </table>            
@endsection
@section('goedgekeurd')
    <table>
        <h2>goedgekeurd</h2>
            <tr>
                <th>amount</th>
                <th>type</th>
                <th>statement</th>
                <th>paid</th>
                <th>created_at</th>
                <th>user</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->paid == 1)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->statement}}</td>
                    <td>{{$hour->paid}}</td>
                    <td>{{$hour->created_at}}</td>
                    <td>{{$hour->user_id}}</td>
                </tr>
                @endif
            @endforeach
    </table> 
@endsection
@section('betaald')
    <table>
        <h2>betaald</h2>
            <tr>
                <th>amount</th>
                <th>type</th>
                <th>statement</th>
                <th>paid</th>
                <th>created_at</th>
                <th>user</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->paid == 2)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->statement}}</td>
                    <td>{{$hour->paid}}</td>
                    <td>{{$hour->created_at}}</td>
                    <td>{{$hour->user_id}}</td>
                </tr>
                @endif
            @endforeach
    </table> 
@endsection

