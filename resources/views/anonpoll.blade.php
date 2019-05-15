@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<a href="/polls/{{$poll->uuid}}/results" class="btn btn-primary">Αποτελέσματα</a>
		<br><br>
		<h2 class="text-center">{{$poll->name}}</h2>
		<br>
		<p>{{$poll->description}}</p>
		<hr>
		{{Form::open(['method' => 'PUT', 'action' => 'VotesController@anonStore'])}}
			{{Form::hidden('uuid', $poll->uuid)}}
			{{Form::hidden('token', $token)}}
			@foreach($options as $option)
				{{Form::bsRadio($option->option, 'vote', $option->option, ['id' => $option->option])}}
				<br>
			@endforeach
			{{Form::bsSubmit('Vote', ['class' => 'btn btn-success'])}}
		{{Form::close()}}
	</div>
</div>
@endsection
