<?php
/* @var $this GruGruposController */
/* @var $model GruGrupos */

$this->breadcrumbs=array(
	'Gru Gruposes'=>array('index'),
	$model->id_grupo=>array('view','id'=>$model->id_grupo),
	'Update',
);

$this->menu=array(
	array('label'=>'List GruGrupos', 'url'=>array('index')),
	array('label'=>'Create GruGrupos', 'url'=>array('create')),
	array('label'=>'View GruGrupos', 'url'=>array('view', 'id'=>$model->id_grupo)),
	array('label'=>'Manage GruGrupos', 'url'=>array('admin')),
);
?>

<h1>Update GruGrupos <?php echo $model->id_grupo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>