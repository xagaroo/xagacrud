<table id='contents' class='table table-bordered table-condensed'>
	@if (isset($colgroups))
		<colgroup>
		@foreach ($colgroups as $c)
			<col class='{{$c}}'>
		@endforeach
		</colgroup>
	@endif
	<thead>
		<tr>
			@foreach ($columns as $column)
				<th>{{$column->label}}</th>
			@endforeach
		</tr>
	</thead>
