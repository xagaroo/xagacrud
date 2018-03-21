@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-heading">{{$title}}</div>

				<div class="panel-body">
					
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
	</div>
</div>
@endsection
