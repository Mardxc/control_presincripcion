<?php
/* @var $this GenMunicipiosController */
/* @var $model GenMunicipios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'CVE_ENT'); ?>
		<?php echo $form->textField($model,'CVE_ENT',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CVE_MUN'); ?>
		<?php echo $form->textField($model,'CVE_MUN',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOM_MUN'); ?>
		<?php echo $form->textField($model,'NOM_MUN',array('size'=>60,'maxlength'=>110)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_MUN'); ?>
		<?php echo $form->textField($model,'ID_MUN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->