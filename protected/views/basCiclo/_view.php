<?php
/* @var $this BasCicloController */
/* @var $data BasCiclo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ciclo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ciclo), array('view', 'id'=>$data->id_ciclo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->ciclo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />


</div>