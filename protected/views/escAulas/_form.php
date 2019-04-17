<?php
/* @var $this EscAulasController */
/* @var $model EscAulas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'esc-aulas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'aula'); ?>
		<?php echo $form->textField($model,'aula',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'aula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_edificio'); ?>
		<br>
		<?php echo $form->textField($model,'id_edificio',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_edificio!='') {
				$id_edificio=$model->id_edificio;
				$edificio=escAulas::getNameEdificio($id_edificio);
				$value=$edificio;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'ciclo',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarEdificios'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#EscAulas_id_edificio").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_edificio'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->