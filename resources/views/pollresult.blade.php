@extends('layouts.app')
@section('content')
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Options');
        data.addColumn('number', 'Votes');
        data.addRows([
          @foreach($options as $option)
          @php
          $totalVotes=0;
          @endphp
            @foreach($votes as $vote)
              @if($vote->vote === $option->option)
                @php
                $totalVotes++;
                @endphp
              @endif
            @endforeach
            ['{{$option->option}}', {{$totalVotes}}],
          @endforeach
        ]);

        // Set chart options
        var options = {'title':'{{$poll->name}}',
                       'width':800,
                       'height':600,
                       'backgroundColor':'#f5f8fa',
                       'fontName':'Raleway'
                     };
        // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
       chart.draw(data, options);
      }
</script>
<div class="row">
  <div style="width:800; height:600;" class="col-md-6" id="chart_div">
  </div>
  <div class="col-md-6 d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{$poll->name}}</h5>
        <hr>
        {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
        <h4>Total Votes: {{count($votes)}}</h4>
        <p></p>
        <p class="card-text">{{$poll->description}}</p>
      </div>
    </div>
  </div>
</div>
@endsection
