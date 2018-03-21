<div class="form-group{{ $errors->has($id) ? ' has-error' : '' }}">
	<label for="{{$id}}" class="col-md-2 control-label">{{$label}}</label>

	<div class="col-md-{{(isset($size)) ? $size : '10'}}">
		<input id="{{$id}}" type="{{isset($type) ? $type : 'text'}}" class="form-control" name="{{$id}}" value="{{ old($id, isset($item->$id) ? $item->$id : '') }}">

		@if ($errors->has($id))
			<span class="help-block">
				<strong>{{ $errors->first($id) }}</strong>
			</span>
		@endif
	</div>
</div>