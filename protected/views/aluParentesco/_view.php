<?php
/* @var $this AluParentescoController */
/* @var $data AluParentesco */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parentesco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parentesco), array('view', 'id'=>$data->id_parentesco)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentesco')); ?>:</b>
	<?php echo CHtml::encode($data->parentesco); ?>
	<br />


</div>