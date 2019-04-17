<?php
/* @var $this AluEconomicosController */
/* @var $model AluEconomicos */

$this->breadcrumbs=array(
	'Alu Economicoses'=>array('index'),
	$model->id_economico=>array('view','id'=>$model->id_economico),
	'Update',
);

$this->menu=array(
	array('label'=>'List AluEconomicos', 'url'=>array('index')),
	array('label'=>'Create AluEconomicos', 'url'=>array('create')),
	array('label'=>'View AluEconomicos', 'url'=>array('view', 'id'=>$model->id_economico)),
	array('label'=>'Manage AluEconomicos', 'url'=>array('admin')),
);
?>

<h1>Update AluEconomicos <?php echo $model->id_economico; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>