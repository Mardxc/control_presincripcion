<?php
/* @var $this AluEspecialidadController */
/* @var $model AluEspecialidad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-especialidad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'especialidad'); ?>
		<?php echo $form->textField($model,'especialidad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'especialidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->