@extends('layouts.app')

<?php $isStudent=Auth::user()->hasAnyRole('student'); ?>

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	@parent
	<div class="row">
		<div class="col-xs-12 {{ $isStudent?'col-sm-8':'' }}">
			@component('layouts.panel',['title'=>$reading->title])
				@if($isStudent)
					@slot('options')
						<li><a href="#SaveStatus" id="SaveStatus">Guardar resaltadas</a></li>
						<li><a href="#LoadStatus" id="LoadStatus">Recuperar resaltadas</a></li>
				    @endslot
				@endif
				<div id='TextHighlighter'>
					{!! $reading->content !!}
				</div>
			@endcomponent
		</div>
		@if($isStudent)
		<div class="col-xs-12 col-sm-4" >
			@component('layouts.panel')
				@slot('title')
			        Palabras desconocidas
			    @endslot
			    @slot('options')
			    	<li><a href="#Remove" id="Remove">Eliminar todas</a></li>
			    @endslot
			    <div id="unknown_words"></div>
			@endcomponent
		</div>
		<div id="word_alert" class="alert alert-success alert-dismissible less_padding fade out" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            	<span aria-hidden="true">×</span>
            </button>
            <strong></strong>
      	</div>
		@endif
	</div>
	@if(!$isStudent)
		<a  data-toggle="modal" data-target="#modal-emergent" data-url="{{route('reading.destroy', $reading->id)}}" class='btn btn-danger alignright'> Eliminar</a>
		<a href="{{ route('reading.edit',$reading->id) }}" class='btn btn-info alignright'> Editar</a>
		@include('reading.modal_remove')
	@endif
@endsection

@if($isStudent)
	@section('script')
		<script src="{{ asset('vendors/texthighlighter-1.2.0/build/TextHighlighter.min.js') }}"></script>
		<script src="{{ asset('js/textHighlighter.js') }}"></script>
	@endsection
@endif
