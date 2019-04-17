<script>
	$(document).ready(function(){
		$('#periodo').prop('disabled',true);

		$("#nuevo").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('EXAMEN NUEVO, GRUPOS Y ALUMNO');
		});
		$("#actualizar_examen").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('ACTUALIZAR LOS GRUPOS POR EXAMEN Y ALUMNOS DEL MISMO');
		});
		$("#borrar_examen").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('ELIMINACION DEL EXAMEN');
		});
		$("#examenes").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('EDICION GRUPOS, EXAMENES, HORARIOS, CUPO Y ALUMNOS');
		});
		$("#grupos_examenes").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('VISUALIZACION E IMPRESION DE GRUPOS, EXAMENES, HORARIOS, CUPO Y ALUMNOS');
		});
		grupos_examenes
	});
	function actualizaGridExamenes(){
		/* O para actualizar */
		var id_periodo=$('#periodo').val();

		$.fn.yiiGridView.update('examanesfiltrados',{data:{"id":id_periodo}});

	}
	function detallesExamenes(){
       	var id_examen=  $.fn.yiiGridView.getChecked('examanesfiltrados', 'id_examenes');
     
        if(id_examen!=""){
        	window.location="index.php?r=gruExamen/detalles&id="+id_examen;
        }

	}
	function gruposExamenes(){

        window.location="index.php?r=gruExamen/gruposAlumnos";

	}
	function listadoAlumnos(){

        window.location="index.php?r=gruExamen/listado";

	}
    function mostrarExamen(){
       	var id_examen=  $.fn.yiiGridView.getChecked('examanesfiltrados', 'id_examenes');

        if(id_examen!=""){
        	window.location="index.php?r=gruExamen/update&id="+id_examen;
        }
    }
	function borrarExamen(){

		var id_examen=  $.fn.yiiGridView.getChecked('examanesfiltrados', 'id_examenes');


		var confirmar = confirm("Deseas Borrar el Examen?");
		if (confirmar == true) {
			<?php echo CHtml::ajax(array(
			   	'url'=>array('gruExamen/AjaxDeleteExamenes'),
			    'data'=> array(
			        'id_examen'=>'js:id_examen',
			    ),
			    'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	

			    	if(data.mensaje!=null){
			    		if(data.status==0){
							$.fn.yiiGridView.update('examanesfiltrados');
			    		}
				    	$('#mensaje_examenes').css('display','block');
						$('#mensaje_examenes').html(data.mensaje);
							    		
			    	}

			    }"
			))
			?>;
			return false; 
		}
	}
</script>

<h1>Examenes</h1>
<table cellpadding="0" cellspacing="0" align="right" >
	<tr>
		<td colspan="2" align="left">
			<!--Examen Nuevo-->
            
			<?php
                /*
				echo CHtml::link('','index.php?r=GruExamen/create',
					array(
						'class'=>'glyphicon glyphicon-plus',
						'title'=>'Crear Nuevo Examen',
						'id'=>'nuevo',
						'style'=>'
					    	font-size: 2.9em;'
					)
				);*/
			?>
			
			<a href="index.php?r=GruExamen/create" style="text-align:rigth;cursor:hand;left:0%;" class="btn btn-success btn-large">
				<i class="fa fa-plus">Nuevo Examen</i>
			</a>

			<!--Actualizar Examen-->
			<a id="actualizar_examen" id="u"  onclick="mostrarExamen()" style="text-align:left;cursor:hand;left:100%;" class="btn btn-success btn-large">
				<i class="fa fa-refresh "></i>Actualizar Examen
			</a>
			<!--Eliminar Examen-->
			<a id="borrar_examen"  id="e"  onclick="borrarExamen()" style="text-align:left;cursor:hand;left:100%;"class="btn btn-success btn-large">
				<i class="fa fa-times "></i>Eliminar Examen
			</a>
			<!--Detalles del Examen-->
			<a id="examenes" id="i"   onclick="detallesExamenes()" style="rigth:0;text-align:left;cursor:hand;"class="btn btn-success btn-large">
				<i class="fa fa-list-alt "></i>Detalles de Examen
			</a>
			<!--Grupos de los Examenes-->
			<a id="grupos_examenes" id="i"   onclick="gruposExamenes()" style="rigth:0;text-align:left;cursor:hand;"class="btn btn-success btn-large">
				<i class="fa fa-search "></i>Grupos de Examen
			</a>
			<!--Listado de Alumnos-->
			<a id="listado_alumnos" id="i"   onclick="listadoAlumnos()" style="rigth:0;text-align:left;cursor:hand;"class="btn btn-success btn-large">
				<i class="fa fa-list "></i>Listado de Alumnos
			</a>
		</td>
	</tr>
</table>
	<table class="table table-condensed">
		<tr>
			<td>
				CICLO:
			</td>
			<td>
				<div class="row">
					<?php echo CHtml::dropDownList('ciclo', 'ciclo', GruExamen::getListCiclos(),
			                   	array(
			                        'ajax' => array(
			                        'type' => 'POST',
			                        'url' => CController::createUrl('gruExamen/dynamicPeriodos'),
			                        'update' => '#periodo',
			                        'data'=>array('ciclo'=>'js:this.value'), 
			                            'beforeSend' => 'function(){
			                            	$("#periodo").prop("disabled",false);
			                              	$("#periodo").find("option").remove();
			                            }',   
			                        ),'prompt' => 'Seleccione un ciclo...'
			                  	)
					); ?>
			    </div>
			</td>
		</tr>
		<tr>
			<td>
				PERIODO:
			</td>
			<td>
				<div class="row">
					<?php
						echo CHtml::dropDownList('periodo', 
							'periodo', 
							
							array('opcion'=>'Selecciona un periodo'),
							array('onchange'=>'actualizaGridExamenes()'));
					 ?>
			    </div>	
			</td>
		</tr>
	</table>
<br>
<div class="alert alert-danger" id="mensaje_examenes" style="display:none;text-align:center;"></div>
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'examanesfiltrados',
    'dataProvider'=>$dataProviderExamenesFiltrados,
    'selectableRows'=>1,
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen exámenes registrados por el momento',
	'summaryText'=> 'Mostrando {start}-{end} de {count}',
    'columns'=>array(
            array(
                'id'=>'id_examenes',
                'class'=>'CCheckBoxColumn',
                 'selectableRows' => '1',  
            ),
            'OPORTUNIDAD',
            'NOMBRE',
            'HORARIO',
            'FECHA',
            'CICLO',
            'PERIODO',
        ),
    ));
?>
<div id="mensaje" align="center" style="display:block;font-weight:bold;" class="alert alert-danger"></div>