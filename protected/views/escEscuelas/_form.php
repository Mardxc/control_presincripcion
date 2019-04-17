<style>
	#EscEscuelas_nombre{
		width: 35%;
	}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'esc-escuelas-form',
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
		<?php echo $form->labelEx($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'calle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_MUN'); ?>
		<br>
		<?php echo $form->textField($model,'ID_MUN',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->ID_MUN!='') {
				$ID_MUN=$model->ID_MUN;
				$municipio=escEscuelas::getNameMunicipio($ID_MUN);
				$value=$municipio;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'municipio',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarMunicipios'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#EscEscuelas_ID_MUN").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'ID_MUN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_LOC'); ?>
		<br>
		<?php echo $form->textField($model,'ID_LOC',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->ID_LOC!='') {
				$ID_LOC=$model->ID_LOC;
				$localidad=escEscuelas::getNameLocalidad($ID_LOC);
				$value=$localidad;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'localidad',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarLocalidades'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#EscEscuelas_ID_LOC").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'ID_LOC'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->