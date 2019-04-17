<?php
/* @var $this AluPreinscripcionController */
/* @var $model AluPreinscripcion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_aspirante'); ?>
		<?php echo $form->textField($model,'id_aspirante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio_aspirante'); ?>
		<?php echo $form->textField($model,'folio_aspirante',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio_exani'); ?>
		<?php echo $form->textField($model,'folio_exani',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
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