@extends('xagacrud::layout.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<h3>Set permissions</h3>

			<div class="row borderlined">
				<div class="col-md-12">
					<a class='btn btn-default' href='/admin/role'>Back</a>
				</div>
			</div>

			<hr/>

			<form class="form-horizontal borderlined" role="form" method="POST" action="{{ url('/admin/role/permission/' . $role->id) }}">
				{{ csrf_field() }}

				<input type='hidden' name='id' value='{{$role->id}}'/>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						@foreach ($permissions as $p)
						<div class="checkbox">
							<label>
								<input name='permissions[{{$p->id}}]' {{ in_array($p->id, $selected) ? 'checked' : '' }} type="checkbox"> {{$p->name}} / <b>{{$p->display_name}}</b>
							</label>
						</div>
						@endforeach
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-btn fa-user"></i> Save
						</button>
					</div>
				</div>
			</form>



		</div>
	</div>
</div>
@endsection
