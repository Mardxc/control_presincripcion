<?php
/* @var $this AluBachilleratoController */
/* @var $data AluBachillerato */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bachillerato')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bachillerato), array('view', 'id'=>$data->id_bachillerato)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bachillerato')); ?>:</b>
	<?php echo CHtml::encode($data->bachillerato); ?>
	<br />


</div>