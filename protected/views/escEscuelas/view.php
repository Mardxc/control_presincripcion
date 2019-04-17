<?php
/* @var $this EscEscuelasController */
/* @var $model EscEscuelas */

$this->breadcrumbs=array(
	'Esc Escuelases'=>array('index'),
	$model->id_escuela,
);

$this->menu=array(
	array('label'=>'List EscEscuelas', 'url'=>array('index')),
	array('label'=>'Create EscEscuelas', 'url'=>array('create')),
	array('label'=>'Update EscEscuelas', 'url'=>array('update', 'id'=>$model->id_escuela)),
	array('label'=>'Delete EscEscuelas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_escuela),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscEscuelas', 'url'=>array('admin')),
);
?>

<h1>View EscEscuelas #<?php echo $model->id_escuela; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_escuela',
		'nombre',
		'calle',
		'num',
		'telefono',
		'email',
		'CVE_MUN',
	),
)); ?>
