
<script>
	$(document).ready(function(){
		$("#periodo").prop("disabled",true);
		//$("#aula").prop("disabled",true);
		$("#confirmar").css("display",'none');
	});
	function actualizaPeriodo(){
		var id_periodo=$('#periodo').val();
		$("#periodo").prop("disabled",false);
		$('#GruExamen_id_periodo').val(id_periodo);
	}

	function validaExamen(){


		var id_periodo= $('#GruExamen_id_periodo').val();
		var oportunidad= $('#GruExamen_oportunidad').val();


		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/ValidaExamen'),
		    'data'=> array(
		        'id_periodo'=>'js:id_periodo',
		        'oportunidad'=>'js:oportunidad',
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
		    	//Cero sin coincidencias
		    	if(data.status==0){
					$('#mensaje_validacion').css('display','none');
					$('#confirmar').css('display','block');
					$('#validaExamen').css('display','none');
		    	}else{
		    		$('#mensaje_validacion').css('display','block');
		    	}
		    	
				$('#mensaje_validacion').html(data.mensaje);
		    }"
		))
		?>;
		return false; 
	}
	function fijarDatos(){
		var ciclo=$('#nombre_ciclo').val();
		var id_periodo=$('#GruExamen_id_periodo').val();

		$('#ciclo option').each(function(){
			if ($(this).text() == ciclo)
				$(this).attr('selected','selected');
		});

		<?php echo CHtml::ajax(array(
		   	'url'=>array('gruExamen/obtienePeriodos'),
		    'data'=> array(
		        'id_periodo'=>'js:id_periodo'
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
		    	$('#periodo').prop('disabled',false);
                $('#periodo').empty();
				

				$.each(data.periodos, function(value,key) {
				$('#periodo').append($('<option></option>')
					.attr('value', value).text(key));
				});
				
				$('#periodo option').each(function(){
				  if ($(this).text() == data.periodo)
				    $(this).attr('selected','selected');
				});
		    }"
		))
		?>;
		return false; 
	}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gru-examen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger" >Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oportunidad'); ?>
		<?php echo $form->dropDownList($model,'oportunidad',gruExamen::getOportunidad(),array('width'=>400)); ?>
		<?php echo $form->error($model,'oportunidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horario'); ?>
		<?php echo $form->textField($model,'horario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'horario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha,
		 		'dateFormat'=>'dd/mm/yy',
		 		'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.gif',
		 		'buttonImageOnly'=>true,
		 		'buttonText'=>'Fecha',
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
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_examen'); ?>
		<?php echo $form->textField($model,'tipo_examen',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo_examen'); ?>
	</div>

	<div class="row">
			<?php echo $form->labelEx($model,'ciclo'); ?>

			<br>
			<?php echo CHtml::dropDownList('ciclo', 'ciclo', GruExamen::getListCiclos(),
			        array(
			            'ajax' => array(
			            'type' => 'POST',
			            'url' => CController::createUrl('gruExamen/dynamicPeriodos'),
			            'update' => '#periodo',
			            'data'=>array('ciclo'=>'js:this.value'), 
			            'beforeSend' => 'function(){
			                $("#periodo").prop("disabled",false);
			                $("#periodo").find("option").remove();
			                            }',   
			            ),'prompt' => 'Seleccione un ciclo...'
			        )
			); ?>
	</div>

	<div class="row">
			<?php echo $form->labelEx($model,'id_periodo'); ?>
			<?php echo $form->textField($model,'id_periodo',array('style'=>'display:none;',
			'value'=>$retVal = ($model->id_periodo!='') ? $model->id_periodo : '' )); ?>
			<?php
				echo CHtml::dropDownList('periodo', 
					'periodo', 		
					array('opcion'=>'Selecciona un periodo'),
					array('onchange'=>'actualizaPeriodo()'));
			?>
			<?php echo $form->error($model,'id_periodo'); ?>
	</div>	

	<?php 
		if($model->id_periodo!=''){ 
			?>
			<input type="text" id="nombre_ciclo" style="display:none;" 
			value="<?php echo gruExamen::getNameCicloPeriodo($model->id_periodo);?>">
			
			<script>
				fijarDatos();	
			</script>
		<?php

		}
	?>

	<div class="alert alert-danger" style="text-align:center;display:none;" id='mensaje_validacion'></div>
	<a class="btn btn-success" id="validaExamen" onclick="validaExamen()">Valida Examen</a>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas','id'=>'confirmar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->