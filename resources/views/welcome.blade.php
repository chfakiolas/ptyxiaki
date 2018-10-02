
@extends('layouts.app')
@section('content')

<h1 class="text-center">Laravel Index</h1>
<div class="row">
	<div class="col-md-8 offset-md-2">
	@if(count($polls) > 0)
	<ul class="list-group">
	@foreach($polls as $poll)
		<li class="list-group-item"><a href="/polls/{{$poll->id}}">{{$poll->name}}</a></li>
	@endforeach
	</ul>
	<br>
	<div class="d-flex justify-content-center">
		{{$polls->links()}}
	</div>
	</div>
@else
<p class="text-center">No poll yet :(</p>
@endif
</div>
				<div>
                    {{-- {{dd(Adldap::auth()->attempt('euclid', 'password'))}} --}}
                    {{-- {{dd(Auth::attempt(['username'=>'euclid', 'password'=>'password']))}} --}}
                    {{-- {{dd(Adldap::search()->users()->find('euclid'))}} --}}
                    {{-- {{dd(Adldap::search()->users()->get())}} --}}
                    {{-- {{dd(Adldap::search()->where('cn', '=', 'Isaac Newton')->get())}} --}}
                </div>
<br>
@endsection

