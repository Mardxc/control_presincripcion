<?php
/* @var $this GenMunicipiosController */
/* @var $model GenMunicipios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gen-municipios-form',
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
		<?php echo $form->labelEx($model,'NOM_MUN'); ?>
		<?php echo $form->textField($model,'NOM_MUN',array('size'=>60,'maxlength'=>110)); ?>
		<?php echo $form->error($model,'NOM_MUN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->