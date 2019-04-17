<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'localidades-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CVE_ENT'); ?>
		<?php echo $form->textField($model,'CVE_ENT',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'CVE_ENT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CVE_MUN'); ?>
		<?php echo $form->textField($model,'CVE_MUN',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'CVE_MUN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CVE_LOC'); ?>
		<?php echo $form->textField($model,'CVE_LOC',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'CVE_LOC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOM_LOC'); ?>
		<?php echo $form->textField($model,'NOM_LOC',array('size'=>60,'maxlength'=>110)); ?>
		<?php echo $form->error($model,'NOM_LOC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AMBITO'); ?>
		<?php echo $form->textField($model,'AMBITO',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'AMBITO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->