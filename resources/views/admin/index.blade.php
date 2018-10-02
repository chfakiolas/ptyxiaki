@extends('admin.layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
	<p class="text-center">Dashboard content starts here</p>
	<div class="row">
		<div class="col-md-3">
			<div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
            </div>
		</div>
    <div class="col-md-3">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>1</h3>

          <p>Total Users</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
	</div>
@endsection