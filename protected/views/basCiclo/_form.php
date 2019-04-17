
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-ciclo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ciclo'); ?>
		<?php echo $form->textField($model,'ciclo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ciclo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_inicio',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_inicio),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_inicio,
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
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_fin',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_fin),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_fin,
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
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<a class="btn btn-success" id="valida" onclick="validaFechas()">Validar Fechas</a>

	<div id="mensaje_fechas" align="center" class="alert alert-danger" style="display:none;"></div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas',
															'id'=>'completar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	function validaFechas(){
		
		var fecha_inicio=$('#BasCiclo_fecha_inicio').val();
		var fecha_fin=$('#BasCiclo_fecha_fin').val();
	
		if(fecha_inicio=='' || fecha_fin==''){
			alert('Para realizar la validacion de las fechas seleccionelas!!!')
		}else{
			<?php echo CHtml::ajax(array(
			    'url'=>array('basCiclo/ValidaFechas'),
			    'data'=> array(
			        'fecha_inicio'=>'js:fecha_inicio',
			        'fecha_fin'=>"js:fecha_fin"
			    ),
			  	'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	
			    	$('#mensaje_fechas').css('display','block');
			    	$('#mensaje_fechas').css('font-weight','bold');				
				    if(data.status==1){
				    	$('#completar').css('display','block');
						$('#mensaje_fechas').html('LAS FECHAS SE SELECCIONARON CORRECTAMENTE');
						$('#valida').css('display','none');
				    }else{
						$('#mensaje_fechas').html('VERIFIQUE QUE LA FECHA DE FIN SE MAYOR A LA DE INICIO');
				    }
			    } "
			))
			?>;
			return false; 		
		}
	}
	$(document).ready(function(){
		$('#completar').css('display','none');
	});
</script>