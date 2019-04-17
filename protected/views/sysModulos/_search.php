<?php
/* @var $this SysModulosController */
/* @var $model SysModulos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_modulo'); ?>
		<?php echo $form->textField($model,'id_modulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modulo'); ?>
		<?php echo $form->textField($model,'modulo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->