
@extends('layouts.app')
@section('content')

<h1 class="text-center">Πληροφοριακό Σύστημα Ηλεκτρονικών Ψηφοφοριών</h1>
<br>
<div class="row">
	<div class="col-md-8 offset-md-2">
	@if(count($polls) > 0)
	<ul class="list-group">
	@foreach($polls as $poll)
		<li class="list-group-item"><a href="/polls/{{$poll->uuid}}">{{$poll->name}}</a></li>
	@endforeach
	</ul>
	<br>
	<div class="d-flex justify-content-center">
		{{$polls->links()}}
	</div>
	</div>
@else
<p class="text-center"></p>
@endif
<br>
@endsection

