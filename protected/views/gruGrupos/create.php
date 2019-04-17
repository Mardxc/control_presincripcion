<?php
/* @var $this GruGruposController */
/* @var $model GruGrupos */

$this->breadcrumbs=array(
	'Gru Gruposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GruGrupos', 'url'=>array('index')),
	array('label'=>'Manage GruGrupos', 'url'=>array('admin')),
);
?>

<h1>Create GruGrupos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>