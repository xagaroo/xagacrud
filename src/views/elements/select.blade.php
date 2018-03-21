<div class="form-group{{ $errors->has($id) ? ' has-error' : '' }}">
	<label for="{{$id}}" class="col-md-2 control-label">{{$label}}</label>

	<div class="col-md-10">
		<select id='{{$id}}' class='form-control' name='{{$id}}'>
			<option value=''></option>
			@foreach ($data as $key=>$value)

			@if (isset($item) && $item->$id instanceof Illuminate\Database\Eloquent\Collection)
			<option {{ old($id) == $key ? 'selected' : isset($item) && (in_array($key, $item->$id->pluck('id')->toArray())) ? 'selected' : '' }} value='{{$key}}'>{{$value}}</option>
			@else
			<option {{ old($id) == $key ? 'selected' : isset($item) && ($item->$id == $key) ? 'selected' : '' }} value='{{$key}}'>{{$value}}</option>
			@endif
			
			@endforeach
		</select>

		@if ($errors->has($id))
			<span class="help-block">
				<strong>{{ $errors->first($id) }}</strong>
			</span>
		@endif
	</div>
</div>