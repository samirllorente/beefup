@extends('layouts.app')

@section('style')
	<link href="{{ asset('vendors/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	@parent
	@component('layouts.panel',['title'=>'Lecturas Disponibles'])
		<table class="table" id="table">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">Titulo</th>
					<th scope="col">Modificación</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			@foreach($readings as $reading)
				<tr>
					<th scope="row">{{ $reading->id }}</th>
					<td>{{ $reading->title }}</td>
					<td>{{ $reading->updated_at }}</td>
					<td>
						<a style="margin-right: 1%" href="{{route('reading.show', $reading->id)}}" class="btn btn-default" title="Ver lectura"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a style="margin-right: 1%" href="{{route('reading.edit', $reading->id)}}" class="btn btn-info" title="Editar lectura"><i class="glyphicon glyphicon-pencil"></i></a>
		                <a data-toggle="modal" data-target="#modal-emergent" data-url="{{route('reading.destroy', $reading->id)}}" class="btn btn-danger tip-top" title="Eliminar lectura"><i class="glyphicon glyphicon-remove"></i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@endcomponent
	@component('layouts.modal')
	@endcomponent
@endsection

@section('script')
	<script src="{{ asset('vendors/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendors/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#table').DataTable({
		    	'language': {
		    		'url': '{{ asset("vendors/DataTables/Plugins/i18n/Spanish.lang") }}'
		    	}
		    });
		});
	</script>
@endsection