@extends('admin.layouts.admin')
@section('title')
Messages
@endsection
@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">E-mail</th>
				      <th scope="col">Message</th>
				      <th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($messages as $message)
					<tr id="{{$message->id}}">
						<td>{{$message->id}}</td>
						<td>{{$message->name}}</td>
						<td>{{$message->email}}</td>
						<td>{{$message->message}}</td>
						<td>actions{{-- Τα ations θα γίνουν με ajax requests --}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="d-flex justify-content-center">
			{{$messages->links()}}
			</div>
			@if(count($messages) == 0)
				<h3 class="text-center">{{'There are no messages to display.'}}</h3>
			@endif		
		</div>
	</div>
@endsection