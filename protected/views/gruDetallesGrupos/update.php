<?php
/* @var $this GruDetallesGruposController */
/* @var $model GruDetallesGrupos */

$this->breadcrumbs=array(
	'Gru Detalles Gruposes'=>array('index'),
	$model->id_detalles_grupos=>array('view','id'=>$model->id_detalles_grupos),
	'Update',
);

$this->menu=array(
	array('label'=>'List GruDetallesGrupos', 'url'=>array('index')),
	array('label'=>'Create GruDetallesGrupos', 'url'=>array('create')),
	array('label'=>'View GruDetallesGrupos', 'url'=>array('view', 'id'=>$model->id_detalles_grupos)),
	array('label'=>'Manage GruDetallesGrupos', 'url'=>array('admin')),
);
?>

<h1>Update GruDetallesGrupos <?php echo $model->id_detalles_grupos; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>