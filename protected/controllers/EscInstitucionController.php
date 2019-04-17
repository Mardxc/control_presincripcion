<?php

class EscInstitucionController extends Controller
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
				'actions'=>array('create','update','ListarLocalidades'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EscInstitucion;


		if(isset($_POST['EscInstitucion']))
		{

			$rnd = rand(0,9999);  // Generamos un numero aleatorio entre 0-9999
			$model->attributes=$_POST['EscInstitucion'];



 			$uploadedFileLogoSep=CUploadedFile::getInstance($model,'logo_sep');
 			$fileName = $uploadedFileLogoSep->name;
 			$model->logo_sep = $fileName;

	 		$uploadedFileLogoIns=CUploadedFile::getInstance($model,'logo_ins');
	 		$fileNameInstitucional = $uploadedFileLogoIns->name; 
	 		$model->logo_ins=$fileNameInstitucional;
 			
 	 		$uploadedFileLogoInf1=CUploadedFile::getInstance($model,'logo_inf1');
	 		$fileNameInf1 = $uploadedFileLogoInf1->name; 
	 		$model->logo_inf1=$fileNameInf1;

 	 		$uploadedFileLogoInf2=CUploadedFile::getInstance($model,'logo_inf2');
	 		$fileNameInf1 = $uploadedFileLogoInf2->name; 
	 		$model->logo_inf2=$uploadedFileLogoInf2;

			if($model->save()){
				$uploadedFileLogoSep->saveAs(Yii::app()->basePath. '/images/'.$model->logo_sep );
				$uploadedFileLogoIns->saveAs(Yii::app()->basePath.'/images/'.$model->logo_ins);

				if(!empty($uploadedFileLogoInf1)){
					$uploadedFileLogoInf1->saveAs(Yii::app()->basePath. '/images/'.$model->logo_inf1);
				}

				if(!empty($uploadedFileLogoInf2)){
					$uploadedFileLogoInf2->saveAs(Yii::app()->basePath. '/images/'.$model->logo_inf2);
				}

				$this->redirect(array('admin'));	
			}

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

		if(isset($_POST['EscInstitucion']))
		{
			$_POST['EscInstitucion']['logo_sep'] = $model->logo_sep;
			$_POST['EscInstitucion']['logo_ins'] = $model->logo_ins;


			$model->attributes=$_POST['EscInstitucion'];


			$uploadedFileSep=CUploadedFile::getInstance($model,'logo_sep');
			$uploadedFileInstitucion=CUploadedFile::getInstance($model,'logo_ins');
			$uploadedFileLogoInf1=CUploadedFile::getInstance($model,'logo_inf1');
			$uploadedFileLogoInf2=CUploadedFile::getInstance($model,'logo_inf2');


			if($model->save()){
                if(!empty($uploadedFileSep))  // checkeamos si el archivo subido esta seteado o no
                {
                    $uploadedFileSep->saveAs(Yii::app()->basePath.'/images/'.$model->logo_sep);
                }
                if(!empty($uploadedFileInstitucion))  // checkeamos si el archivo subido esta seteado o no
                {
					$uploadedFileInstitucion->saveAs(Yii::app()->basePath.'/images/'.$model->logo_ins);     
                }
                if(!empty($uploadedFileLogoInf1))  // checkeamos si el archivo subido esta seteado o no
                {
                    $uploadedFileLogoInf1->saveAs(Yii::app()->basePath.'/images/'.$model->logo_inf1);
                }
                if(!empty($uploadedFileLogoInf2))  // checkeamos si el archivo subido esta seteado o no
                {
					$uploadedFileLogoInf2->saveAs(Yii::app()->basePath.'/images/'.$model->logo_inf2);     
                }
                
				$this->redirect(array('admin'));
			}
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
		$dataProvider=new CActiveDataProvider('EscInstitucion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EscInstitucion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EscInstitucion']))
			$model->attributes=$_GET['EscInstitucion'];

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
		$model=EscInstitucion::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='esc-institucion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionListarLocalidades($term){

		$criteria=new CDbCriteria;
		$criteria->condition="LOWER(NOM_MUN) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=GenMunicipios::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->CVE_MUN,
				'value'=>$item->NOM_MUN,
				'label'=>$item->NOM_MUN,
			);
		}

		echo CJSON::encode($arr);
	}
}
