@section('segments')
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

        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'Review')" id="default">Review</button>
          <button class="tablinks" onclick="openTab(event, 'Goedgekeurd')">Goedgekeurd</button>
          <button class="tablinks" onclick="openTab(event, 'Betaald')">Betaald</button>
        </div>

        <div id="Review" class="tabcontent">
          @yield('d-review')
        </div>

        <div id="Goedgekeurd" class="tabcontent">
          @yield('d-goedgekeurd')
        </div>

        <div id="Betaald" class="tabcontent">
          @yield('d-betaald')
        </div>
@endsection

