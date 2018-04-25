@extends('layouts.admin')
@section('content')

  <title>Wijzig gebruiker gegevens</title>

<!-- ======================== Urenregistratie formulier ------------------------------>

    <div class=container-hours>
      <div class="container">
        <h2>Wijzig Gebruiker gegevens</h2>

        <h3><a href=''class='btn btn-default'>terug</a><h3>


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
                {{Form::label('employee_number', 'Werknemersnummer')}}
                {{Form::text('employee_number', $user->employee_number, ['name' => 'employee_number', 'id' => 'employee_number', 'class' => 'form-control input-sm'])}}
            </div>

            <div class="form-group">
                {{Form::label('bedrijf', 'Bedrijf')}}


                {{Form::select('company', $select , $user->company_id ,['name' => 'company', 'id' => 'company', 'class'=>'form-control'])}}

            </div>
            <div class="form-group">
                {{Form::label('admin', 'Rol')}}
                {{Form::select('admin', [
                    0 => 'Trainee',
                    1 => 'Admin',
                    2 => 'Bedrijf'
                ], $user->role, ['name' => 'admin', 'id' => 'admin', 'class'=>'form-control'])}}
            </div>



            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

                {{Form::submit('updaten', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
	</div>
        </div>
        <hr>
       </div>
    </div>
@endsection
