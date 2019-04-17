<?php
/* @var $this AluEconomicosController */
/* @var $model AluEconomicos */

$this->breadcrumbs=array(
	'Alu Economicoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluEconomicos', 'url'=>array('index')),
	array('label'=>'Manage AluEconomicos', 'url'=>array('admin')),
);
?>

<h1>Create AluEconomicos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>