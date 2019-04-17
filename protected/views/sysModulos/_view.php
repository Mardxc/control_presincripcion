<?php
/* @var $this SysModulosController */
/* @var $data SysModulos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_modulo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_modulo), array('view', 'id'=>$data->id_modulo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modulo')); ?>:</b>
	<?php echo CHtml::encode($data->modulo); ?>
	<br />


</div>