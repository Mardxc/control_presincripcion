<?php
/* @var $this AluMedicoController */
/* @var $data AluMedico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_medico), array('view', 'id'=>$data->id_medico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sangre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />


</div>