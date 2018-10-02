@extends('layouts.app')
@section('content')
	<br>
	<h1 class="text-center">Create A New Poll</h1>
	<hr>
	<div class="col-md-8 offset-md-2">
	{!! Form::open(['action' => 'PollsController@store']) !!}
	<div class="form-group row">
    	{{Form::label('name', 'Poll Name', ['class' => 'col-sm-2 col-form-label'])}}
    	<div class="col-sm-10">
			{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Poll Name'])}}
		</div>
	</div>
	<div class="form-group">
    	{{Form::label('description', 'Description')}}
		{{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Your poll description here..'])}}
	</div>
	<div id="options">
		<div class="form-group row" data-id="1">
	    	{{Form::label('option1', 'Poll option 1', ['class' => 'col-sm-2 col-form-label'])}}
	    	<div class="col-sm-10">
				{{Form::text('option[]', '', ['class' => 'form-control', 'placeholder' => 'Poll option 1'])}}
			</div>
		</div>
		<div class="form-group row" data-id="2">
	    	{{Form::label('option2', 'Poll option 2', ['class' => 'col-sm-2 col-form-label'])}}
	    	<div class="col-sm-10">
				{{Form::text('option[]', '', ['class' => 'form-control', 'placeholder' => 'Poll option 2'])}}
			</div>
		</div>
	</div>
	<div id="new-choice">
		<button type="button" class="btn btn-primary" id="add-choice">Add option</button>
	</div>

	<br>
	<div>
		{{Form::submit('Submit', ['class'=>'btn btn-default'])}}
	</div>
	{!! Form::close() !!}
	</div>
	<hr>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae repellat molestiae, molestias dicta itaque consequatur fugit qui, quas, saepe aliquid a natus expedita incidunt nostrum porro harum repellendus similique pariatur.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quod corporis cum quo laudantium molestiae, ut dolore obcaecati explicabo facere ab, maiores porro amet repellat veritatis iusto quae aliquid recusandae?</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam ut vitae ad et consequuntur quaerat laborum perferendis error voluptatibus, quis, eos, architecto consequatur odit? Animi minus corporis officia eaque sint.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, delectus provident. Unde, deleniti minima atque similique labore perspiciatis doloribus non cupiditate vel eveniet, sit iusto error! Sed amet ex voluptatibus?</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam sapiente, dolore reiciendis, obcaecati labore placeat iusto autem laboriosam velit nostrum, quaerat quae assumenda magnam dolorum voluptas quo debitis optio totam!</p>
@endsection
