@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a href="/createpoll" class="btn btn-success btn-lg">Create Poll</a>
                        <a href="/profile" class="btn btn-primary btn-lg float-right">Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
