<div id="modal-emergent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form role='form' method="POST">
    	@csrf
		@method('DELETE')
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h5 id="myModalLabel">Eliminar materia</h5>
		</div>
		<div class="modal-body">
		    <h5 style="text-align: center">¿Desea realmente eliminar esta materia?</h5>
		</div>
		<div class="modal-footer">
		    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
		    <button class="btn btn-danger">Eliminar</button>
		</div>
	</form>
</div>


<script type="text/javascript">
    $('a').click(function(event) {
    	console.log("puto");
        var data_url = $(this).attr('data-url');
        $('#modal-emergent form').attr('action', data_url);
    });
</script>