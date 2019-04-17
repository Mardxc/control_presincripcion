<?php

class AluTutorController extends Controller
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
				'actions'=>array('create','update','ListarParentescos','Guardar', 'delete'),
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
		$id_tutor=$_POST['id_tutor'];
		$id_alumno=$_POST['id_alumno'];
		$accion=$_POST['guarda'];

		$nombre=$_POST['nombre'];
		$ape_pat=$_POST['ape_pat'];
		$ape_mat=$_POST['ape_mat'];
		$domicilio=$_POST['domicilio'];
		$telefono=$_POST['telefono'];
		$id_parentesco=$_POST['parentesco'];

		$profesion=$_POST['profesion'];
		$lugar_trabajo=$_POST['lugar_trabajo'];
		$domicilio_trabajo=$_POST['domicilio_trabajo'];
		$telefono_trabajo=$_POST['telefono_trabajo'];
		$jefe_inmediato=$_POST['jefe_inmediato'];
		$telefono_jefe_inmediato=$_POST['telefono_jefe_inmediato'];

		$datos=array(
			'nombre'=>$nombre,
			'ape_pat'=>$ape_pat,
			'ape_mat'=>$ape_mat,
			'domicilio'=>$domicilio,
			'telefono'=>$telefono,
			'escuela'=>$_POST['parentesco'],

			'profesion'=>$profesion,
			'lugar_trabajo'=>$lugar_trabajo,
			'domicilio_trabajo'=>$domicilio_trabajo,
			'telefono_trabajo'=>$telefono_trabajo,
			'jefe_inmediato'=>$jefe_inmediato,
			'telefono_jefe_inmediato'=>$telefono_jefe_inmediato

		);
		/* Save */
		if($accion=='guardar'){

			$tutores=new AluTutor;

				$tutores->nombre		=	$nombre;
				$tutores->ape_pat		=	$ape_pat;
				$tutores->ape_mat		=	$ape_mat;
				$tutores->domicilio		=	$domicilio;
				$tutores->telefono		=	$telefono;
				$tutores->id_parentesco	=	$id_parentesco;

				$tutores->profesion		=	$profesion;
				$tutores->lugar_trabajo	=	$lugar_trabajo;
				$tutores->domicilio_trabajo	=	$domicilio_trabajo;
				$tutores->telefono_trabajo	=	$telefono_trabajo;
				$tutores->jefe_inmediato	=	$jefe_inmediato;
				$tutores->telefono_jefe_inmediato	=	$telefono_jefe_inmediato;

				$tutores->id_alumno 	= 	$id_alumno;

			$tutores->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_tutor'=>'',
				'datos'=>$datos
				))
			;
			//if ($id_tutor=='') {
//				$this->redirect(array('aluAlumno/detalles&id='.$id_alumno));
			//};
		/* Update */
		}elseif ($accion=='actualizar') {
			
			$tutores = AluTutor::model()->findByAttributes(array('id_tutor'=>$id_tutor));
				$tutores->id_tutor 	= 	$id_tutor;

				$tutores->nombre		=	$nombre;
				$tutores->ape_pat		=	$ape_pat;
				$tutores->ape_mat		=	$ape_mat;
				$tutores->domicilio		=	$domicilio;
				$tutores->telefono		=	$telefono;
				$tutores->id_parentesco	=	$id_parentesco;

				$tutores->profesion		=	$profesion;
				$tutores->lugar_trabajo	=	$lugar_trabajo;
				$tutores->domicilio_trabajo	=	$domicilio_trabajo;
				$tutores->telefono_trabajo	=	$telefono_trabajo;
				$tutores->jefe_inmediato	=	$jefe_inmediato;
				$tutores->telefono_jefe_inmediato	=	$telefono_jefe_inmediato;

				$tutores->id_alumno 	= 	$id_alumno;

			$tutores->SaveAttributes(array(
				'id_tutor'.

				'nombre',
				'ape_pat',
				'ape_mat',
				'domicilio',
				'telefono',
				'id_parentesco',

				'profesion',
				'lugar_trabajo',
				'domicilio_trabajo',
				'telefono_trabajo',
				'jefe_inmediato',
				'telefono_jefe_inmediato',

				'id_alumno'
				)
			);
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_tutor'=>$tutores['id_tutor'],
				'datos'=>$datos
				)
			);
			
		}

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id, $id_tutor)
	{
		$sql="SELECT 
			    atu.*
			FROM
			    alu_tutor atu
			WHERE
			    atu.id_alumno =$id
			  AND
			atu.id_tutor=$id_tutor";

		$todo=AluTutor::model()->findBySql($sql);
		
		$this->render('view',array(
			'model'=>$todo,
			//'model'=>$this->loadModel($id),
			//'id'=>$id,
			'id_tutor'=>$id_tutor,
		));
	
		//if($todo->save())
		//		$this->redirect(array('aluAlumno/detalles&id='.$id));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AluTutor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluTutor']))
		{
			$model->attributes=$_POST['AluTutor'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionDialog($id_tutor)
	{
		if(Yii::app()->request->isAjaxRequest){
			$resp = AluTutor::model()->findAllByAttributes(array('id_tutor'=>$id_tutor));
			header("Content-type: application/json");
			echo CJSON::encode($resp);
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $id_tutor)
	{
		$model=$this->loadModel($id);
		$sql="SELECT 
			    atu.*
			FROM
			    alu_tutor atu
			WHERE
			    atu.id_alumno =$id
			  AND
			atu.id_tutor=$id_tutor";

		$todo=AluTutor::model()->findBySql($sql);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluTutor']))
		{
			$todo->attributes=$_POST['AluTutor'];
			if($todo->save())
				$this->redirect(array('aluAlumno/detalles&id='.$id));
		}

		$this->render('update',array(
			'model'=>$todo,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id_tutor)
	{
		$this->loadModel($id_tutor)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AluTutor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AluTutor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AluTutor']))
			$model->attributes=$_GET['AluTutor'];

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
		$model=AluTutor::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-tutor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionListarParentescos($term){


		$criteria=new CDbCriteria;
		$criteria->condition="LOWER(parentesco) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=AluParentesco::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->id_parentesco,
				'value'=>$item->parentesco,
				'label'=>$item->parentesco,
			);
		}

		echo CJSON::encode($arr);
	}
}
