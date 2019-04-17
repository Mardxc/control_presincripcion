<?php
/* @var $this AluPreinscripcionController */
/* @var $model AluPreinscripcion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-preinscripcion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'folio_aspirante'); ?>
		<?php echo $form->textField($model,'folio_aspirante',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'folio_aspirante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folio_exani'); ?>
		<?php echo $form->textField($model,'folio_exani',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'folio_exani'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->