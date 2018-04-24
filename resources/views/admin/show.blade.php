@extends('layouts.admin')
@section('users')
<style>
    th, td{
        border: 1px solid;
        padding: 5px;
    }
</style>
<!--------------------------------- [ overzicht trainees ] --------------------------------->
    <h1>Hallo Admin</h1>
    <h3>Overzicht trainees</h3>
    <table>
        <tr>
            <th>Voornaam </th>
            <th>Achternaam</th>
            <th>email </th>
            <th>Werknemers nr</th>
            <th>Bedrijf</th>
            <th>Bekijk</th>
            <th>Wijzig</th>

        </tr>
        @foreach($users as $user)
            @if($user->role == 0)
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

                            <td><a href='/trainees/{{$user->id}}'class='btn btn-default'>Bekijk</a></td>

                            <td><a href='/trainees/{{$user->id}}/edit'class='btn btn-default'>Wijzig</a></td>


                    </tr>
            @endif
        @endforeach
    </table>
<!--------------------------------- [ overzicht admins ] --------------------------------->
    <h3>Overzicht admins</h3>
    <table>
        <tr>
            <th>Voornaam </th>
            <th>Achternaam</th>
            <th>email </th>
            <th>Werknemers nr</th>
            <th>Bedrijf</th>
            <th>Bekijk</th>
            <th>Wijzig</th>

        </tr>
        @foreach($users as $user)
            @if($user->role == 1)
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

                            <td><a href='/trainees/{{$user->id}}'class='btn btn-default'>Bekijk</a></td>

                            <td><a href='/trainees/{{$user->id}}/edit'class='btn btn-default'>Wijzig</a></td>


                    </tr>
            @endif
        @endforeach
    </table>
<!--------------------------------- [ overzicht companies ] ---------------------------------> 
    <h3>Overzicht Bedrijven</h3>
    <table>
        <tr>
            <th>Naam </th>
            <th>Locatie</th>
            <th>Contact persoon </th>
            <th>E-mail</th>
            <th>Telefoon nummer</th>
<!--            <th>Bekijk</th>
            <th>Wijzig</th>-->

        </tr>
        @foreach($companies as $company)
                    <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->location}}</td>
                        <td>{{$company->contact_person}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->phone_number}}</td>

                            <!--<td><a href='/trainees/{{$user->id}}'class='btn btn-default'>Bekijk</a></td>-->

                            <!--<td><a href='/trainees/{{$user->id}}/edit'class='btn btn-default'>Wijzig</a></td>-->


                    </tr>
        @endforeach
    </table>


    <h2>Uren</h2>
@endsection
@section('review')

    <table>
        <h3>Review</h3>
            <tr>
                <th>Hoeveelheid</th>
                <th>Type</th>
                <th>Maand</th>
                <th>Persoon</th>
                <th>gemaakt op</th> 
                <th>Laatste update</th>
                               
            </tr>
            @foreach($hours as $hour)
                @if($hour->status == 0)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->date}}</td>
                    @foreach($users as $user)
                        @if($user->id === $hour->user_id)
                            <td>{{$user->first_name}}</td>
                        @endif
                    @endforeach
                    <td>{{$hour->created_at}}</td>
                    <td>{{$hour->updated_at}}</td>
                </tr>
                @endif
            @endforeach
    </table>
@endsection
@section('goedgekeurd')
    <table>
        <h3>Goedgekeurd</h3>
            <tr>
                <th>Hoeveelheid</th>
                <th>Type</th>
                <th>Maand</th>
                <th>Persoon</th>
                <th>gemaakt op</th>
                <th>Laatste update</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->status == 1)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->date}}</td>
                    @foreach($users as $user)
                        @if($user->id === $hour->user_id)
                            <td>{{$user->first_name}}</td>
                        @endif
                    @endforeach
                    <td>{{$hour->created_at}}</td>
                    <td>{{$hour->updated_at}}</td>
                </tr>
                @endif
            @endforeach
    </table>
@endsection
@section('betaald')
    <table>
        <h3>Betaald</h3>
            <tr>
                <th>Hoeveelheid</th>
                <th>Type</th>
                <th>Maand</th>
                <th>Persoon</th>
                <th>gemaakt op</th>
                <th>Laatste update</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->status == 2)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->date}}</td>
                    @foreach($users as $user)
                        @if($user->id === $hour->user_id)
                            <td>{{$user->first_name}}</td>
                        @endif
                    @endforeach
                    <td>{{$hour->created_at}}</td>
                    <td>{{$hour->updated_at}}</td>
                </tr>
                @endif
            @endforeach
    </table>
@endsection
@section('d-review')
       <h2> gemaakte declaraties</h2>
    <table>
        <tr>
            <th>Datum bon</th>
            <th>Type</th>
            <th>Totaal bon</th>
            <th>Btw</th>
            <th>Beschrijving</th>
            <th>Gemaakt op</th>
            <th>Bewerkt op</th>
            <th>Trainee</th>
        </tr>
    @foreach($declarations as $declaration)
        @if($declaration->status == 0)
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
        @endif
    @endforeach
    </table>
@endsection
@section('d-goedgekeurd')
       <h2> gemaakte declaraties</h2>
    <table>
        <tr>
            <th>Datum bon</th>
            <th>Type</th>
            <th>Totaal bon</th>
            <th>Btw</th>
            <th>Beschrijving</th>
            <th>Gemaakt op</th>
            <th>Bewerkt op</th>
            <th>Trainee</th>
        </tr>
    @foreach($declarations as $declaration)
        @if($declaration->status == 1)
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
        @endif
    @endforeach
    </table>
@endsection
@section('d-betaald')
       <h2> gemaakte declaraties</h2>
    <table>
        <tr>
            <th>Datum bon</th>
            <th>Type</th>
            <th>Totaal bon</th>
            <th>Btw</th>
            <th>Beschrijving</th>
            <th>Gemaakt op</th>
            <th>Bewerkt op</th>
            <th>Trainee</th>
        </tr>
    @foreach($declarations as $declaration)
        @if($declaration->status == 2)
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
        @endif
    @endforeach
    </table>
@endsection
