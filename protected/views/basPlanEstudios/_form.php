<?php
/* @var $this BasPlanEstudiosController */
/* @var $model BasPlanEstudios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-plan-estudios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_estudios'); ?>
		<?php echo $form->textField($model,'plan_estudios',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'plan_estudios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_autorizacion'); ?>
		<?php echo $form->textField($model,'doc_autorizacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'doc_autorizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditos_optativos'); ?>
		<?php echo $form->textField($model,'creditos_optativos'); ?>
		<?php echo $form->error($model,'creditos_optativos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditos_totales'); ?>
		<?php echo $form->textField($model,'creditos_totales'); ?>
		<?php echo $form->error($model,'creditos_totales'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado',BasPlanEstudios::getEstado(),array('width'=>400)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reticula'); ?>
		<?php echo $form->textField($model,'reticula',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'reticula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_alta'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_alta',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_alta),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_alta,
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
		<?php echo $form->error($model,'fecha_alta'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->