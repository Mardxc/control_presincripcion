<?php
/* @var $this AluPreinscripcionController */
/* @var $model AluPreinscripcion */

$this->breadcrumbs=array(
	'Alu Preinscripcions'=>array('index'),
	$model->id_aspirante,
);

$this->menu=array(
	array('label'=>'List AluPreinscripcion', 'url'=>array('index')),
	array('label'=>'Create AluPreinscripcion', 'url'=>array('create')),
	array('label'=>'Update AluPreinscripcion', 'url'=>array('update', 'id'=>$model->id_aspirante)),
	array('label'=>'Delete AluPreinscripcion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_aspirante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AluPreinscripcion', 'url'=>array('admin')),
);
?>

<h1>View AluPreinscripcion #<?php echo $model->id_aspirante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_aspirante',
		'folio_aspirante',
		'folio_exani',
		'fecha',
		'id_alumno',
		'id_carrera',
	),
)); ?>
