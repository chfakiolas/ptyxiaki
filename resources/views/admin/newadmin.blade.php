@extends('admin.layouts.admin')
@section('title')
New Admin
@endsection
@section('content')
<div class="col-md-8 offset-md-2 form-group">
	{!! Form::open(['action' => 'AdminController@createAdmin']) !!}
		<div class="form-group">
			{{ Form::label('name', 'Name')}}
			{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Your name']) }}
		</div>
		<div class="form-group">
			{{ Form::label('username', 'Username')}}
			{{ Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Your username']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email')}}
			{{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'name@example.com']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password')}}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Confirm Password')}}
			{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password']) }}
		</div>
		<div>
			{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
		</div>
	{!! Form::close() !!}
</div>
@endsection