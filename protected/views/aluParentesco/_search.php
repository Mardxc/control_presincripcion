<?php
/* @var $this AluParentescoController */
/* @var $model AluParentesco */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_parentesco'); ?>
		<?php echo $form->textField($model,'id_parentesco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parentesco'); ?>
		<?php echo $form->textField($model,'parentesco',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->