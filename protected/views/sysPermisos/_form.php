<?php
/* @var $this SysPermisosController */
/* @var $model SysPermisos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sys-permisos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="label label-danger">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<br>
		<?php echo $form->textField($model,'id_usuario',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_usuario!='') {
				$id_usuario=$model->id_usuario;
				$usuario=SysPermisos::getNameUsuario($id_usuario);
				$value=$usuario;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'usuario',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarUsuarios'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#SysPermisos_id_usuario").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_proceso'); ?>
		<br>
		<?php echo $form->textField($model,'id_proceso',array('style'=>'display:none;')); ?>
	
		<?php 
			if ($model->id_proceso!='') {
				$id_proceso=$model->id_proceso;
				$proceso=SysPermisos::getNameProceso($id_proceso);
				$value=$proceso;
			}else{
				$value='';
			}

			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'proceso',
				'model'=>$model,
				'value'=>$value,
				'sourceUrl'=>$this->createUrl('ListarProcesos'),
				'options'=>array(
					'minLength'=>'1',
					'showAmin'=>'fold',
					'select'=>'js:function(event,ui){
						$("#SysPermisos_id_proceso").val(ui.item["id"]);
					}',
				),
			));
		?>
		<?php echo $form->error($model,'id_proceso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Completar Registro' : 'Guardar', array('class' => 'btn btn-success',
															'title'=>'Competencias Genericas')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->