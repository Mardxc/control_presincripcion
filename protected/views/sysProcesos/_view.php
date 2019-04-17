<?php
/* @var $this SysProcesosController */
/* @var $data SysProcesos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proceso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_proceso), array('view', 'id'=>$data->id_proceso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proceso')); ?>:</b>
	<?php echo CHtml::encode($data->proceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etiqueta')); ?>:</b>
	<?php echo CHtml::encode($data->etiqueta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_modulo')); ?>:</b>
	<?php echo CHtml::encode($data->id_modulo); ?>
	<br />


</div>