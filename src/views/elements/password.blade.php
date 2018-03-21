<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label for="password" class="col-md-2 control-label">{{$label}}</label>

	<div class="col-md-{{(isset($size)) ? $size : '10'}}">
		<input id="password" type="password" class="form-control" name="password" required>

		@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group">
	<label for="password-confirm" class="col-md-2 control-label">Confirma {{$label}}</label>

	<div class="col-md-{{(isset($size)) ? $size : '10'}}">
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	</div>
</div>

<hr>