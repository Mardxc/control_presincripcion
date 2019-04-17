<?php
/* @var $this InsInscripcionController */
/* @var $data InsInscripcion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inscripcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_inscripcion), array('view', 'id'=>$data->id_inscripcion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_final')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semestre')); ?>:</b>
	<?php echo CHtml::encode($data->semestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_carrera')); ?>:</b>
	<?php echo CHtml::encode($data->id_carrera); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->id_periodo); ?>
	<br />

	*/ ?>

</div>