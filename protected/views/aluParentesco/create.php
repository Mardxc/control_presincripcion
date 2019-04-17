<?php
/* @var $this AluParentescoController */
/* @var $model AluParentesco */

$this->breadcrumbs=array(
	'Alu Parentescos'=>array('index'),
	'Create',
);

?>
<a href="index.php?r=aluParentesco/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<?php 
 CHtml::link('Administrar','index.php?r=AluParentesco/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Documentacion',
		'style'=>'left:100%;float:right;
    		font-size: 2.0em;'
    )
);
?>
<h1>Crear Parentesco</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>