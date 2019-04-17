<script>
	function determinaSexo(){
		var curp= $('#AluAlumno_curp').val();
		var sexo=curp.substring(10,11);


		if(curp.length<11){
			alert('Verifique que la longitud de la CURP sea la correcta');
			$('#AluAlumno_curp').focus();
		}else{
			if(sexo=='H')
				$('#AluAlumno_sexo').val('M');
			else
				$('#AluAlumno_sexo').val('F');
		}

		
	}
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alu-alumno-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	


	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array(
		'size'=>45,'maxlength'=>45,
		'style'=>'width: 40%',
		)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ape_pat'); ?>
		<?php echo $form->textField($model,'ape_pat',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ape_pat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ape_mat'); ?>
		<?php echo $form->textField($model,'ape_mat',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ape_mat'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'curp'); ?>
		<?php echo $form->textField($model,'curp',array('size'=>20,'maxlength'=>20,'onblur'=>'determinaSexo()')); ?>
		<?php echo $form->error($model,'curp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<?php echo $form->textField($model,'sexo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sexo'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array(
		'size'=>60,'maxlength'=>70,
		'style'=>'width: 30%',
		)); ?>
		<?php echo $form->error($model,'correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_nac'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_nac',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_nac),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_nac,
		 		'dateFormat'=>'dd/mm/yy',
		 		'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.gif',
		 		'buttonImageOnly'=>true,
		 		'buttonText'=>'Fecha',
		 		 'yearRange'=>'1970:2099',
		 		'selectOtherMonths'=>true,
		 		'showAnim'=>'slide',
		 		'showButtonPanel'=>true,
		 		'showOn'=>'button',
		 		'showOtherMonths'=>true,
		 		'changeMonth' => true,
		 		'changeYear' => true,
		 		),
		 	));
	 	?>
		<?php echo $form->error($model,'fecha_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lugar_nac'); ?>
		<?php echo $form->textField($model,'lugar_nac',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lugar_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textField($model,'cp',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_civil'); ?>
		<?php echo $form->dropDownList($model,'estado_civil',aluAlumno::getEstado(),array('width'=>400)); ?>
		<?php echo $form->error($model,'estado_civil'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'ID_MUN'); ?>
		<br>
		<?php echo $form->textField($model,'ID_MUN',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->ID_MUN!='') {
				$ID_MUN=$model->ID_MUN;
				$municipio=AluAlumno::getNameMunicipio($ID_MUN);
				$value=$municipio;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'municipio',
				'model'=>$model,
				'value'=>$value,
				'htmlOptions'=> array('style'=>'width:27%'),
				'sourceUrl'=>$this->createUrl('ListarMunicipios'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#AluAlumno_ID_MUN").val(ui.item["id"]);
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
				$localidad=AluAlumno::getNameLocalidad($ID_LOC);
				$value=$localidad;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'localidad',
				'model'=>$model,
				'value'=>$value,
				'htmlOptions'=> array('style'=>'width:27%'),
				'sourceUrl'=>$this->createUrl('ListarLocalidades'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#AluAlumno_ID_LOC").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'ID_LOC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia',array('size'=>45,'maxlength'=>45,'style'=>'width:27%')); ?>
		<?php echo $form->error($model,'colonia'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->