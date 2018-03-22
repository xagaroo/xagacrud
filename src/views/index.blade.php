@extends('xagacrud::layout.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4>{{$title}}</h4>

			<hr>

			@if ($canCreate)
				<div class="row">
					<div class="col-md-12">
						<a class='btn btn-info' href='/admin/{{$path}}/create'>Crear</a>
					</div>
				</div>

				<hr>
			@endif
			
			{!!$table!!}
		</div>
	</div>
</div>
@endsection
