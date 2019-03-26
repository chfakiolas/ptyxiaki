@extends('admin.layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count($polls)}}</h3>
                
                <p><b>Συνολικές Ψηφοφορίες</b></p>
              </div>
              <div class="icon">
                <i class="fa fa-pie-chart"></i>
              </div>
            </div>
		</div>
    <div class="col-md-3">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{count($activePolls)}}</h3>

          <p>Ενεργές Ψηφοφορίες</p>
        </div>
        <div class="icon">
          <i class="fa fa-pie-chart"></i>
        </div>
      </div>
    </div>
	</div>
@endsection