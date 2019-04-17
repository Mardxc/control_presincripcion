<style>
	#EscInstitucion_nombre,#EscInstitucion_direccion,#EscInstitucion_telefono,#EscInstitucion_direccion,
	#EscInstitucion_fax,#EscInstitucion_director,#EscInstitucion_subdirector,#localidad{
		width: 35%;
	}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'esc-institucion-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'director'); ?>
		<?php echo $form->textField($model,'director',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'director'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subdirector'); ?>
		<?php echo $form->textField($model,'subdirector',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'subdirector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_sep'); ?>
		 <?php echo CHtml::activeFileField($model, 'logo_sep'); ?>  
		<?php echo $form->error($model,'logo_sep'); ?>
	</div>
	

	<?php if($model->isNewRecord!='1'){ ?>
		<div class="row">
			<?php echo $model->logo_sep; ?>
			<br>
		    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/protected/images/'.$model->logo_sep,"logo_sep",array("width"=>200)); ?>  
		</div>
	<?php } ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'logo_ins'); ?>
		 <?php echo CHtml::activeFileField($model, 'logo_ins'); ?>  
		<?php echo $form->error($model,'logo_ins'); ?>
	</div>

	<?php if($model->isNewRecord!='1'){ ?>
		<div class="row">
			<?php echo $model->logo_ins; ?>
			<br>
		    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/protected/images/'.$model->logo_ins,"logo_ins",array("width"=>200)); ?>  
		</div>
	<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_inf1'); ?>
		 <?php echo CHtml::activeFileField($model, 'logo_inf1'); ?>  
		<?php echo $form->error($model,'logo_inf1'); ?>
	</div>

	<?php if($model->isNewRecord!='1'){ ?>
		<div class="row">
			<?php echo $model->logo_inf1; ?>
			<br>
		    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/protected/images/'.$model->logo_inf1,"logo_inf1",array("width"=>200)); ?>  
		</div>
	<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_inf2'); ?>
		 <?php echo CHtml::activeFileField($model, 'logo_inf2'); ?>  
		<?php echo $form->error($model,'logo_inf2'); ?>
	</div>

	<?php if($model->isNewRecord!='1'){ ?>
		<div class="row">
			<?php echo $model->logo_inf2; ?>
			<br>
		    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/protected/images/'.$model->logo_inf2,"logo_inf2",array("width"=>200)); ?>  
		</div>
	<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CVE_LOC'); ?>
		<br>
		<?php echo $form->textField($model,'CVE_LOC',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->CVE_LOC!='') {
				$CVE_LOC=$model->CVE_LOC;
				$localidad=AluAlumno::getNameLocalidad($CVE_LOC);
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
						$("#EscInstitucion_CVE_LOC").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'CVE_LOC'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->