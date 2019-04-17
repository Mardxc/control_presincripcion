<?php
/* @var $this GruGruposController */
/* @var $model GruGrupos */
/* @var $form CActiveForm */
?>
<?php echo $dato; ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gru-grupos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'turno'); ?>
		<?php echo $form->textField($model,'turno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'turno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cupo_max'); ?>
		<?php echo $form->textField($model,'cupo_max'); ?>
		<?php echo $form->error($model,'cupo_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_examen'); ?>
		<?php echo $form->textField($model,'id_examen'); ?>
		<?php echo $form->error($model,'id_examen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->