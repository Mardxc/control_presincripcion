<?php
/* @var $this AluEconomicosController */
/* @var $model AluEconomicos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-economicos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'depende'); ?>
		<?php echo $form->textField($model,'depende',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'depende'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sueldo_mensual'); ?>
		<?php echo $form->textField($model,'sueldo_mensual',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sueldo_mensual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_dependientes'); ?>
		<?php echo $form->textField($model,'numero_dependientes'); ?>
		<?php echo $form->error($model,'numero_dependientes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa_trabajo'); ?>
		<?php echo $form->textField($model,'empresa_trabajo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'empresa_trabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'turno_trabajo'); ?>
		<?php echo $form->textField($model,'turno_trabajo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'turno_trabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'puesto_trabajo'); ?>
		<?php echo $form->textField($model,'puesto_trabajo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'puesto_trabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'antigüedad'); ?>
		<?php echo $form->textField($model,'antigüedad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'antigüedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_jefe_inmediato'); ?>
		<?php echo $form->textField($model,'nombre_jefe_inmediato',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nombre_jefe_inmediato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'turno_escuela'); ?>
		<?php echo $form->textField($model,'turno_escuela',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'turno_escuela'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_alumno'); ?>
		<?php echo $form->textField($model,'id_alumno'); ?>
		<?php echo $form->error($model,'id_alumno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->