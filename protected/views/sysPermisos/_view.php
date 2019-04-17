<?php
/* @var $this SysPermisosController */
/* @var $data SysPermisos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_permiso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_permiso), array('view', 'id'=>$data->id_permiso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proceso')); ?>:</b>
	<?php echo CHtml::encode($data->id_proceso); ?>
	<br />


</div>