@extends('layouts.app')

@section('content')
	@parent
	@component('layouts.panel',['title'=>$reading->title])
		{!! $reading->content !!}
	@endcomponent

@endsection
