@extends('admin.layouts.admin')
@section('title')
Profile
@endsection
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-2">
		<div class="card bg-dark mb-3" style="width: 18rem;">
		  <div class="card-header text-white">
		    My Profile
		  </div>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item"><a href="#">Change password</a></li>
		    <li class="list-group-item"><a href="#">Change e-mail</a></li>
		    <li class="list-group-item"><a href="#">Edit Name</a></li>
		  </ul>
		</div>
	</div>
</div>
@endsection