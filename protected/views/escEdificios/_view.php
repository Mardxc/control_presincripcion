<?php
/* @var $this EscEdificiosController */
/* @var $data EscEdificios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_edificio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_edificio), array('view', 'id'=>$data->id_edificio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->id_institucion); ?>
	<br />


</div>