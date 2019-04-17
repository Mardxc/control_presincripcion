<script>
	function validarGrupo () {
		var id_grupo = $.fn.yiiGridView.getChecked('grupos', 'id_grupos');

			if(id_grupo!=''){
				$('#id_g').val(id_grupo);
				
				return true;
			}
			else{
				$('#id_g').val(id_grupo);
				return false;
			}
	}
</script>
<input type="text" style="display:none" id="id_g">



