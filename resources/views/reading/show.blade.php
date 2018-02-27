@extends('layouts.app')

<?php $isStudent=Auth::user()->hasAnyRole('student'); ?>

@section('content')
	@parent
	<div class="row">
		<div class="col-xs-12 {{ $isStudent?'col-sm-8':'' }}">
			@component('layouts.panel',['title'=>$reading->title])
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
		<script type="text/javascript">
			var words=[];
			var word_alert = $('#word_alert').clone();
			var context = document.getElementById("TextHighlighter");
			var hltr =new TextHighlighter(context,{
				"onAfterHighlight": function(range, hlts) {
					if(hlts.length!=0){
						var word=hlts[0].innerHTML.trim();
						word_alert.find('strong').html(ucfirst(word));
						word_alert.removeClass('out');
						word_alert.addClass('in');
						if(searchWordIfNotAdd(word)){
							hltr.removeHighlights(hlts[0]);
							hltr.find(word,false);
							alert=word_alert.clone();
							alert.click(function(){
								removeWord(word);
							});
							$('#unknown_words').append(alert);
						}
					}else{
						return true;
					}
				}
			});
			//Retorna true si agrega la palabra
			function searchWordIfNotAdd(word){
				word=word.toLowerCase().trim();
				if(words.indexOf(word)==-1){
					words.push(word);
					return true;
				}
				return false;
			}
			//Deseleciona todo, elimina la palabra y vuelve y seleciona
			function removeWord(word){
				word=word.toLowerCase().trim();
				var position=words.indexOf(word);
				if(position!=-1){
					words.splice(position,1);
					hltr.removeHighlights();
					words.forEach(function(element) {
					    hltr.find(element,false);
					});
				}
			}
			//Primera palabra en mayuscula
			function ucfirst(word){
				return word.charAt(0).toUpperCase()+word.slice(1).toLowerCase();
			}
		</script>
	@endsection
@endif
