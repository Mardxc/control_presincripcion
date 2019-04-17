<?php
/* @var $this AluEscolaresController */
/* @var $model AluEscolares */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-escolares-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'promedio'); ?>
		<?php echo $form->textField($model,'promedio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'promedio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bachillerato'); ?>
		<?php echo $form->textField($model,'bachillerato',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'bachillerato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'especialidad'); ?>
		<?php echo $form->textField($model,'especialidad',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'especialidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_bachillerato'); ?>
		<?php echo $form->textField($model,'tipo_bachillerato',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tipo_bachillerato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_escuela'); ?>
		<br>
		<?php echo $form->textField($model,'id_escuela',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_escuela!='') {
				$id_escuela=$model->id_escuela;
				$escuela=AluEscolares::getNameEscuela($id_escuela);
				$value=$escuela;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'escuela',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarEscuelas'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#AluEscolares_id_escuela").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_escuela'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->