<?php
/* @var $this EscInstitucionController */
/* @var $model EscInstitucion */

$this->breadcrumbs=array(
	'Esc Institucions'=>array('index'),
	$model->id_institucion,
);

$this->menu=array(
	array('label'=>'List EscInstitucion', 'url'=>array('index')),
	array('label'=>'Create EscInstitucion', 'url'=>array('create')),
	array('label'=>'Update EscInstitucion', 'url'=>array('update', 'id'=>$model->id_institucion)),
	array('label'=>'Delete EscInstitucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_institucion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscInstitucion', 'url'=>array('admin')),
);
?>

<h1>View EscInstitucion #<?php echo $model->id_institucion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_institucion',
		'nombre',
		'direccion',
		'telefono',
		'fax',
		'director',
		'subdirector',
		'logo',
		'CVE_MUN',
	),
)); ?>
