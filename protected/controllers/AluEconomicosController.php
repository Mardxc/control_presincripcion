<?php

class AluEconomicosController extends Controller
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
		$id_alumno		=$_POST['id_alumno'];
		$accion			=$_POST['guarda'];

		$id_parentesco 		=$_POST['depende'];
		$sueldo_mensual	=$_POST['sueldo_mensual'];
		$numero_dependientes	=$_POST['numero_dependientes'];
		$empresa_trabajo	=$_POST['empresa_trabajo'];
		$domicilio		=$_POST['domicilio'];
		$telefono		=$_POST['telefono'];
		$turno_trabajo	=$_POST['turno_trabajo'];
		$puesto_trabajo	=$_POST['puesto_trabajo'];
		$antigüedad		=$_POST['antigüedad'];
		$nombre_jefe_inmediato	=$_POST['nombre_jefe_inmediato'];
		$turno_escuela	=$_POST['turno_escuela'];
				
		$datos=array(
			'id_parentesco'=>$_POST['depende'],
			'sueldo_mensual'=>$sueldo_mensual,
			'numero_dependientes'=>$numero_dependientes,
			'empresa_trabajo'=>$empresa_trabajo,
			'telefono'=>$telefono,
			'domicilio'=>$domicilio,
			'turno_trabajo'=>$turno_trabajo,
			'puesto_trabajo'=>$puesto_trabajo,
			'antigüedad'=>$antigüedad,
			'nombre_jefe_inmediato'=>$nombre_jefe_inmediato,
			'turno_escuela'=>$turno_escuela
		);
		/* Save */
		if($accion=='guardar'){

			$economicos=new AluEconomicos;

				$economicos->id_parentesco				=		$id_parentesco;
				$economicos->sueldo_mensual			=		$sueldo_mensual;
				$economicos->numero_dependientes	=		$numero_dependientes;
				$economicos->empresa_trabajo		=		$empresa_trabajo;
				$economicos->telefono				=		$telefono;
				$economicos->domicilio				=		$domicilio;
				$economicos->turno_trabajo			=		$turno_trabajo;
				$economicos->puesto_trabajo			=		$puesto_trabajo;
				$economicos->antigüedad				=		$antigüedad;
				$economicos->nombre_jefe_inmediato	=		$nombre_jefe_inmediato;
				$economicos->turno_escuela			=		$turno_escuela;
				$economicos->id_alumno 				= 		$id_alumno;

			$economicos->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_economico'=>0,
				'datos'=>$datos
				))
			;

		/* Update */
		}elseif ($accion=='actualizar') {

			$economicos = AluEconomicos::model()->findByAttributes(array('id_alumno'=>$id_alumno));

				$economicos->id_parentesco				=		$id_parentesco;
				$economicos->sueldo_mensual			=		$sueldo_mensual;
				$economicos->numero_dependientes	=		$numero_dependientes;
				$economicos->empresa_trabajo		=		$empresa_trabajo;
				$economicos->telefono				=		$telefono;
				$economicos->domicilio				=		$domicilio;
				$economicos->turno_trabajo			=		$turno_trabajo;
				$economicos->puesto_trabajo			=		$puesto_trabajo;
				$economicos->antigüedad				=		$antigüedad;
				$economicos->nombre_jefe_inmediato	=		$nombre_jefe_inmediato;
				$economicos->turno_escuela			=		$turno_escuela;
				$economicos->id_alumno 				= 		$id_alumno;

			$economicos->SaveAttributes(array(
				'id_parentesco',
				'sueldo_mensual',
				'numero_dependientes',
				'empresa_trabajo',
				'telefono',
				'domicilio',
				'turno_trabajo',
				'puesto_trabajo',
				'antigüedad',
				'nombre_jefe_inmediato',
				'turno_escuela'
				)
			);
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_economico'=>$economicos['id_economico'],
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
		$model=new AluEconomicos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluEconomicos']))
		{
			$model->attributes=$_POST['AluEconomicos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_economico));
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

		if(isset($_POST['AluEconomicos']))
		{
			$model->attributes=$_POST['AluEconomicos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_economico));
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
		$dataProvider=new CActiveDataProvider('AluEconomicos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AluEconomicos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AluEconomicos']))
			$model->attributes=$_GET['AluEconomicos'];

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
		$model=AluEconomicos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-economicos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
