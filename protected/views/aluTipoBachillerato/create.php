<?php
/* @var $this AluTipoBachilleratoController */
/* @var $model AluTipoBachillerato */

$this->breadcrumbs=array(
	'Alu Tipo Bachilleratos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluTipoBachillerato', 'url'=>array('index')),
	array('label'=>'Manage AluTipoBachillerato', 'url'=>array('admin')),
);
?>

<h1>Create AluTipoBachillerato</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>