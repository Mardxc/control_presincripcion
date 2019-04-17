<script>
	$(document).ready(function(){
		var idAlumno= "<?php echo $id_alumno; ?>";

		$('#regionEscolar').css('display','block');
		$('#muestraEscolar').click(function(){
			if($("#regionPersonal").css('display') == 'block'){
				$('#regionPersonal').css('display','none');
				$('#regionEscolar').css('display','block');
			}else{
				$('#regionPersonal').css('display','block');
				$('#regionEscolar').css('display','none');
			}
		})

		if (idAlumno==0) {

			$('#MyTab-Menu_tab_0 .ui-tabs-selected').removeClass('ui-state-active');
			$('#MyTab-Menu_tab_0 .ui-tabs-selected').removeClass('ui-tabs-selected');


			$('#Documentacion').css('display','none');
			$('#Escolares').css('display','none');
			$('#Medicos').css('display','none');
			$('#Economicos').css('display','none');
			$('#Tutor').css('display','none');
			$('#Examen').css('display','none');
			$('#Grupos').css('display','none');
			$('#Inscripcion').css('display','none');
		};

	});
</script>

<?php 
/*
	echo CHtml::link('','index.php?r=AluAlumno/admin',
		array(
			'class'=>'fa fa-cog',
			'title'=>'Crear Nueva Alumno',
			'style'=>'left:100%;float:right;
	    		font-size: 3.0em;'
	    )
	);*/
 ?>

<h1>
	<?php 
		if(isset($model->nombre))
			echo $model->nombre . ' ' . $model->ape_pat . ' ' . $model->ape_mat ; 
	?>
</h1>

<div id="regionEscolar">
	<?php
		//Criterio para todos los detalles
		$criteria = new CDbCriteria;
		$criteria->condition = "id_alumno=".$id_alumno;
		//Documentación 
		$modelAlumno = AluAlumno::model()->find($criteria);
		//Documentación 
		$modelDocumentacion = aluDocumentacion::model()->find($criteria);
		//Escolares
		$modelEscolares		= aluEscolares::model()->find($criteria);
		//Medico
		$modelMedico 		= aluMedico::model()->find($criteria);
		//Economicos
		$modelEconomicos	= aluEconomicos::model()->find($criteria);
		//Tutor
		$modelTutor 		= aluTutor::model()->find($criteria);
		// Inscripcion
		$modelInscripcion	= insInscripcion::model()->find($criteria);
		//GruExamenAlumno
		$modelExamenAlumno 	= GruExamenAlumno::model()->find($criteria);

		$this->widget('zii.widgets.jui.CJuiTabs',array(
			//'cssFile'=>'cjuitab.css',
		    'tabs'=>array(
		        'Alumno'=>array(
		        	'model',
		        	'content'=>$this->renderPartial(
		                '/AluAlumno/view',
		                array(
		                	'model'=>$modelAlumno,
		                	'id_alumno'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
		        'Documentacion'=>array(
		        	'model',
		        	'id'=>'Documentacion',
		        	'content'=>$this->renderPartial(
		                '/aluDocumentacion/view',
		                array(
		                	'model'=>$modelDocumentacion,
		                	'id'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),   
		        'Escolares'=>array(
		        	'model',
		        	'id'=>'Escolares',
		        	'content'=>$this->renderPartial(
		                '/aluEscolares/view',
		                array(
		                	'model'=>$modelEscolares,
		                	'id'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),    
		        'Medicos'=>array(
		        	'model',
		        	'id'=>'Medicos',
		        	'content'=>$this->renderPartial(
		                '/aluMedico/view',
		                array(
		                	'model'=>$modelMedico,
		                	'id'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
				'Economicos'=>array(
		        	'model',
		        	'id'=>'Economicos',
		        	'content'=>$this->renderPartial(
		                '/aluEconomicos/view',
		                array(
		                	'model'=>$modelEconomicos,
		                	'id_alumno'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
		        'Tutor'=>array(
		        	'model',
		        	'id'=>'Tutor',
		        	'content'=>$this->renderPartial(
		                '/aluTutor/admin',
		                array(
		                	'model'=>$modelTutor,
		                	'id'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
		        'Examen'=>array(
		        	'model',
		        	'id'=>'Examen',
		        	'content'=>$this->renderPartial(
		                '/GruExamenAlumno/view',
		                array(
		                	'model'=>$modelExamenAlumno,
		                	'id'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
		        'Grupos'=>array(
		        	'model',
		        	'id'=>'Grupos',
		        	'content'=>$this->renderPartial(
		                'grupos',
		                array(
		                	'dataAlumnosGrupoFiltrado'=>$dataAlumnosGrupoFiltrado,
		                	'id_alumno'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
		        'Inscripcion'=>array(
		        	'model',
		        	'id'=>'Inscripcion',
		        	'content'=>$this->renderPartial(
		                '/insInscripcion/admin',
		                array(
		                	'model'=>$modelInscripcion,
		                	'id'=>$id_alumno
		                ),
		                TRUE
		            )
		        ),
		     ),

		    'options'=>array(
		        'collapsible'=>true,
		    ),
		    'id'=>'MyTab-Menu',
		));
	?>

</div>
