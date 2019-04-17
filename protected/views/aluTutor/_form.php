<?php
/* @var $this AluTutorController */
/* @var $model AluTutor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-tutor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
<table>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'nombre'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		</td>
		<td>
			<?php echo $form->error($model,'nombre'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'ape_pat'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'ape_pat',array('size'=>45,'maxlength'=>45)); ?>
		</td>
		<td>
			<?php echo $form->error($model,'ape_pat'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'ape_mat'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'ape_mat',array('size'=>45,'maxlength'=>45)); ?>
		</td>
		<td>
			<?php echo $form->error($model,'ape_mat'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'domicilio'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>60)); ?>
		</td>
		<td>
			<?php echo $form->error($model,'domicilio'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'telefono'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		</td>
		<td>
			<?php echo $form->error($model,'telefono'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'id_parentesco'); ?>
			<?php echo $form->textField($model,'id_parentesco',array('style'=>'display:none;')); ?>
		</td>
		<td>
			<?php 
				if ($model->id_parentesco!='') {
					$id_parentesco=$model->id_parentesco;
					$id_parentesco=AluTutor::getNameParentesco($id_parentesco);
					$value=$id_parentesco;
				}else{
					$value='';
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'parentesco',
					'model'=>$model,
					'value'=>$value,
					'sourceUrl'=>$this->createUrl('ListarParentescos'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#Nota_id_parentesco").val(ui.item["id"]);
						}',
					),
				));
			?>
		</td>
		<td>
			<?php echo $form->error($model,'id_parentesco'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Actualizar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
		</td>
	</tr>
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->