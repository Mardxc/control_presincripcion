<?php
/* @var $this GruDetallesGruposController */
/* @var $model GruDetallesGrupos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_detalles_grupos'); ?>
		<?php echo $form->textField($model,'id_detalles_grupos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_grupo'); ?>
		<?php echo $form->textField($model,'id_grupo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->