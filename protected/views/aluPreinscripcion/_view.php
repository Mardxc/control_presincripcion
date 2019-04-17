<?php
/* @var $this AluPreinscripcionController */
/* @var $data AluPreinscripcion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aspirante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_aspirante), array('view', 'id'=>$data->id_aspirante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio_aspirante')); ?>:</b>
	<?php echo CHtml::encode($data->folio_aspirante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio_exani')); ?>:</b>
	<?php echo CHtml::encode($data->folio_exani); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_carrera')); ?>:</b>
	<?php echo CHtml::encode($data->id_carrera); ?>
	<br />


</div>