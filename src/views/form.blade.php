@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-heading">{{$title}}</div>

				<div class="panel-body">
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
	</div>
</div>
@endsection
