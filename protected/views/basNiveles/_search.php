<?php
/* @var $this BasNivelesController */
/* @var $model BasNiveles */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_nivel'); ?>
		<?php echo $form->textField($model,'id_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicial'); ?>
		<?php echo $form->textField($model,'fecha_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_final'); ?>
		<?php echo $form->textField($model,'fecha_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grados'); ?>
		<?php echo $form->textField($model,'grados'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grupos'); ?>
		<?php echo $form->textField($model,'grupos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_periodo'); ?>
		<?php echo $form->textField($model,'id_periodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_carrera'); ?>
		<?php echo $form->textField($model,'id_carrera'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->