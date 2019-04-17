<?php
/* @var $this BasCicloController */
/* @var $model BasCiclo */

$this->breadcrumbs=array(
	'Bas Ciclos'=>array('index'),
	'Create',
);

?>
<a href="index.php?r=basCiclo/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<?php /*
echo CHtml::link('','index.php?r=basCiclo/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Ciclo',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
?>

<h1>Crear Ciclo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>