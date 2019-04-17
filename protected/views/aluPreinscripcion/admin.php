<?php
/* @var $this AluPreinscripcionController */
/* @var $model AluPreinscripcion */

$this->breadcrumbs=array(
	'Alu Preinscripcions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AluPreinscripcion', 'url'=>array('index')),
	array('label'=>'Create AluPreinscripcion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('alu-preinscripcion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Alu Preinscripcions</h1>

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
	'id'=>'alu-preinscripcion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_aspirante',
		'folio_aspirante',
		'folio_exani',
		'fecha',
		'id_alumno',
		'id_carrera',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
