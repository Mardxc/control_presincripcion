<script>
	function buscaAlumno(){
		$('#alumno_busqueda').prop('disabled',false);
		$("#nombre_alumno").val("");
		$("#id_alumno").val("");
	}
	function filtraAlumno(){
		var nombreAlumno=$("#nombreAlumno").val();

		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/filtraAlumno'),
		    'data'=> array(
		        'nombreAlumno'	=>	'js:nombreAlumno'
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
		    	alert('actualiza');
				$.fn.yiiGridView.update('co-select-grid');	 
				//$.fn.yiiGridView.update('co-select-grid',{ data: 4 });
				//$.fn.yiiGridView.update('gruposalumnos',{ data: data.id_detalles_grupos });

		    }"
		))
		?>;
		return false; 
	}
	function buscaAlumnos(){
		var nombreAlumno=$("#buscaAlumno").val();
		//alert(nombreAlumno);
		$.fn.yiiGridView.update('gruposalumnos',{ data: nombreAlumno });
		//$.fn.yiiGridView.update('gruposalumnos',{data:{"id":nombreAlumno}});

	}
	function fijarDatos(){
		var id_alumno = $.fn.yiiGridView.getChecked('co-select-grid','id_alumnos');
		
		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/fijarDatos'),
		    'data'=> array(
		        'id_alumno'				=>	'js:id_alumno'
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
		    	if(data.status==1){
					$('#nombre_alumno').val(data.nombre);
					$('#id_alumno').val(data.id_alumno); 		
		    	}
		    }"
		))
		?>;
		return false; 
	}
	function guardarAlumnos(){
		var id_detalles_grupos=0;
		if($('#id_detalles_grupos').val()!='')
			id_detalles_grupos=$('#id_detalles_grupos').val();

		var id_alumno=$('#id_alumno').val();
		var id_grupo=$('#id_gr').val() ;


		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/guardarAlumno'),
		    'data'=> array(
		        'id_grupo'				=>	'js:id_grupo',
		        'id_alumno'				=>	'js:id_alumno',
		        'id_detalles_grupos'	=>	'js:id_detalles_grupos'
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
		    	$('#mensaje_alumnos').css('display','block');
				$('#mensaje_alumnos').html(data.status);
				$('#nombre_alumno').val('');
				$.fn.yiiGridView.update('gruposalumnos',{ data: data.id_detalles_grupos });
		    }"
		))
		?>;
		return false; 
	}
	function accionesAlumnos(){
		if($('#nombre_alumno').val()==''){
			if($('#save_alumnos').text()=='Nuevo'){
				$('input').prop('val','');
				$('#mensaje_alumnos').css('display','none');
				$('#save_alumnos').val('guardar');
				$('#save_alumnos').text('Guardar');
				
			}
			else if($('#save_grupo').text()=='Guardar'){

				guardarAlumnos();
				$('input').prop('val','');

				$('#save_alumnos').val('Nuevo');
				$('#save_alumnos').text('Nuevo');
				$('#nombre_alumno').val('');
				$('#id_alumno').val('');
			}
		}else {

			/*Verificar si las cajas están vacias*/
			guardarAlumnos();

			$('#id_alumno').val('');
			//$('#id_gr').val('');
			
			$('#save_alumnos').val('Nuevo');
			$('#save_alumnos').text('Nuevo');
		}	
	}
    function actualizaAlumnos(){
        var id_detalles_grupos = $.fn.yiiGridView.getSelection('gruposalumnos');


        $('#id_detalles_grupos').val(id_detalles_grupos);

		
		$('#save_alumnos').val('actualizar');
		$('#save_alumnos').text('Actualizar');

		getDataAlumnos(id_detalles_grupos);

    }

	function getDataAlumnos(id_detalles_grupos){

		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/getDataAlumnos'),
		    'data'=> array(
		        'id_detalles_grupos'=>'js:id_detalles_grupos',
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
				$('#nombre_alumno').val(data.nombre_alumno);
				$('#id_grupo').text(data.id_grupo);
				$('#id_alumno').val(data.id_alumno);
				$('#id_detalles_grupos').val(data.id_detalles_grupos);
		    }"
		))
		?>;
		return false; 
	}
	function borrarAlumno(){
		//var id_grupo = $.fn.yiiGridView.getSelection('grupos');
		var id_detalles_grupos=  $.fn.yiiGridView.getChecked('gruposalumnos', 'id_detalles_grupos');

		var confirmar = confirm("Deseas eliminar el alumno del grupo?");
		if (confirmar == true) {
			<?php echo CHtml::ajax(array(
			   	'url'=>array('gruExamen/AjaxDeleteGrupos'),
			    'data'=> array(
			        'id_detalles_grupos'=>'js:id_detalles_grupos',
			    ),
			    'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	
			    	if(data.mensaje!=''){
				    	$('#mensaje_alumnos').css('display','block');
						$('#mensaje_alumnos').html('El alumno se elimino del grupo seleccionado');
						$.fn.yiiGridView.update('gruposalumnos');	    		
			    	}

			    }"
			))
			?>;
			return false; 
		}
	}
</script>
<h1 id="headerGrupoAlumnos">Grupo no seleccionado</h1>
<h4><?php echo $examen; ?></h4>

<!--ID del Grupo Seleccionado-->
<input type="text" id="id_gr" style="display:none;">
<div class="alert alert-danger" id='mensaje_alumnos' align="center" style="display:none;"></div>
<table>
	<tr>
		<td>
			Alumno:
		</td>
		<td>
			<input type="text" id="buscaAlumno">
		</td>
		<td>
			<a class="btn btn-success" style="color:white;" onclick="buscaAlumnos()">Buscar</a>
		</td>
	</tr>
</table>
<div align="right">
	<a id="borrar_alumno"  value="borrar" onclick="borrarAlumno()"
	style="text-align:right;color:rgba(40, 204, 99, 0.89);cursor:hand;"><i class="fa fa-times fa-4x"></i></a>
</div>
<div align="right" id="totalAlumnos"></div>
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'gruposalumnos',
    'dataProvider'=>$dataProviderGruposAlumnos,
    //'selectionChanged'=>'actualizaAlumnos', 
    'selectableRows'=>1,
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen alumnos registrados para el grupo seleccionado',
	'summaryText'=>'',
    'columns'=>array(
            array(
                'id'=>'id_detalles_grupos',
                'class'=>'CCheckBoxColumn',
                 'selectableRows' => '1',  
            ),
            array(
            	'name'=>'ALUMNO',
            	'header'=>'ALUMNOS',
            	'htmlOptions'=>array('style'=>'cursor:hand;')
            ),
        ),
    ));
?>

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', 
    array(
        'id'=>'alu_dialog',
        'options'=>array(
            'title'=>'Listado de Alumnos no Preinscritos',
            'width'=>'650px',
            'autoOpen'=>false,
            'modal'=>true,
        ),
    ));
	echo 'Alumno:';
	/*echo CHtml::textField('nombreAlumno',
	'',
	array('onkeypress'=>'letras("nombreAlumno")'),
	array('id'=>'nombreAlumno','width'=>'400px','maxlength'=>70)); */
?>

<input type="text" id="nombreAlumno" maxlength="60" size="60px">
<button id="buscaAlumno" class="btn btn-success" value="Busca" onclick="filtraAlumno()">Buscar</button>
<?php
	$this->widget('zii.widgets.grid.CGridView', 
    array(
        'id'=>'co-select-grid',
		'itemsCssClass'=>"table table-hover table-bordered ",
		'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
		'emptyText'=>'No existen resultados en esta busqueda',
		'summaryText'=>'{start}-{end} de {count}',
        'dataProvider'=>$dataProviderAlumnos,
        'columns'=>array(
            array(
                'id'=>'id_alumnos',
                'class'=>'CCheckBoxColumn',
                 'selectableRows' => '1',  
            ),
        	'NUMERO_CONTROL',
        	'NOMBRE',
            array(
                'header'=>'SELECCIONAR',
                'type'=>'raw',
                'value'=>'CHtml::Button("+",array(
                    "name" 		=> "send_alu", 
                    "id" 		=> "send_alu", 
                    "onClick" 	=> "
                    	$(\"#alu_dialog\").dialog(\"close\");
                    	fijarDatos();"
                ))',
            ),
        ),
    ));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
