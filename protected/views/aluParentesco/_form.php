<?php
/* @var $this AluParentescoController */
/* @var $model AluParentesco */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-parentesco-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parentesco'); ?>
		<?php echo $form->textField($model,'parentesco',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parentesco'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->