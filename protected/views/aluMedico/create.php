<?php
/* @var $this AluMedicoController */
/* @var $model AluMedico */

$this->breadcrumbs=array(
	'Alu Medicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluMedico', 'url'=>array('index')),
	array('label'=>'Manage AluMedico', 'url'=>array('admin')),
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


<h1>Create Datos Médicos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>