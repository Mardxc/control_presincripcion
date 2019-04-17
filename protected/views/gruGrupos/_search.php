<?php
/* @var $this GruGruposController */
/* @var $model GruGrupos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_grupo'); ?>
		<?php echo $form->textField($model,'id_grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turno'); ?>
		<?php echo $form->textField($model,'turno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cupo_max'); ?>
		<?php echo $form->textField($model,'cupo_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_examen'); ?>
		<?php echo $form->textField($model,'id_examen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->