<?php
/* @var $this AluEscolaresController */
/* @var $data AluEscolares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_escolar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_escolar), array('view', 'id'=>$data->id_escolar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promedio')); ?>:</b>
	<?php echo CHtml::encode($data->promedio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bachillerato')); ?>:</b>
	<?php echo CHtml::encode($data->bachillerato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especialidad')); ?>:</b>
	<?php echo CHtml::encode($data->especialidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_bachillerato')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_bachillerato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_escuela')); ?>:</b>
	<?php echo CHtml::encode($data->id_escuela); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />


</div>