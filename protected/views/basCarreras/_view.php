<?php
/* @var $this BasCarrerasController */
/* @var $data BasCarreras */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_carrera')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_carrera), array('view', 'id'=>$data->id_carrera)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_corto')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_corto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_egreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_egreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_plan')); ?>:</b>
	<?php echo CHtml::encode($data->id_plan); ?>
	<br />


</div>