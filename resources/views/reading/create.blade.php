@extends('layouts.app')

@section('style')
	<link href="{{ asset('vendors/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
	@parent
	@component('layouts.panel',['title'=>'Crear nueva lectura'])
		@isset($reading)
			{!! Form::model($reading,['route'=>['reading.update',$reading->id],'method'=>'put'],null) !!}
		@else
			{!! Form::open(['route'=>'reading.store','method'=>'post'],null) !!}
		@endisset
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil t-0" id="basic-addon1"></span>
				{!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Titulo', 'aria-describedby'=>'basic-addon1']) !!}
			</div>
			{!! Form::textarea('content',null,['id'=>'summernote']) !!}
			{!! Form::submit('Guardar',['class'=>'btn btn-dark alignright']) !!}
		{!! Form::close() !!}
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