<?php
/* @var $this BasPlanEstudiosController */
/* @var $data BasPlanEstudios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_plan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_plan), array('view', 'id'=>$data->id_plan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_estudios')); ?>:</b>
	<?php echo CHtml::encode($data->plan_estudios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_autorizacion')); ?>:</b>
	<?php echo CHtml::encode($data->doc_autorizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditos_optativos')); ?>:</b>
	<?php echo CHtml::encode($data->creditos_optativos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditos_totales')); ?>:</b>
	<?php echo CHtml::encode($data->creditos_totales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reticula')); ?>:</b>
	<?php echo CHtml::encode($data->reticula); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_alta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carga_max_creditos')); ?>:</b>
	<?php echo CHtml::encode($data->carga_max_creditos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carga_min_creditos')); ?>:</b>
	<?php echo CHtml::encode($data->carga_min_creditos); ?>
	<br />

	*/ ?>

</div>