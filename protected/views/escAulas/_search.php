<?php
/* @var $this EscAulasController */
/* @var $model EscAulas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_aula'); ?>
		<?php echo $form->textField($model,'id_aula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aula'); ?>
		<?php echo $form->textField($model,'aula',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_edificio'); ?>
		<?php echo $form->textField($model,'id_edificio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->