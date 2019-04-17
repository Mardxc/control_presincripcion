<?php
/* @var $this SysPermisosController */
/* @var $model SysPermisos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_proceso'); ?>
		<?php echo $form->textField($model,'id_proceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_permiso'); ?>
		<?php echo $form->textField($model,'id_permiso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->