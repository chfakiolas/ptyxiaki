@extends('admin.layouts.admin')
@section('title')
@endsection
@section('content')
{{-- <h1>poll details landing page {{$poll->name}}</h1> --}}
<div class="row">
  <div class="col-md-12">
    <a href="/admin/polls" class="btn btn-primary">Επιστροφή</a>
  </div>
</div>
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
    var options = {
                   'backgroundColor':'#f5f8fa',
                   'fontName':'Raleway',
                   'sliceVisibilityThreshold':0,
                   'chartArea':{'width':'80%', 'height':'80%'},
                 };
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
  }
</script>
<div class="row chart-row">
<div class="col-sm-12 col-md-6 col-lg-6 chart" id="chart_div" >
</div>
<div class="col-sm-12 col-md-6, col-lg-6 d-flex justify-content-center">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$poll->name}}</h5>
    <hr>
    <h4>Κατάσταση: @if($poll->status == 'Completed') {{'Ολοκληρωμένη'}} @else {{'Ενεργή'}} @endif</h4>
    <hr>
    <h4>Τύπος: @php if($poll->type === 'anonymous'){echo 'Ανώνυμη';} else {echo 'Επώνυμη';}@endphp</h4>
    <hr>
    <h4>Συνολικοί ψήφοι: {{count($votes)}}</h4>
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
    <h5>{{$option->option}}: {{$totalVotes}}</h4>
    @endforeach
    <h4></h4>
    <hr>
    <h4>Περιγραφή</h4>
    <p class="card-text">{{$poll->description}}</p>
  </div>
</div>
</div>
</div>
<br>
@if ($poll->type == 'eponymous')
<div class="row">
  <div class="col-md-8 offset-2">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Όνομα</th>
          <th scope="col">Ψήφος</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->user->name}}</td>
          <td>{{$user->vote}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="d-flex justify-content-center">
        {{$users->links()}}
      </div>
  </div>
</div>
@endif
<br>
@endsection