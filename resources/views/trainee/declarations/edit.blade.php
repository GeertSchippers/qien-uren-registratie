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
        <h2>Declaratie</h2>

        <h3>terug<h3>


           <hr>
        <div class=container-small>
            <div class="row">
                {!! Form::open(['action' => ['TraineeDeclarationController@update', $user->id, $declaration->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::hidden('_method','PUT')}}
                        {{Form::label('datum bon', 'datum bon')}}
                        {{Form::date('date_receipt', $declaration->date_receipt, ['name' => 'date_receipt', 'id' => 'date_receipt', 'class' => 'form-control input-sm'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::select('type', [
                           'education' => 'opleiding',
                           'travelling' => 'reis',
                           'residence' => 'verblijf',
                           'parking' => 'parkeren',
                           'phone' => 'telefoon',
                           'lunch_diner' => 'lunch/diner',
                           'outings' => 'uitjes',
                           'extra' => 'overig']
                        ) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('totaal bon', 'totaal bon')}}
                        {{Form::number('total_receipt', $declaration->total_receipt, ['name' => 'total_receipt', 'id' => 'total_receipt', 'class' => 'form-control input-sm'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('btw', 'btw')}}
                        {{Form::number('btw', $declaration->btw, ['name' => 'btw', 'id' => 'btw', 'class' => 'form-control input-sm'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('beschrijving', 'beschrijving')}}
                        {{Form::textarea('description', $declaration->description, ['name' => 'description', 'id' => 'description', 'class' => 'form-control input-sm'])}}
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
