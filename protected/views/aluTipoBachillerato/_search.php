<?php
/* @var $this AluTipoBachilleratoController */
/* @var $model AluTipoBachillerato */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_bachillerato'); ?>
		<?php echo $form->textField($model,'id_tipo_bachillerato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_bachillerato'); ?>
		<?php echo $form->textField($model,'tipo_bachillerato',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->