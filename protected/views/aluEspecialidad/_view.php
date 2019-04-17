<?php
/* @var $this AluEspecialidadController */
/* @var $data AluEspecialidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_especialidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_especialidad), array('view', 'id'=>$data->id_especialidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especialidad')); ?>:</b>
	<?php echo CHtml::encode($data->especialidad); ?>
	<br />


</div>