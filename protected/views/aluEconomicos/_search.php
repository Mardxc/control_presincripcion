<?php
/* @var $this AluEconomicosController */
/* @var $model AluEconomicos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_economico'); ?>
		<?php echo $form->textField($model,'id_economico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'depende'); ?>
		<?php echo $form->textField($model,'depende',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sueldo_mensual'); ?>
		<?php echo $form->textField($model,'sueldo_mensual',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_dependientes'); ?>
		<?php echo $form->textField($model,'numero_dependientes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa_trabajo'); ?>
		<?php echo $form->textField($model,'empresa_trabajo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turno_trabajo'); ?>
		<?php echo $form->textField($model,'turno_trabajo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puesto_trabajo'); ?>
		<?php echo $form->textField($model,'puesto_trabajo',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'antigüedad'); ?>
		<?php echo $form->textField($model,'antigüedad',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_jefe_inmediato'); ?>
		<?php echo $form->textField($model,'nombre_jefe_inmediato',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turno_escuela'); ?>
		<?php echo $form->textField($model,'turno_escuela',array('size'=>10,'maxlength'=>10)); ?>
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