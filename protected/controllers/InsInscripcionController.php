<?php

class InsInscripcionController extends Controller
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
				'actions'=>array('create','update','Guardar','Status','cambiarEstado','delete','ValidaSemestre'),
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

	public function actionValidaSemestre()
	{
		$id_alumno=$_POST['id_alumno'];
		$semestre=$_POST['semestre'];
		$semestreValido=InsInscripcion::getSemestre($id_alumno);

		if ($semestre > $semestreValido && $semestre < ($semestreValido+2)) {
			$status=1;
		}else{
			$status=0;
		}
		echo CJSON::encode(array(
			'status'=>$status
			)
		);
	}

	public function actionGuardar(){

		$id_inscripcion=$_POST['id_inscripcion'];
		$id_alumno=$_POST['id_alumno'];
		$accion=$_POST['guarda'];

		$fecha_inicial=$_POST['fecha_inicial'];
		$fecha_final=$_POST['fecha_final'];
		$semestre=$_POST['semestre'];
		$id_ciclo=$_POST['id_ciclo'];
		$id_carrera=$_POST['id_carrera'];
		$id_periodo=$_POST['id_periodo'];

		$datos=array(

			'fecha_inicial'=>$fecha_inicial,
			'fecha_final'=>$fecha_final,
			'semestre'=>$semestre,
			'id_ciclo'=>$id_ciclo,
			'id_carrera'=>$id_carrera,
			'id_periodo'=>$id_periodo,
		);
		/* Save */
		if($accion=='guardar'){

			$inscripcion=new InsInscripcion;

				$inscripcion->fecha_inicial	=	$fecha_inicial;
				$inscripcion->fecha_final 	= 	$fecha_final;
				$inscripcion->semestre		=	$semestre;
				$inscripcion->id_ciclo 		= 	$id_ciclo;
				$inscripcion->id_carrera 	= 	$id_carrera;
				$inscripcion->id_periodo 	= 	$id_periodo;

				$inscripcion->id_alumno 			= 	$id_alumno;

			$inscripcion->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_inscripcion'=>'',
				'datos'=>$datos
				))
			;
			/*if ($id_inscripcion=='') {
				$this->redirect(array('aluAlumno/detalles&id='.$id_alumno));
			};*/
		/* Update */
		}elseif ($accion=='actualizar') {
			
			$inscripcion = InsInscripcion::model()->findByAttributes(array('id_inscripcion'=>$id_inscripcion));
				$inscripcion->id_inscripcion=	$id_inscripcion;

				$inscripcion->fecha_inicial	=	$fecha_inicial;
				$inscripcion->fecha_final 	= 	$fecha_final;
				$inscripcion->semestre		=	$semestre;
				$inscripcion->id_ciclo 		= 	$id_ciclo;
				$inscripcion->id_carrera 	= 	$id_carrera;
				$inscripcion->id_periodo 	= 	$id_periodo;

				$inscripcion->id_alumno 	= 	$id_alumno;

			$inscripcion->SaveAttributes(array(
				'id_inscripcion',

				'fecha_inicial',
				'fecha_final',
				'semestre',
				'id_ciclo',
				'id_carrera',
				'id_periodo',

				'id_alumno'
				)
			);

			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_inscripcion'=>$inscripcion['id_inscripcion'],
				'datos'=>$datos
				)
			);
			
		}

	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new InsInscripcion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InsInscripcion']))
		{
			$model->attributes=$_POST['InsInscripcion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_inscripcion));
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

		if(isset($_POST['InsInscripcion']))
		{
			$model->attributes=$_POST['InsInscripcion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_inscripcion));
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
	public function actionDelete($id_inscripcion)
	{
		$this->loadModel($id_inscripcion)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('InsInscripcion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new InsInscripcion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['InsInscripcion']))
			$model->attributes=$_GET['InsInscripcion'];

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
		$model=InsInscripcion::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='ins-inscripcion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
