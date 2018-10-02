@extends('layouts.app')
@section('content')
<h1 class="text-center">Contact Page</h1>
<div class="row">
	
</div>
<div class="row">
	<div class="col-md-6 offset-md-3">
	{!! Form::open(['action' => 'MessagesController@store']) !!}
		<div class="form-group">
			{{Form::label('name', 'Name')}}
			{{Form::text('name', '', ['class' => 'form-control', 'Placeholder' => 'Your Name'])}}
		</div>
		<div class="form-group">
			{{Form::label('email', 'E-mail')}}
			{{Form::text('email', '', ['class' => 'form-control', 'Placeholder' => 'Your E-mail'])}}
		</div>
		<div class="form-group">
			{{Form::label('message', 'Message')}}
			{{Form::textarea('message', '', ['class' => 'form-control', 'Placeholder' => 'Your Message'])}}
		</div>
		<div>
			{{Form::submit('Submit', ['class' => 'btn btn-success'])}}
		</div>
	{!!Form::close()!!}
	</div>
</div>
@endsection