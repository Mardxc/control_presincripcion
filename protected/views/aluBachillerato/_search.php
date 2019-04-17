<?php
/* @var $this AluBachilleratoController */
/* @var $model AluBachillerato */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_bachillerato'); ?>
		<?php echo $form->textField($model,'id_bachillerato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bachillerato'); ?>
		<?php echo $form->textField($model,'bachillerato',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->