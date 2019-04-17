<?php
/* @var $this BasNivelesController */
/* @var $model BasNiveles */

$this->breadcrumbs=array(
	'Bas Niveles'=>array('index'),
	$model->id_nivel=>array('view','id'=>$model->id_nivel),
	'Update',
);


?>
<?php /*
echo CHtml::link('Administrar','index.php?r=BasNiveles/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Nivel',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/?>

<a href="index.php?r=BasNiveles/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1>Actualizar Nivel </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>