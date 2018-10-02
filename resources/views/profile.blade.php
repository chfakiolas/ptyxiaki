@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h3 class="text-center">My Polls</h3>
		<br>
		<table class="table table-striped">
		  	<thead class="thead-dark">
		  		<tr>
		  			<td>Name</td>
		  			<td>Status</td>
		  			<td>Actions</td>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		@foreach($userPolls as $poll)
		  		<tr>
		  			<td>{{$poll->name}}</td>
		  			<td><span id="poll-status" class="badge {{ $poll->status == 'Completed' ? 'badge-success' : 'badge-primary' }}">{{$poll->status}}</span></td>
		  			<td><a class="btn btn-primary btn-sm" href="/polls/{{$poll->id}}/results"><span class="fa fa-pie-chart"> Results</a>
		  				{{-- <button data-id="{{$poll->id}}" type="button" name="button" class="btn btn-success btn-sm"><span class="fa fa-check"> Complete</span></button> --}}
		  				{!! Form::open(['action' => 'PollsController@update','method' => 'PUT']) Form::hidden('Completed', 'Completed') Form::submit('Completed', ['class' => 'btn btn-success btn-sm']) Form::close() !!}
						{!! $poll->status == 'Completed' ? '' : '<button data-id="{{$poll->id}}" type="button" name="button" class="btn btn-success btn-sm"><span class="fa fa-check"> Complete</span></button>'!!}	
		  			</td>
		  		</tr>
		  		@endforeach
		  	</tbody>
		  </table>
		</div>
	<div class="col-md-4">
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