<?php
/* @var $this GruDetallesGruposController */
/* @var $data GruDetallesGrupos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_detalles_grupos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_detalles_grupos), array('view', 'id'=>$data->id_detalles_grupos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->id_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo')); ?>:</b>
	<?php echo CHtml::encode($data->id_grupo); ?>
	<br />


</div>