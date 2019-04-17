<?php
/* @var $this GruDetallesGruposController */
/* @var $model GruDetallesGrupos */

$this->breadcrumbs=array(
	'Gru Detalles Gruposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GruDetallesGrupos', 'url'=>array('index')),
	array('label'=>'Manage GruDetallesGrupos', 'url'=>array('admin')),
);
?>

<h1>Create GruDetallesGrupos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>