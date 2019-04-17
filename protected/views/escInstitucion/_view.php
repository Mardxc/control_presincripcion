<?php
/* @var $this EscInstitucionController */
/* @var $data EscInstitucion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_institucion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_institucion), array('view', 'id'=>$data->id_institucion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('director')); ?>:</b>
	<?php echo CHtml::encode($data->director); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subdirector')); ?>:</b>
	<?php echo CHtml::encode($data->subdirector); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_MUN')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_MUN); ?>
	<br />

	*/ ?>

</div>