<?php

class AluDocumentacionController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

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
		//Resibe los valores enviados por ajax en la funcion guardar de la vista
		$id_alumno=$_POST['id_alumno'];
		$accion=$_POST['guarda'];

		// trueOrFalse() esta en el modelo
		$constancia_estudios=AluDocumentacion::trueOrFalse($_POST['constancia_estudios']);
		$constancia_bachillerato=AluDocumentacion::trueOrFalse($_POST['constancia_bachillerato']);
		$acta_nacimiento=AluDocumentacion::trueOrFalse($_POST['acta_nacimiento']);
		$fotografias=AluDocumentacion::trueOrFalse($_POST['fotografias']);
		$carta_aceptado=AluDocumentacion::trueOrFalse($_POST['carta_aceptado']);

		$certificado_secundaria=AluDocumentacion::trueOrFalse($_POST['certificado_secundaria']);
		$curpp=AluDocumentacion::trueOrFalse($_POST['curpp']);
		$certificado_medico=AluDocumentacion::trueOrFalse($_POST['certificado_medico']);
		$carta_compromiso=AluDocumentacion::trueOrFalse($_POST['carta_compromiso']);
		$solicitud_inscripcion=AluDocumentacion::trueOrFalse($_POST['solicitud_inscripcion']);

		$datos=array(// guarda los valores en un array 
			'constancia_estudios'=>$constancia_estudios,
			'constancia_bachillerato'=>$constancia_bachillerato,
			'acta_nacimiento'=>$acta_nacimiento,
			'fotografias'=>$fotografias,
			'carta_aceptado'=>$carta_aceptado,

			'certificado_secundaria'=>$certificado_secundaria,
			'curpp'=>$curpp,
			'certificado_medico'=>$certificado_medico,
			'carta_compromiso'=>$carta_compromiso,
			'solicitud_inscripcion'=>$solicitud_inscripcion
		);
		/* Save */
		if($accion=='guardar'){ //$accion se define con el valor del boton en la vista

			$documentacion=new AluDocumentacion; //crea una nueva instancia de AluDocumentacion
				// setea los atributos
				$documentacion->constancia_estudios		=	$constancia_estudios;
				$documentacion->constancia_bachillerato	=	$constancia_bachillerato;
				$documentacion->acta_nacimiento			=	$acta_nacimiento;
				$documentacion->fotografias				=	$fotografias;
				$documentacion->carta_aceptado			=	$carta_aceptado;

				$documentacion->certificado_secundaria	=	$certificado_secundaria;
				$documentacion->curpp					=	$curpp;
				$documentacion->certificado_medico		=	$certificado_medico;
				$documentacion->carta_compromiso		=	$carta_compromiso;
				$documentacion->solicitud_inscripcion	=	$solicitud_inscripcion;

				$documentacion->id_alumno 				= 	$id_alumno;

			$documentacion->save();// guarda los atributos
			// no se que haga esto, talvez aqui esta el error
			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_documentacion'=>0,
				'datos'=>$datos
				))
			;

		/* Update */
		}elseif ($accion=='actualizar') { //hace lo mismo que guardar solo que actualiza
			// busca el registro por medio del id_alumno
			$documentacion = AluDocumentacion::model()->findByAttributes(array('id_alumno'=>$id_alumno));

				$documentacion->constancia_estudios		=	$constancia_estudios;
				$documentacion->constancia_bachillerato	=	$constancia_bachillerato;
				$documentacion->acta_nacimiento			=	$acta_nacimiento;
				$documentacion->fotografias				=	$fotografias;
				$documentacion->carta_aceptado			=	$carta_aceptado;

				$documentacion->certificado_secundaria	=	$certificado_secundaria;
				$documentacion->curpp					=	$curpp;
				$documentacion->certificado_medico		=	$certificado_medico;
				$documentacion->carta_compromiso		=	$carta_compromiso;
				$documentacion->solicitud_inscripcion	=	$solicitud_inscripcion;

			$documentacion->SaveAttributes(array(
				'constancia_estudios',
				'constancia_bachillerato',
				'acta_nacimiento',
				'fotografias',
				'carta_aceptado',
				
				'certificado_secundaria',
				'curpp',
				'certificado_medico',
				'carta_compromiso',
				'solicitud_inscripcion',

				'id_alumno'
				)
			);
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_documentacion'=>$documentacion['id_documentacion'],
				'datos'=>$datos
				)
			);
		}
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new AluDocumentacion;

		if(isset($_POST['AluDocumentacion']))
		{
			$model->attributes=$_POST['AluDocumentacion'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['AluDocumentacion']))
		{
			$model->attributes=$_POST['AluDocumentacion'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AluDocumentacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new AluDocumentacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AluDocumentacion']))
			$model->attributes=$_GET['AluDocumentacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=AluDocumentacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-documentacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
