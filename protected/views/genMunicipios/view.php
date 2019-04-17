<?php
/* @var $this GenMunicipiosController */
/* @var $model GenMunicipios */

$this->breadcrumbs=array(
	'Gen Municipioses'=>array('index'),
	$model->ID_MUN,
);

$this->menu=array(
	array('label'=>'List GenMunicipios', 'url'=>array('index')),
	array('label'=>'Create GenMunicipios', 'url'=>array('create')),
	array('label'=>'Update GenMunicipios', 'url'=>array('update', 'id'=>$model->ID_MUN)),
	array('label'=>'Delete GenMunicipios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_MUN),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GenMunicipios', 'url'=>array('admin')),
);
?>

<h1>View GenMunicipios #<?php echo $model->ID_MUN; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CVE_ENT',
		'CVE_MUN',
		'NOM_MUN',
		'ID_MUN',
	),
)); ?>
