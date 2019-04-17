<?php
/* @var $this BasNivelesController */
/* @var $data BasNiveles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nivel), array('view', 'id'=>$data->id_nivel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_final')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grados')); ?>:</b>
	<?php echo CHtml::encode($data->grados); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupos')); ?>:</b>
	<?php echo CHtml::encode($data->grupos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->id_periodo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_carrera')); ?>:</b>
	<?php echo CHtml::encode($data->id_carrera); ?>
	<br />

	*/ ?>

</div>