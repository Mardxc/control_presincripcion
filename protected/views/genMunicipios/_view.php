<?php
/* @var $this GenMunicipiosController */
/* @var $data GenMunicipios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_MUN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_MUN), array('view', 'id'=>$data->ID_MUN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_ENT')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_ENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CVE_MUN')); ?>:</b>
	<?php echo CHtml::encode($data->CVE_MUN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOM_MUN')); ?>:</b>
	<?php echo CHtml::encode($data->NOM_MUN); ?>
	<br />


</div>