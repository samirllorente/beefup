@extends('layouts.app')

@section('style')
	<link href="{{ asset('vendors/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
	@parent
	@component('layouts.panel',['title'=>'Crear nueva lectura'])
		<form method="post" action="{{ route('reading.store') }}">
			@csrf
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil t-0" id="basic-addon1"></span>
				<input type="text" name="title" class="form-control" placeholder="Titulo" aria-describedby="basic-addon1">
			</div>
			<textarea id="summernote" name="reading"></textarea>
			<input type="submit" class="btn btn-dark alignright" value="Guardar">
		</form>
	@endcomponent

@endsection

@section('script')
	<script src="{{ asset('vendors/summernote/summernote.js') }}"></script>
	<script src="{{ asset('vendors/summernote/lang/summernote-es-ES.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#summernote').summernote({
				height: 200,
				lang: 'es-ES'
			});
		});
	</script>
@endsection