<?php
/* @var $this LocalidadesController */
/* @var $data Localidades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_ENT')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_ENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_MUN')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_MUN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_LOC')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_LOC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOM_LOC')); ?>:</b>
	<?php echo CHtml::encode($data->NOM_LOC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AMBITO')); ?>:</b>
	<?php echo CHtml::encode($data->AMBITO); ?>
	<br />


</div>