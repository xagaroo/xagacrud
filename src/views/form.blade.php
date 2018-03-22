@extends('xagacrud::layout.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4>{{$title}}</h4>

			<hr>

			<div class="row">
				<div class="col-md-12">
					<a class='btn btn-default' href='/admin/{{$path}}'>Atrás</a>
				</div>
			</div>

			<hr>

			{!! $form !!}
		</div>
	</div>
</div>
@endsection
