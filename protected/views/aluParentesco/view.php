<?php
/* @var $this AluParentescoController */
/* @var $model AluParentesco */

$this->breadcrumbs=array(
	'Alu Parentescos'=>array('index'),
	$model->id_parentesco,
);

$this->menu=array(
	array('label'=>'List AluParentesco', 'url'=>array('index')),
	array('label'=>'Create AluParentesco', 'url'=>array('create')),
	array('label'=>'Update AluParentesco', 'url'=>array('update', 'id'=>$model->id_parentesco)),
	array('label'=>'Delete AluParentesco', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parentesco),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AluParentesco', 'url'=>array('admin')),
);
?>

<h1>View AluParentesco #<?php echo $model->id_parentesco; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_parentesco',
		'parentesco',
	),
)); ?>
