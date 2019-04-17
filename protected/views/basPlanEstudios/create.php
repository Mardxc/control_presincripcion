<?php
/* @var $this BasPlanEstudiosController */
/* @var $model BasPlanEstudios */

$this->breadcrumbs=array(
	'Bas Plan Estudioses'=>array('index'),
	'Create',
);

?>
<?php /*
echo CHtml::link('','index.php?r=BasPlanEstudios/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Plan',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>

 <a href="index.php?r=BasPlanEstudios/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<h1>Crear Plan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>