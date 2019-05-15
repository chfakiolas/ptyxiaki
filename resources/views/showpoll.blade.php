@extends('layouts.app')
@section('content')
	
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<a href="/" class="btn btn-primary float-left">Επιστροφή</a><a href="/polls/{{$poll->uuid}}/results" class="btn btn-primary float-right">Αποτελέσματα</a>
			<br><br>
			<h2 class="text-center">{{$poll->name}}</h2>
			<br>
			<p>{{$poll->description}}</p>
			<hr>
			{{Form::open(['action' => 'VotesController@store', 'method' => 'POST'])}}
			{{Form::hidden('poll_id', $poll->id)}}
			{{Form::hidden('uuid', $poll->uuid)}}
			@foreach($options as $option)
				{{Form::bsRadio($option->option, 'vote', $option->option, ['id' => $option->option])}}
				<br>
			@endforeach
			{{Form::bsSubmit('Vote', ['class' => 'btn btn-success'])}}
			{{Form::close()}}
		</div>
	</div>
@endsection
