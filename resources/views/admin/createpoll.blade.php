@extends('admin.layouts.admin')
@section('title')
Δημιουργία Ψηφοφορίας
@endsection
@section('content')
<div class="col-md-8 offset-md-2">
    {!! Form::open(['action' => 'PollsController@store']) !!}
        <div class="form-group row">
            <div class="col-md-2">
                {{Form::label('name', 'Όνομα ψηφοφορίας', ['class' => 'col-form-label'])}}
            </div>
            <div class="col-md-10">
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Poll Name'])}}
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-2" >
                {{Form::label('expiration', 'Λήξη ψηφοφορίας', ['class' => 'col-form-label'])}}
            </div>
            <div class="form-group col-md-5">
                {{ Form::input('date', 'date', '', array('class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-5">
                {{ Form::input('time', 'time', '', array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-4 offset-md-2">
                {!! Form::bsRadio('Ανώνυμη Ψηφοφορία', 'votetype', 'anonymous', ['id' => 'anonymous']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::bsRadio('Επώνυμη Ψηφοφορία', 'votetype', 'eponymous', ['id' => 'eponymous']) !!}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Περιγραφή')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Your poll description here..'])}}
        </div>
        <div class="form-group" id="options">
            <div class="form-group row" data-id="1">
                {{Form::label('option1', 'Ψήφος 1', ['class' => 'col-sm-2 col-form-label'])}}
                <div class="col-sm-10">
                    {{Form::text('option[]', '', ['class' => 'form-control', 'placeholder' => 'Poll option 1'])}}
                </div>
            </div>
            <div class="form-group row" data-id="2">
                {{Form::label('option2', 'Ψήφος 2', ['class' => 'col-sm-2 col-form-label'])}}
                <div class="col-sm-10">
                    {{Form::text('option[]', '', ['class' => 'form-control', 'placeholder' => 'Poll option 2'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-left" id="new-choice">
                    <button type="button" class="btn btn-primary" id="add-choice"><i class="fa fa-plus-square"></i> Add option</button>
                </div>
                <div>
                    {{Form::submit('Δημιουργία', ['class'=>'btn btn-success float-right'])}}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
<br>
@endsection