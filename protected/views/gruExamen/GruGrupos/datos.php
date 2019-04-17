	
<script>
	$(document).ready(function(){
		$('input[type=text]').prop('disabled',true);
		$('select').prop('disabled',true);
	});
	function actualizaAula(){
		var id_aula=$('#aula').val();
		$("#aula").prop("disabled",false);
		$('#GruExamen_id_aula').val(id_aula);
	}

	function guardarGrupos(){

		var id_grupo=0;
		if($('#id_grupo').val()!='')
			id_grupo=$('#id_grupo').val();

		var nombre=$('#nombre').val();
		var turno=$('#turno').val();
		var cupo_max=$('#cupo_max').val() ;
		var id_examen=$('#id_examen').val() ;
		var id_carrera=$('#carrera').val();
		var id_aula=$('#aula').val();
		var aplicador=$('#aplicador').val();
		var save_grupo=$('#save_grupo').val();
	
		<?php echo CHtml::ajax(array(
			'url'=>array('gruExamen/guardar'),
			'data'=> array(
				'id_grupo'	=>	'js:id_grupo',
				'nombre'	=>	"js:nombre",
				'turno'		=>	"js:turno",
				'cupo_max'	=>	"js:cupo_max",
				'id_carrera'=> 	'js:id_carrera',
				'id_aula'	=> 	'js:id_aula',
				'aplicador'	=> 	'js:aplicador',
				'id_examen'	=>	$id_examen,
			),
			'type'=>'post',
			'dataType'=>'json',
			'success'=>"function(data)
			{	
				
                $('#carrera').empty();
                $('#carrera').append(new Option('Selecciona una carrera...', ''));
				$.each(data.carreras, function(value,key) {
				$('#carrera').append($('<option></option>')
					.attr('value', value).text(key));
				});

                $('#edificio').empty();
                $('#edificio').append(new Option('Selecciona un edificio...', ''));
				$.each(data.edificios, function(value,key) {
				$('#edificio').append($('<option></option>')
					.attr('value', value).text(key));
				});

				$('#aula').empty();
				//$('#aula').prop('disabled','disabled');
				$('#aula').append(new Option('Selecciona una aula...', ''));

				if(data.bandera==1){
					$('#mensaje').css('display','block');
					$('#mensaje').html(data.status);
					$.fn.yiiGridView.update('grupos');				    		
				}else{
					$('#mensaje').css('display','block');
					$('#mensaje').html(data.status);		    		
				}
				$('select').prop('disabled',true);
			}"
		))?>;
		return false; 	
	}
	function getData(id_grupo){

		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/getData'),
		    'data'=> array(
		        'id_grupo'=>'js:id_grupo',
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
				$('select').prop('disabled',false);

		    	$('#totalAlumnos').html('Alumnos Registrados: '+data.totalEnGrupo);
				$('#nombre').val(data.nombre);
				$('#headerGrupoAlumnos').text(data.nombre);
				$('#headerGrupo').text(data.nombre);
				$('#turno').val(data.turno);
				$('#cupo_max').val(data.cupo_max);
				$('#id_grupo').val(data.id_grupo);
				$('#aplicador').val(data.aplicador);
	
                $('#aula').empty();
				$.each(data.aulas, function(value,key) {
				$('#aula').append($('<option></option>')
					.attr('value', value).text(key));
				});

				$('#edificio option').each(function(){
				  if ($(this).text() == data.id_edificio)
				    $(this).attr('selected','selected');
				});

				$('#carrera option').each(function(){
				  if ($(this).text() == data.id_carrera)
				    $(this).attr('selected','selected');
				});

				$('#aula option').each(function(){
				  if ($(this).text() == data.id_aula)
				    $(this).attr('selected','selected');
				});

				$('#nombre_alumno').val('');
				$('#id_alumno').val('');
		    }"
		))
		?>;
		return false; 
	}
	function mostrarNota(){
        var id_nota = $.fn.yiiGridView.getSelection('notas_busqueda');
        if(id_nota!=""){
        		window.location="index.php?r=notas/update&id="+id_nota;
        }
    }

    function actualizaGrupo(){
        var id_grupo = $.fn.yiiGridView.getSelection('grupos');
        $('#id_gr').val(id_grupo);
        $('#id_grupo').val(id_grupo);
		$('input[type=text]').prop('disabled',false);
		
		$('#save_grupo').val('actualizar');
		$('#save_grupo').text('Actualizar');
		//alert(id_grupo);
		getData(id_grupo);	
		 $.fn.yiiGridView.update('gruposalumnos',{ data: id_grupo });
    }
 	function updateAlumnos(id_grupo){

		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/updateAlumnos'),
		    'data'=> array(
		        'id_grupo'=>'js:id_grupo',
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
		    	alert('actualizar');
				$.fn.yiiGridView.update('gruposalumnos');
		    }"
		))
		?>;
		return false; 
	}
	function acciones(){
		if($('#nombre').val()==''){
			$('select').prop('disabled',false);
			if($('#save_grupo').text()=='Nuevo'){

				$('input').prop('val','');
				
				$('#mensaje').css('display','none');
				$('#save_grupo').val('guardar');
				$('#save_grupo').text('Guardar');
				$('input[type=text]').prop('disabled',false);

			}
			else if($('#save_grupo').text()=='Guardar'){
				/*Verificar si las cajas están vacias*/
				guardarGrupos();
				$('input').prop('val','');
				$.fn.yiiGridView.update('grupos');
				$('#save_grupo').val('Nuevo');
				$('#save_grupo').text('Nuevo');
				$('input[type=text]').prop('disabled',true);
			}
		}else {

			/*Verificar si las cajas están vacias*/
			guardarGrupos();
			$('input[type=text]').prop('disabled',true);
			$('input[type=text]').val('');

			$('#save_grupo').val('Nuevo');
			$('#save_grupo').text('Nuevo');
		}	
	}
</script>
<style>
	#cupo_max,#nombre,#edificio,#aplicador{
		width: 45%;
	}
</style>
<input type="text" style="display:none;" id='id_grupo'>

<h1 id="headerGrupo">Grupo no seleccionado</h1>
<h4><?php echo $examen; ?></h4>

<br>
<div class="alert alert-danger" id='mensaje' align="center" style="display:none;"></div>
<table class="table table-condensed" align="center" style="width: 80%;">
	<tr>
		<td>Nombre</td>
		<td>
			<?php echo CHtml::textField('nombre',
				'',
				array('onblur'=>'vacios("nombre","Nombre del examen")','onkeypress'=>'letras("nombre")'),
				array('id'=>'nombre','width'=>'400px','maxlength'=>45)
			); ?>
		</td>
	</tr>
	<tr>
		<td>Turno</td>
		<td>
			<?php 
				echo CHtml::dropDownList('turno', 'turno', GruExamen::getTurnos(),array('style'=>'width:45%'))
			?>
		</td>
	</tr>
	<tr>
		<td>Cupo</td>
		<td>
			<?php echo CHtml::textField('cupo_max',
				'',
				array('onblur'=>'vacios("cupo_max","Cupo Maximo")','onkeypress'=>'numeros("cupo_max")'),
				array('id'=>'cupo_max','width'=>'200px','maxlength'<=3,'style'=>'width:45%')
			); ?>
		</td>
	</tr>
	<tr>
		<td>
			Carrera
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList('carrera', 'carrera', GruExamen::getListCarreras(),
					array('prompt'=>'Seleccione una carrera...','style'=>'width:45%'))
			?>			
		</td>
	</tr>
	<tr>
		<td>
			Edificio
		</td>
		<td>
			<?php echo CHtml::dropDownList('edificio', 'edificio', GruExamen::getListEdificios(),

			        array(
			            'ajax' => array(
			            'type' => 'POST',
			            'url' => CController::createUrl('gruExamen/dynamicAulas'),
			            'update' => '#aula',
			            'data'=>array('edificio'=>'js:this.value'), 
			            'beforeSend' => 'function(){
			                $("#aula").prop("disabled",false);
			                $("#aula").find("option").remove();
			            }',   
			            ),'prompt' => 'Seleccione un edificio...'
			        )
			); ?>
		</td>
	</tr>
	<tr>
		<td>
			Aula
		</td>
		<td>
			<input type="text" id="id_aula" style="display:none;">

			<?php
				echo CHtml::dropDownList('aula', 
					'aula', 		
					array('opcion'=>'Selecciona un aula'),
					 array('style'=>'width:45%'));
			?>


		</td>
	</tr>
	<tr>
		<td>Aplicador</td>
		<td>
			<?php echo CHtml::textField('aplicador',
				'',
				array('onblur'=>'vacios("aplicador","Aplicador")','onkeypress'=>'letras("aplicador")'),
				array('id'=>'aplicador','width'=>'400px','maxlength'<=60)

			); ?>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<button id="save_grupo" class="btn btn-success" value="guardar" onclick="acciones()">Nuevo</button>
		</td>	
	</tr>
</table>
