@extends('admin.layouts.admin')
@section('title')
Polls
@endsection
@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table id="polls-table" class="table table-striped">
				<thead class="thead-dark">
					<tr>
					  <th scope="col">ID</th>
					  <th class="text-center" scope="col">Τίτλος</th>
					  <th class="text-center" scope="col">Ενέργειες</th>
					</tr>
				</thead>
				<tbody>
					@foreach($polls as $poll)
					<tr id="{{$poll->id}}">
						<td>{{$poll->id}}</td>
						<td class="text-center">{{$poll->name}}</td>
					<td class="text-center"><a class="btn btn-info" href="/admin/polls/edit/{{$poll->id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Επεξεργασία</a>    <a class="btn btn-danger" href="/admin/polls/{{$poll->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Διαγραφή</a></td>
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