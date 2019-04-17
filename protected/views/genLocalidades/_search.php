<?php
/* @var $this GenLocalidadesController */
/* @var $model GenLocalidades */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CVE_ENT'); ?>
		<?php echo $form->textField($model,'CVE_ENT',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CVE_MUN'); ?>
		<?php echo $form->textField($model,'CVE_MUN',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CVE_LOC'); ?>
		<?php echo $form->textField($model,'CVE_LOC',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOM_LOC'); ?>
		<?php echo $form->textField($model,'NOM_LOC',array('size'=>60,'maxlength'=>110)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AMBITO'); ?>
		<?php echo $form->textField($model,'AMBITO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->