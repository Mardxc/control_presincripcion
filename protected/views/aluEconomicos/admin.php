<?php
/* @var $this AluEconomicosController */
/* @var $model AluEconomicos */

$this->breadcrumbs=array(
	'Alu Economicoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AluEconomicos', 'url'=>array('index')),
	array('label'=>'Create AluEconomicos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('alu-economicos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Alu Economicoses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alu-economicos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_economico',
		'depende',
		'sueldo_mensual',
		'numero_dependientes',
		'empresa_trabajo',
		'domicilio',
		/*
		'telefono',
		'turno_trabajo',
		'puesto_trabajo',
		'antigüedad',
		'nombre_jefe_inmediato',
		'turno_escuela',
		'id_alumno',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
