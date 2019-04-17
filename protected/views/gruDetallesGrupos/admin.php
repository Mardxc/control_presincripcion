<?php
/* @var $this GruDetallesGruposController */
/* @var $model GruDetallesGrupos */

$this->breadcrumbs=array(
	'Gru Detalles Gruposes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GruDetallesGrupos', 'url'=>array('index')),
	array('label'=>'Create GruDetallesGrupos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gru-detalles-grupos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gru Detalles Gruposes</h1>

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
	'id'=>'gru-detalles-grupos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_detalles_grupos',
		'id_alumno',
		'id_grupo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
