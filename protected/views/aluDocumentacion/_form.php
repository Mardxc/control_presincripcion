<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'alu-documentacion-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'constancia_estudios'); ?>
		<?php echo $form->textField($model,'constancia_estudios'); ?>
		<?php echo $form->error($model,'constancia_estudios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'constancia_bachillerato'); ?>
		<?php echo $form->textField($model,'constancia_bachillerato'); ?>
		<?php echo $form->error($model,'constancia_bachillerato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acta_nacimiento'); ?>
		<?php echo $form->textField($model,'acta_nacimiento'); ?>
		<?php echo $form->error($model,'acta_nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fotografias'); ?>
		<?php echo $form->textField($model,'fotografias'); ?>
		<?php echo $form->error($model,'fotografias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carta_aceptado'); ?>
		<?php echo $form->textField($model,'carta_aceptado'); ?>
		<?php echo $form->error($model,'carta_aceptado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->