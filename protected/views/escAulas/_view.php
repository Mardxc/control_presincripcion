<?php
/* @var $this EscAulasController */
/* @var $data EscAulas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_aula), array('view', 'id'=>$data->id_aula)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aula')); ?>:</b>
	<?php echo CHtml::encode($data->aula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_edificio')); ?>:</b>
	<?php echo CHtml::encode($data->id_edificio); ?>
	<br />


</div>