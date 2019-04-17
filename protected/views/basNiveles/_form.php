<?php
/* @var $this BasNivelesController */
/* @var $model BasNiveles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-niveles-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicial'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_inicial',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_inicial),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_inicial,
		 		'dateFormat'=>'dd/mm/yy',
		 		'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.gif',
		 		'buttonImageOnly'=>true,
		 		'buttonText'=>'Fecha',
		 		'selectOtherMonths'=>true,
		 		'showAnim'=>'slide',
		 		'showButtonPanel'=>true,
		 		'showOn'=>'button',
		 		'showOtherMonths'=>true,
		 		'changeMonth' => true,
		 		'changeYear' => true,
		 		),
		 	));
	 	?>
		<?php echo $form->error($model,'fecha_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_final'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_final',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_final),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_final,
		 		'dateFormat'=>'dd/mm/yy',
		 		'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.gif',
		 		'buttonImageOnly'=>true,
		 		'buttonText'=>'Fecha',
		 		'selectOtherMonths'=>true,
		 		'showAnim'=>'slide',
		 		'showButtonPanel'=>true,
		 		'showOn'=>'button',
		 		'showOtherMonths'=>true,
		 		'changeMonth' => true,
		 		'changeYear' => true,
		 		),
		 	));
	 	?>
		<?php echo $form->error($model,'fecha_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',BasNiveles::getEstado(),array('width'=>400)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grados'); ?>
		<?php echo $form->textField($model,'grados'); ?>
		<?php echo $form->error($model,'grados'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupos'); ?>
		<?php echo $form->textField($model,'grupos'); ?>
		<?php echo $form->error($model,'grupos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_periodo'); ?>
		<br>
		<?php echo $form->textField($model,'id_periodo',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_periodo!='') {
				$id_periodo=$model->id_periodo;
				$periodo=BasNiveles::getNameNivel($id_periodo);
				$value=$periodo;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'periodo',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarPeriodos'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#BasNiveles_id_periodo").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_periodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_carrera'); ?>
		<br>
		<?php echo $form->textField($model,'id_carrera',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_carrera!='') {
				$id_carrera=$model->id_carrera;
				$carrera=BasNiveles::getNameCarrera($id_carrera);
				$value=$carrera;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'carrera',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarCarreras'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#BasNiveles_id_carrera").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_carrera'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->