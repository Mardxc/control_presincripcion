<?php
/* @var $this AluEspecialidadController */
/* @var $model AluEspecialidad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_especialidad'); ?>
		<?php echo $form->textField($model,'id_especialidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especialidad'); ?>
		<?php echo $form->textField($model,'especialidad',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->