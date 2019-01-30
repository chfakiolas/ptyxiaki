@extends('admin.layouts.admin')
@section('title')
Polls
@endsection
@section('content')
	<div class="row">
		
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
					  <th scope="col">ID</th>
					  <th scope="col">Name</th>
					  <th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($polls as $poll)
					<tr id="{{$poll->id}}">
						<td>{{$poll->id}}</td>
						<td>{{$poll->name}}</td>
						<td>actions{{-- Τα ations θα γίνουν με ajax requests --}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@if(count($polls) == 0)
				<h3 class="text-center">{{'There are no polls to display.'}}</h3>
			@endif
			<div class="d-flex justify-content-center">
			{{$polls->links()}}
			</div>
		</div>
	</div>
@endsection