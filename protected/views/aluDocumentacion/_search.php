<?php
/* @var $this AluDocumentacionController */
/* @var $model AluDocumentacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_documentacion'); ?>
		<?php echo $form->textField($model,'id_documentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'constancia_estudios'); ?>
		<?php echo $form->textField($model,'constancia_estudios'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'constancia_bachillerato'); ?>
		<?php echo $form->textField($model,'constancia_bachillerato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acta_nacimiento'); ?>
		<?php echo $form->textField($model,'acta_nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fotografias'); ?>
		<?php echo $form->textField($model,'fotografias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carta_aceptado'); ?>
		<?php echo $form->textField($model,'carta_aceptado'); ?>
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