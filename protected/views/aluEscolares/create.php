<?php
/* @var $this AluEscolaresController */
/* @var $model AluEscolares */

$this->breadcrumbs=array(
	'Alu Escolares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluEscolares', 'url'=>array('index')),
	array('label'=>'Manage AluEscolares', 'url'=>array('admin')),
);
?>

<?php 
echo CHtml::link('','index.php?r=AluEscolares/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Documentacion',
		'style'=>'left:100%;
    		font-size: 2.0em;'
    )
);
?>


<h1>Crear Escolares</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>