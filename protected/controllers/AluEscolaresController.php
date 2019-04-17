<?php

class AluEscolaresController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ListarEscuelas','Guardar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionGuardar(){
		$id_alumno=$_POST['id_alumno'];
		$accion=$_POST['guarda'];

		

		$promedio=$_POST['promedio'];
		$bachillerato=$_POST['bachillerato'];
		$especialidad=$_POST['especialidad'];
		$tipo_bachillerato=$_POST['tipo_bachillerato'];
		$id_escuela=AluEscolares::getIdEscuela($_POST['escuela']);



		$datos=array(
			'promedio'=>$promedio,
			'bachillerato'=>$bachillerato,
			'especialidad'=>$especialidad,
			'tipo_bachillerato'=>$tipo_bachillerato,
			'escuela'=>$_POST['escuela']
		);
		/* Save */
		if($accion=='guardar'){

			$escolares=new AluEscolares;

				$escolares->promedio			=	$promedio;
				$escolares->id_bachillerato		=	$bachillerato;
				$escolares->id_especialidad		=	$especialidad;
				$escolares->id_tipo_bachillerato=	$tipo_bachillerato;
				$escolares->id_escuela			=	$id_escuela;
				$escolares->id_alumno 			= 	$id_alumno;

			$escolares->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_tutor'=>0,
				'datos'=>$datos
				))
			;

		/* Update */
		}elseif ($accion=='actualizar') {
			
			$escolares = AluEscolares::model()->findByAttributes(array('id_alumno'=>$id_alumno));

				$escolares->promedio			=	$promedio;
				$escolares->id_bachillerato		=	$bachillerato;
				$escolares->id_especialidad		=	$especialidad;
				$escolares->id_tipo_bachillerato=	$tipo_bachillerato;
				$escolares->id_escuela			=	$id_escuela;
				$escolares->id_alumno 			= 	$id_alumno;

			$escolares->SaveAttributes(array(
				'promedio',
				'id_bachillerato',
				'id_especialidad',
				'id_tipo_bachillerato',
				'id_escuela',
				'id_alumno'
				)
			);
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_escolar'=>$escolares['id_escolar'],
				'datos'=>$datos
				)
			);
			
		}

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AluEscolares;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluEscolares']))
		{
			$model->attributes=$_POST['AluEscolares'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluEscolares']))
		{
			$model->attributes=$_POST['AluEscolares'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AluEscolares');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AluEscolares('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AluEscolares']))
			$model->attributes=$_GET['AluEscolares'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=AluEscolares::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-escolares-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionListarEscuelas($term){
		/*$sql="select 
				s.id_subdepartamento,
				s.subdepartamento
			from	
				tbl_subdepartamentos s INNER JOIN tbl_departamentos d
				on s.id_departamento=d.id_departamento INNER JOIN
				tbl_personas p on p.id_persona=d.id_persona INNER JOIN
				tbl_usuarios u on u.id_persona=p.id_persona
			WHERE
				u.id_usuario=".Yii::app()->user->id."
			order by
				s.subdepartamento asc";

		$data=Subdepartamentos::model()->findAllBySql($sql);*/

		$criteria=new CDbCriteria;
		$criteria->condition="LOWER(nombre) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=BasEscuelas::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->id_escuela,
				'value'=>$item->nombre,
				'label'=>$item->nombre,
			);
		}

		echo CJSON::encode($arr);
	}
}
