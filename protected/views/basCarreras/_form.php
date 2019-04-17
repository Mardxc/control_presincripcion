<?php
/* @var $this BasCarrerasController */
/* @var $model BasCarreras */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-carreras-form',
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
		<?php echo $form->labelEx($model,'nombre_corto'); ?>
		<?php echo $form->textField($model,'nombre_corto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nombre_corto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
		
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 	'model'=>$model,
		 	'attribute'=>'fecha_ingreso',
		 	'value'=>CTimestamp::formatDate('dd/mm/yyyy',$model->fecha_ingreso),
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:160px'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$model->fecha_ingreso,
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
		<?php echo $form->error($model,'fecha_ingreso'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'id_plan'); ?>
		<br>
		<?php echo $form->textField($model,'id_plan',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_plan!='') {
				$id_plan=$model->id_plan;
				$plan=BasCarreras::getNamePlan($id_plan);
				$value=$plan;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'plan',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarPlanes'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#BasCarreras_id_plan").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_plan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->