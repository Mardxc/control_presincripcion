<?php
/* @var $this InsInscripcionController */
/* @var $model InsInscripcion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ins-inscripcion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicial'); ?>
		<?php echo $form->textField($model,'fecha_inicial'); ?>
		<?php echo $form->error($model,'fecha_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_final'); ?>
		<?php echo $form->textField($model,'fecha_final'); ?>
		<?php echo $form->error($model,'fecha_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semestre'); ?>
		<?php echo $form->textField($model,'semestre'); ?>
		<?php echo $form->error($model,'semestre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
		<?php echo $form->error($model,'id_alumno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_carrera'); ?>
		<?php echo $form->textField($model,'id_carrera'); ?>
		<?php echo $form->error($model,'id_carrera'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_periodo'); ?>
		<?php echo $form->textField($model,'id_periodo'); ?>
		<?php echo $form->error($model,'id_periodo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->