@extends('layouts.app')
@extends('segment')
@section('register')
    <li><a href="{{ url('/register') }}">Gebruiker Aanmaken</a></li>
    <li><a href="{{ url('/companies/create') }}">Bedrijf Aanmaken</a></li>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @yield('users')
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'Review')" id="default">Review</button>
                        <button class="tablinks" onclick="openTab(event, 'Goedgekeurd')">Goedgekeurd</button>
                        <button class="tablinks" onclick="openTab(event, 'Betaald')">Betaald</button>
                    </div>

                    <div id="Review" class="tabcontent">
                        @yield('review')
                    </div>
                        <div id="Goedgekeurd" class="tabcontent">
                            @yield('goedgekeurd')
                        </div>

                        <div id="Betaald" class="tabcontent">
                            @yield('betaald')
                        </div>
                </div>
                        @yield('declarations')
            </div>
        </div>
    </div>
</div>

     <script>
            document.getElementById("default").click();
      </script>
@endsection
