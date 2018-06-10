@extends('layouts.app')

<?php $isStudent=Auth::user()->hasAnyRole('student'); ?>

@section('style')
	<link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendors/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	@parent
	@component('layouts.panel',['title'=>'Lecturas Disponibles'])
		@if(!$isStudent)
		<label class="mb-4">
			<input type="checkbox" class="switchery" id="myPublications"> Solo mis publicaciones
		</label>
		@endif
		<table class="table w-100" id="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Id User</th>
					<th>Titulo</th>
					<th>{{ $isStudent?'Profesor':'Modificación' }}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($readings as $reading)
				<tr>
					<th>{{ $reading->id }}</th>
					<th>{{ $reading->user_id }}</th>
					<td>{{ $reading->title }}</td>
					<td>{{ Auth::user()->hasAnyRole('student')?$reading->name:$reading->updated_at }}</td>
					<td class="d-flex justify-content-end">
						<a style="margin-right: 1%" href="{{route('reading.show', $reading->id)}}" class="btn btn-warning ml-1" title="Ver lectura"><i class="glyphicon glyphicon-eye-open"></i></a>
						@if(!$isStudent && $reading->user_id==Auth::user()->id)
						<a style="margin-right: 1%" href="{{route('reading.edit', $reading->id)}}" class="btn btn-dark ml-1" title="Editar lectura"><i class="glyphicon glyphicon-pencil"></i></a>
		                <a data-toggle="modal" data-target="#modal-emergent" data-url="{{route('reading.destroy', $reading->id)}}" class="btn btn-danger ml-1" title="Eliminar lectura"><i class="glyphicon glyphicon-remove"></i></a>
		                @endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@endcomponent
	@include('reading.modal_remove')
@endsection

@section('script')
	<script src="{{ asset('vendors/switchery/dist/switchery.min.js') }}"></script>
	<script src="{{ asset('vendors/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendors/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    var table = $('#table').DataTable({
		    	columnDefs: [{
	                targets: [1],
	                visible: false,
	                orderable: false
	            },{
	                targets: -1,
	                orderable: false,
	                searchable: false
	            }],
		    	language: {
		    		url: '{{ asset("vendors/DataTables/Plugins/i18n/Spanish.lang") }}'
		    	},
		    	drawCallback: (settings) =>{
		    		$('#table').parent().removeClass();
		    	}
		    });
		    $myPublications = $('#myPublications');
		    if($myPublications.length!=0){
				$myPublications.change(myPublicationsChange);
				function myPublicationsChange(){
					var id_user = "{{ Auth::user()->id }}";
					if ($myPublications.is(':checked'))
						table.columns(1).search(id_user).draw();
					else
						table.columns(1).search("").draw();
				}
				myPublicationsChange();
			    new Switchery(document.querySelector('.switchery'),{size: 'small',color: '#1abb9c'});
			}
		});
	</script>
@endsection