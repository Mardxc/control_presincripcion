<?php

class AluMedicoController extends Controller
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
				'actions'=>array('create','update','Guardar'),
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

		$tipo_sangre=$_POST['tipo_sangre'];
		$discapacidad=$_POST['discapacidad'];

		$nss=$_POST['nss'];
		//$esquema_vacunacion=AluMedico::trueOrFalse($_POST['esquema_vacunacion']);
		$esquema_vacunacion=$_POST['esquema_vacunacion'];
		$alergia_medicamento=$_POST['alergia_medicamento'];
		$enfermedades_importantes=$_POST['enfermedades_importantes'];

		$datos=array(
			'tipo_sangre'=>$tipo_sangre,
			'discapacidad'=>$discapacidad,

			'nss'=>$nss,
			'esquema_vacunacion'=>$esquema_vacunacion,
			'alergia_medicamento'=>$alergia_medicamento,
			'enfermedades_importantes'=>$enfermedades_importantes,
		);
		/* Save */
		if($accion=='guardar'){

			$medicos=new AluMedico;

				$medicos->tipo_sangre			=	$tipo_sangre;
				$medicos->discapacidad 			= 	$discapacidad;

				$medicos->nss					=	$nss;
				$medicos->esquema_vacunacion 	= 	$esquema_vacunacion;
				$medicos->alergia_medicamento 	= 	$alergia_medicamento;
				$medicos->enfermedades_importantes 	= 	$enfermedades_importantes;

				$medicos->id_alumno 			= 	$id_alumno;

			$medicos->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_medico'=>0,
				'datos'=>$datos
				))
			;

		/* Update */
		}elseif ($accion=='actualizar') {
			
			$medicos = AluMedico::model()->findByAttributes(array('id_alumno'=>$id_alumno));

				$medicos->tipo_sangre			=	$tipo_sangre;
				$medicos->discapacidad 			= 	$discapacidad;

				$medicos->nss					=	$nss;
				$medicos->esquema_vacunacion 	= 	$esquema_vacunacion;
				$medicos->alergia_medicamento 	= 	$alergia_medicamento;
				$medicos->enfermedades_importantes 	= 	$enfermedades_importantes;

				$medicos->id_alumno 			= 	$id_alumno;

			$medicos->SaveAttributes(array(
				'tipo_sangre',
				'discapacidad',

				'nss',
				'esquema_vacunacion',
				'alergia_medicamento',
				'enfermedades_importantes',

				'id_alumno'
				)
			);
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_medico'=>$medicos['id_medico'],
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
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AluMedico;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluMedico']))
		{
			$model->attributes=$_POST['AluMedico'];
			if($model->save())
				$this->redirect(array('admin',));
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

		if(isset($_POST['AluMedico']))
		{
			$model->attributes=$_POST['AluMedico'];
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
		$dataProvider=new CActiveDataProvider('AluMedico');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AluMedico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AluMedico']))
			$model->attributes=$_GET['AluMedico'];

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
		$model=AluMedico::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-medico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
