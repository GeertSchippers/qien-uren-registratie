@extends('layouts.app')
@section('content')

  <title>Formulier Trainee</title>
  <style>


  .tabcontent {
    background-color: white;
  }

  </style>

<!-- ======================== Urenregistratie formulier ------------------------------>

    <div class=container-hours>
      <div class="container">
        <h2>Uren registratie</h2>

        <h3>terug<h3>


           <hr>
        <div class=container-small>   
	<div class="row">
        {!! Form::open(['action' => ['TraineeHours_declarationController@update',$hours->id, $user->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::hidden('_method','PUT')}}
                {{Form::label('hoeveelheid', 'hoeveelheid')}}
                {{Form::number('amount', $hours->amount, ['name' => 'amount', 'id' => 'amount', 'class' => 'form-control input-sm'])}}
            </div>
            <div class="form-group">
                {{ Form::select('type', [
                   'workhours' => 'werkuren',
                   'extrahours' => 'overuren',
                   'abscense' => 'verlof',
                   'holiday' => 'vakantie',
                   'sick' => 'ziek',
                   'extra' => 'overige']
                ) }} 
            </div>    
            <div class="form-group">
                {{Form::label('date', 'datum')}}
                {{Form::date('date', $hours->date, ['name' => 'date', 'id' => 'statement', 'class' => 'form-control input-sm'])}}
            </div>         
            <div class="form-group">
                {{Form::label('statement', 'beschrijving')}}
                {{Form::textarea('', $hours->statement, ['name' => 'statement', 'id' => 'statement', 'class' => 'form-control input-sm'])}}
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