<?php
/* @var $this AluEscolaresController */
/* @var $model AluEscolares */

$this->breadcrumbs=array(
	'Alu Escolares'=>array('index'),
	$model->id_escolar=>array('view','id'=>$model->id_escolar),
	'Update',
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
<h1>Actualizar Escolares</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>