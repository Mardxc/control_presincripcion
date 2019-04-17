<?php

class GruExamenAlumnoController extends Controller
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
				'actions'=>array('create','update','guardar'),
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

		$folio_ceneval=$_POST['folio_ceneval'];
		$version=$_POST['version'];

		$datos=array(
			'folio_ceneval'=>$folio_ceneval,
			'version'=>$version
		);

		if($accion=='guardar'){

			$ExamenAlumno=new GruExamenAlumno;
				$ExamenAlumno->folio_ceneval		=	$folio_ceneval;
				$ExamenAlumno->version				=	$version;
				$ExamenAlumno->id_alumno 			= 	$id_alumno;
			$ExamenAlumno->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_gru_examen_alumno'=>0,
				'datos'=>$datos
			));
		}elseif ($accion=='actualizar') {
			
			$ExamenAlumno = GruExamenAlumno::model()->findByAttributes(array('id_alumno'=>$id_alumno));
				$ExamenAlumno->folio_ceneval			=	$folio_ceneval;
				$ExamenAlumno->version					=	$version;
				$ExamenAlumno->id_alumno 				= 	$id_alumno;
			$ExamenAlumno->SaveAttributes(array(
				'folio_ceneval',
				'version',
				'id_alumno'
			));
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_gru_examen_alumno'=>$ExamenAlumno['id_gru_examen_alumno'],
				'datos'=>$datos
				)
			);
			
		}

	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GruExamenAlumno;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GruExamenAlumno']))
		{
			$model->attributes=$_POST['GruExamenAlumno'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_gru_examen_alumno));
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

		if(isset($_POST['GruExamenAlumno']))
		{
			$model->attributes=$_POST['GruExamenAlumno'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_gru_examen_alumno));
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
		$dataProvider=new CActiveDataProvider('GruExamenAlumno');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GruExamenAlumno('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GruExamenAlumno']))
			$model->attributes=$_GET['GruExamenAlumno'];

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
		$model=GruExamenAlumno::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gru-examen-alumno-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
