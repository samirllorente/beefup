@extends('layouts.app')

@section('content')
	@parent
	@component('layouts.panel',['title'=>$reading->title])
		{!! $reading->content !!}
	@endcomponent
	<a  data-toggle="modal" data-target="#modal-emergent" data-url="{{route('reading.destroy', $reading->id)}}" class='btn btn-danger alignright'> Eliminar</a>
	<a href="{{ route('reading.edit',$reading->id) }}" class='btn btn-info alignright'> Editar</a>
	@include('reading.modal_remove')
@endsection
