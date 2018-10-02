@extends('admin.layouts.admin')
@section('title')
Users
@endsection
@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Username</th>
				      <th scope="col">E-mail</th>
				      <th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr id="{{$user->id}}">
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->username}}</td>
						<td>{{$user->email}}</td>
						<td>actions{{-- Τα ations θα γίνουν με ajax requests --}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@if(count($users) == 0)
				<h3 class="text-center">{{'There are no users to display.'}}</h3>
			@endif
			<div class="d-flex justify-content-center">
			{{$users->links()}}
			</div>		
		</div>
	</div>
@endsection