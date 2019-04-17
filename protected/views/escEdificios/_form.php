<?php
/* @var $this EscEdificiosController */
/* @var $model EscEdificios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'esc-edificios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_institucion'); ?>
		<br>
		<?php echo $form->textField($model,'id_institucion',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_institucion!='') {
				$id_institucion=$model->id_institucion;
				$institucion=escEdificios::getNameInstitucion($id_institucion);
				$value=$institucion;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'ciclo',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarInstituciones'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#EscEdificios_id_institucion").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_institucion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->