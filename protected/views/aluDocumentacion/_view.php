<?php
/* @var $this AluDocumentacionController */
/* @var $data AluDocumentacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_documentacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_documentacion), array('view', 'id'=>$data->id_documentacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('constancia_estudios')); ?>:</b>
	<?php echo CHtml::encode($data->constancia_estudios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('constancia_bachillerato')); ?>:</b>
	<?php echo CHtml::encode($data->constancia_bachillerato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acta_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->acta_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fotografias')); ?>:</b>
	<?php echo CHtml::encode($data->fotografias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carta_aceptado')); ?>:</b>
	<?php echo CHtml::encode($data->carta_aceptado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />


</div>