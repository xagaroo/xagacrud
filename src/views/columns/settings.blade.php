<td>
	@if ($edit)
		<a class='btn btn-xs btn-info' href='{{$path}}edit/{{$id}}'>Editar</a>
	@endif
	@if ($delete)
		<a class="delete btn btn-danger btn-xs" href='{{$path}}delete/{{$id}}'>Eliminar</a>
	@endif
</td>