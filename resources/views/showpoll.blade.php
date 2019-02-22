@extends('layouts.app')
@section('content')
	<a href="/" class="btn btn-primary float-left">Back</a><a href="/polls/{{$poll->id}}/results" class="btn btn-primary float-right">Results</a>
	<br><br>
	<h2 class="text-center">{{$poll->name}}</h2>
	<br>
	<p>{{$poll->description}}</p>
	<hr>
	{{Form::open(['action' => 'VotesController@store', 'method' => 'POST'])}}
	{{Form::hidden('poll_id', $poll->id)}}
	@foreach($options as $option)
		{{Form::bsRadio($option->option, 'vote', $option->option, ['id' => $option->option])}}
	<br>
	@endforeach
	{{Form::bsSubmit('Vote', ['class' => 'btn btn-success'])}}
	{{Form::close()}}
@endsection
