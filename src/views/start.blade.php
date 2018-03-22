@extends('xagacrud::layout.admin')

@section('content')
<div class="container">
	@foreach (config('xagacrud.menu') as $slug => $label)
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a class='btn btn-default btn-block' href='/admin/{{$slug}}'>{{$label}}</a>
			<hr>
		</div>
	</div>
	@endforeach
</div>
@endsection
