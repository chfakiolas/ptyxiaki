@extends('admin.layouts.admin')
@section('title')
Επεξεργασία Ψηφοφορίας
@endsection
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        {!! Form::open(['method' => 'PUT', 'action' => 'PollsController@update']) !!}
            {{ Form::hidden('id', $poll->id) }}
            <div class="form-group row">
                <div class="col-md-2">
                    {{Form::label('name', 'Poll Name', ['class' => 'col-form-label'])}}
                </div>
                <div class="col-md-10">
                    {{Form::text('name', $poll->name, ['class' => 'form-control', 'placeholder' => 'Poll Name'])}}
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-2" >
                    {{Form::label('expiration', 'Expiration', ['class' => 'col-form-label'])}}
                </div>
                <div class="form-group col-md-5">
                    {{ Form::input('date', 'date', $poll->date, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-5">
                    {{ Form::input('time', 'time', $poll->time, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $poll->description, ['class' => 'form-control', 'placeholder' => 'Your poll description here..'])}}
            </div>
            <div class="form-group" id="options">
                @foreach($options as $option)
                {{Form::hidden('optionId[]', $option->id)}}
                <div class="form-group row" data-id="1">
                    {{Form::label('option', 'Poll option', ['class' => 'col-sm-2 col-form-label'])}}
                    <div class="col-sm-10">
                        {{Form::text('option[]', $option->option, ['class' => 'form-control', 'placeholder' => 'Poll option 1'])}}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                        {{Form::submit('Ενημέρωση', ['class'=>'btn btn-success float-right'])}}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection