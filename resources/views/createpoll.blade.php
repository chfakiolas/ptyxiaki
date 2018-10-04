@extends('layouts.app')
@section('content')
    <br>
    <h1 class="text-center">Create A New Poll</h1>
    <hr>
    <div class="col-md-8 offset-md-2">
    {!! Form::open(['action' => 'PollsController@store']) !!}
    <div class="form-group row">
        <div class="col-md-2">
            {{Form::label('name', 'Poll Name', ['class' => 'col-form-label'])}}
        </div>
        <div class="col-md-10">
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Poll Name'])}}
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-2" >
            {{Form::label('expiration', 'Expiration', ['class' => 'col-form-label'])}}
        </div>
        <div class="form-group col-md-5">
            {{ Form::input('date', 'date', '', array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-5">
            {{ Form::input('time', 'time', '', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Your poll description here..'])}}
    </div>
    <div class="form-group" id="options">
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
        <button type="button" class="btn btn-primary" id="add-choice"><i class="fa fa-plus-square"></i> Add option</button>
    </div>

    <br>
    <div>
        {{Form::submit('Submit', ['class'=>'btn btn-default'])}}
    </div>
    {!! Form::close() !!}
    </div>
    <br>
@endsection
