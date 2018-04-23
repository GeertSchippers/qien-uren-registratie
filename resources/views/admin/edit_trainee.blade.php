@extends('layouts.admin')
@section('content')

  <title>Wijzig trainee gegevens</title>
  <style>
    .tabcontent {
      background-color: white;
    }
  </style>

<!-- ======================== Urenregistratie formulier ------------------------------>

    <div class=container-hours>
      <div class="container">
        <h2>Wijzig Trainee gegevens</h2>

        <h3><a href='/admins/{{$user->id}}'class='btn btn-default'>terug</a><h3>


           <hr>
        <div class=container-small>
	<div class="row">
        {!! Form::open(['action' => ['TraineeController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::hidden('_method','PUT')}}
                {{Form::label('voornaam', 'Voornaam')}}
                {{Form::text('first_name', $user->first_name, ['name' => 'first_name', 'id' => 'first_name', 'class' => 'form-control input-sm'])}}
            </div>

            <div class="form-group">
                {{Form::label('achternaam', 'Achternaam')}}
                {{Form::text('last_name', $user->last_name, ['name' => 'last_name', 'id' => 'last_name', 'class' => 'form-control input-sm'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $user->email, ['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm'])}}
            </div>

            <div class="form-group">
                {{Form::label('bedrijf', 'Bedrijf')}}


                {{Form::select('company', $select , $user->company_id ,['name' => 'company', 'id' => 'company', 'class'=>'form-control'])}}

            </div>
            <div class="form-group">
                {{Form::label('admin', 'admin')}}
                {{Form::number('admin', $user->role, ['name' => 'admin', 'id' => 'admin', 'class' => 'form-control input-sm'])}}
            </div>

            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

                {{Form::submit('updaten', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
	</div>
        </div><!-- end of .row (form) -->
        <hr>
       </div>
    </div>
@endsection
