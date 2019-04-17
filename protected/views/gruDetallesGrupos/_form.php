<?php
/* @var $this GruDetallesGruposController */
/* @var $model GruDetallesGrupos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gru-detalles-grupos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
		<?php echo $form->error($model,'id_alumno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_grupo'); ?>
		<?php echo $form->textField($model,'id_grupo'); ?>
		<?php echo $form->error($model,'id_grupo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->