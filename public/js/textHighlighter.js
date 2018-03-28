var words=[];
var highlighted=[];
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
				translate("en","es",word,alert);
			}
		}else{
			return true;
		}
	}
});

$('#Remove').click(function(){
	hltr.removeHighlights();
	$('.close').click();
});

$('#SaveStatus').click(function(){
	highlighted=hltr.serializeHighlights();
	hltr.removeHighlights();
});

$('#LoadStatus').click(function(){
	hltr.removeHighlights();
	hltr.deserializeHighlights(highlighted);
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
//Metodo que traduce el texto ingresado
function translate($source,$target,$text,$container){
	$token=$('meta[name="csrf-token"]').attr('content');
	$.ajax({
		url: "/translate",
		headers: {'X-CSRF-TOKEN': $token},
		type: 'POST',
		dataType: 'json',
		data: {
			source: $source,
			target: $target,
			text: 	$text
		},
		success: function($answer){
			enterTheContainer($answer.result,$container);
		}
	});
}
//Ingresa el texto traducido en el contenedor
function enterTheContainer($translate,$container){
	$container.find('strong').append(" - <span class='yellow'>"+ucfirst($translate)+"</span>");
}