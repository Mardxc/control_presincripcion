<?php
/* @var $this EscEscuelasController */
/* @var $data EscEscuelas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_escuela')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_escuela), array('view', 'id'=>$data->id_escuela)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calle')); ?>:</b>
	<?php echo CHtml::encode($data->calle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num')); ?>:</b>
	<?php echo CHtml::encode($data->num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_MUN')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_MUN); ?>
	<br />


</div>