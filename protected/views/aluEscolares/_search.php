<?php
/* @var $this AluEscolaresController */
/* @var $model AluEscolares */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_escolar'); ?>
		<?php echo $form->textField($model,'id_escolar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promedio'); ?>
		<?php echo $form->textField($model,'promedio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bachillerato'); ?>
		<?php echo $form->textField($model,'bachillerato',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especialidad'); ?>
		<?php echo $form->textField($model,'especialidad',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_bachillerato'); ?>
		<?php echo $form->textField($model,'tipo_bachillerato',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_escuela'); ?>
		<?php echo $form->textField($model,'id_escuela'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->