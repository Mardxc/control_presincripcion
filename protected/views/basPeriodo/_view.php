<?php
/* @var $this BasPeriodoController */
/* @var $data BasPeriodo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_periodo), array('view', 'id'=>$data->id_periodo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodo')); ?>:</b>
	<?php echo CHtml::encode($data->periodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->id_ciclo); ?>
	<br />


</div>