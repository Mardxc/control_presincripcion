<?php
/* @var $this GruGruposController */
/* @var $data GruGrupos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grupo), array('view', 'id'=>$data->id_grupo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turno')); ?>:</b>
	<?php echo CHtml::encode($data->turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cupo_max')); ?>:</b>
	<?php echo CHtml::encode($data->cupo_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_examen')); ?>:</b>
	<?php echo CHtml::encode($data->id_examen); ?>
	<br />


</div>