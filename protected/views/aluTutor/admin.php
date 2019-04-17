<button class="btn btn-success bt-large fa-2x" id="createTutor"><li class="fa fa-plus"></li> Asignar tutor</button>

<?php if (isset($model->id_tutor)) { ?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'tutor_grid',
		//'selectableRows'=>1,
		//'selectionChanged'=>'actualizarTutor',
		'itemsCssClass'=>"table table-hover table-stripped table-condensed",
		'pager'=>array("htmlOptions"=>array("class"=>"pagination pager")),
		'emptyText'=>'No existen resultados en esta busqueda',
		'summaryText'=>'{start}-{end} de {count} Tutores',
		'dataProvider'=>$model->listarTutor($id),
		'columns'=>array(
				//'id_tutor',
				'nombre',
				'ape_pat',
				'ape_mat',
				'domicilio',
				'telefono',
				array(
					'name'=>'id_parentesco',
					'header'=>'PARENTESCO',
					'value'=>'aluTutor::getNameParentesco($data->id_parentesco)',
					'filter'=>aluTutor::getListParentescos(),
				),
				'profesion',
				'lugar_trabajo',
				//'domicilio_trabajo',
				'telefono_trabajo',
				//'jefe_inmediato',
				//'telefono_jefe_inmediato',
				array(
					'class'=>'CButtonColumn',
					'template'=>'{delete}',//'{delete}{Actualizar}',
						'buttons'=>array(
							'delete' => array( //botón para la acción nueva
								'options' => array('rel' => 'tooltip', 
									'data-toggle' => 'tooltip', 
									'title' => Yii::t('app', 'Eliminar'),
									'id'=>'eliminar'
								),
			                	'label' => '<i class="fa fa-times fa-2x"></i>',
			                	'url'=>'Yii::app()->createUrl("aluTutor/delete", array("id_tutor"=>$data->id_tutor))',
			                	'imageUrl' => false,					    								    
								'deleteConfirmation'=>'Esta seguro que desea borrar el registro?',
			                	'afterDelete'=>'$.fn.yiiGridView.update("tutor_grid");',
							),

							/*'Actualizar' => array( //botón para la acción nueva
								'options' => array('rel' => 'tooltip', 
									'data-toggle' => 'tooltip', 
									'title' => Yii::t('app', 'Actualizar'),
									'id'=>'Actualizar'
								),
			                	'label' => '<i class="fa fa-refresh fa-2x" id="actualizar"></i>',
			                	'imageUrl' => false,
			                	'url'=>'Yii::app()->createUrl("aluTutor/view", array("id_tutor"=>$data->id_tutor, "id"=>$data->id_alumno))',
						    	//'click'=>'js:actualizarTutor(id_tutor)',
			                	//'click'=>'$("#actualizarTutor").dialog("open")',
								//'updateButtonUrl'=>'Yii::app()->controller->createUrl("actualizarTutor")',
							),*/
						),
				),
			
		),
	)); ?>

<?php }; ?>

<!-- BEGIN Crear Tutor -->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'crearTutor',
    'options'=>array(
        'title'=>'Crear Tutor',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>'550',
        'resizable'=>false,
        'position' => '{my:"bottom", at: "center", of:button}',
       // 'buttons'=>array('Cancelar'=>'js:function(){$(this).dialog("close");}',),
    ),
));?>
<div class="divForForm">
	<?php 
		$this->renderPartial(
	        '/aluTutor/view',
	        array(
	        	'model'=>$model,
	        	'id'=>$id,
	        	'id_tutor'=>''
	        ));
	 ?>
</div>

<?php $this->endWidget();?>
 <script>
	$(document).ready(function(){
		$('#createTutor').click(function(){
			$('#crearTutor').dialog("open");
		})
	});
 </script>

<!-- END Crear Tutor -->

<!-- BEGIN Actualizar Tutor -->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'actualizarTutor',
    'options'=>array(
        'title'=>'Actualizar Tutor',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>500,
        'height'=>'550',
        'resizable'=>false,
        'position' => '{my:"bottom", at: "center", of:button}',
       // 'buttons'=>array('Cancelar'=>'js:function(){$(this).dialog("close");}',),
    ),
));?>
<div class="divForForm">
	<?php 
		$this->renderPartial(
	        '/aluTutor/view',
	        array(
	        	'model'=>$model,
	        	'id'=>$id,
	        	'id_tutor'=>''
	        	//'id_tutor'=>'data'
	        ));
	 ?>
</div>

<?php $this->endWidget();?>

<script>
	/*$(document).ready(function(){
		$('#actualizar').click(function(){
			$('#actualizarTutor').dialog("open");
		})
	});*/
	function actualizarTutor () {
		$('#actualizarTutor').dialog("open");
		var id_tutor = $.fn.yiiGridView.getSelection('tutor_grid');
		<?php $id_tutor='js:id_tutor' ?>
		alert(id_tutor);
	}
</script>

<!-- END Actualizar Tutor -->