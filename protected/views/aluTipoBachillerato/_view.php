<?php
/* @var $this AluTipoBachilleratoController */
/* @var $data AluTipoBachillerato */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_bachillerato')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_bachillerato), array('view', 'id'=>$data->id_tipo_bachillerato)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_bachillerato')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_bachillerato); ?>
	<br />


</div>