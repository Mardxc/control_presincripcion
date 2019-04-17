<?php
/* @var $this AluTutorController */
/* @var $data AluTutor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tutor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tutor), array('view', 'id'=>$data->id_tutor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ape_pat')); ?>:</b>
	<?php echo CHtml::encode($data->ape_pat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ape_mat')); ?>:</b>
	<?php echo CHtml::encode($data->ape_mat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parentesco')); ?>:</b>
	<?php echo CHtml::encode($data->id_parentesco); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	*/ ?>

</div>