<div class="custom-control custom-radio">
		{{Form::radio('vote', $value, false, array_merge(['class' => 'custom-control-input'], $attributes))}}
		{{Form::label($name, null, ['class' => 'custom-control-label'])}}
</div>