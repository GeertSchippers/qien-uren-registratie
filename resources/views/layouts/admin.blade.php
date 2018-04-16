@extends('layouts.app')
@extends('segment')
@section('register')
    <li><a href='/register'>Register</a></li>
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
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
                // Get the element with id="defaultOpen" and click on it
            document.getElementById("default").click();
      </script>
@endsection
