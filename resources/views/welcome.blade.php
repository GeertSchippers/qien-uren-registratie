@extends('layouts.app')

<style>
    .container-hours{
        background: linear-gradient(rgba(140, 13, 255, 0.76), rgba(162, 13, 255, 0.76)), url('/images/flipperqien.jpg') fixed no-repeat ;
        background-size: cover;
        position: relative;
        top: -20px;
        height: 1000px;
  } 
</style>

@section('content')

<div class="container-hours">
    <div class="row" >
        <div class="col-md-10 col-md-offset-1" >
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                    @yield('content')
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
