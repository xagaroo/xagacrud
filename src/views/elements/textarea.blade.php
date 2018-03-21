<div class="form-group{{ $errors->has($id) ? ' has-error' : '' }}">
	<label for="{{$id}}" class="col-md-2 control-label">{{$label}}</label>

	<div class="col-md-10">
		<textarea rows='5' id="{{$id}}" class="form-control" name="{{$id}}">{{ old($id, isset($item->$id) ? $item->$id : '') }}</textarea>

		@if ($errors->has($id))
			<span class="help-block">
				<strong>{{ $errors->first($id) }}</strong>
			</span>
		@endif
	</div>
</div>