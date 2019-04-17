<?php
/* @var $this SysProcesosController */
/* @var $model SysProcesos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sys-procesos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proceso'); ?>
		<?php echo $form->textField($model,'proceso',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'proceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'etiqueta'); ?>
		<?php echo $form->textField($model,'etiqueta',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'etiqueta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_modulo'); ?>
		<br>
		<?php echo $form->textField($model,'id_modulo',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_modulo!='') {
				$id_modulo=$model->id_modulo;
				$modulo=SysProcesos::getNameModulo($id_modulo);
				$value=$modulo;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'modulo',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarModulos'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#SysProcesos_id_modulo").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_modulo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->