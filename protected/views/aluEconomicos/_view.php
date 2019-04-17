<?php
/* @var $this AluEconomicosController */
/* @var $data AluEconomicos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_economico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_economico), array('view', 'id'=>$data->id_economico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('depende')); ?>:</b>
	<?php echo CHtml::encode($data->depende); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sueldo_mensual')); ?>:</b>
	<?php echo CHtml::encode($data->sueldo_mensual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_dependientes')); ?>:</b>
	<?php echo CHtml::encode($data->numero_dependientes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_trabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('turno_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->turno_trabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puesto_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->puesto_trabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('antigüedad')); ?>:</b>
	<?php echo CHtml::encode($data->antigüedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_jefe_inmediato')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_jefe_inmediato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turno_escuela')); ?>:</b>
	<?php echo CHtml::encode($data->turno_escuela); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	*/ ?>

</div>