<?php
/* @var $this BasPlanEstudiosController */
/* @var $model BasPlanEstudios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_plan'); ?>
		<?php echo $form->textField($model,'id_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_estudios'); ?>
		<?php echo $form->textField($model,'plan_estudios',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc_autorizacion'); ?>
		<?php echo $form->textField($model,'doc_autorizacion',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creditos_optativos'); ?>
		<?php echo $form->textField($model,'creditos_optativos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creditos_totales'); ?>
		<?php echo $form->textField($model,'creditos_totales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reticula'); ?>
		<?php echo $form->textField($model,'reticula',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_alta'); ?>
		<?php echo $form->textField($model,'fecha_alta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carga_max_creditos'); ?>
		<?php echo $form->textField($model,'carga_max_creditos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carga_min_creditos'); ?>
		<?php echo $form->textField($model,'carga_min_creditos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->