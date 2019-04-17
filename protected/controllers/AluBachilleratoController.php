<?php

class AluBachilleratoController extends Controller
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
				'actions'=>array('create','update'),
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
		$model=new AluBachillerato;


		if(isset($_POST['AluBachillerato']))
		{
			//$rnd = rand(0,9999);  // Generamos un numero aleatorio entre 0-9999
			$model->attributes=$_POST['AluBachillerato'];

			if($model->save()){
				
	            if (Yii::app()->request->isAjaxRequest)
	            {
	            	

	            	echo CJSON::encode(array(
	                    'status'=>'success', 
	                    'div'=>"Bachillerato agregado correctamente ",
	                    'datosBachillerato'=>AluBachillerato::getListBachillerato()
	                ));

	                exit;
	                /*Cambiar por el nombre del grid del bachillerato*/
	            	echo CHtml::script(
	            		"window.parent.$.fn.yiiGridView.update('{$_GET['ins-reg-alumnos-grid']}');");
	            }
			}

		}

        if (Yii::app()->request->isAjaxRequest)
        {
        	 //$id_alumno=CHtml::script("window.parent.$.fn.yiiGridView.getSelection('alumnos-grid')");
        	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			Yii::app()->clientScript->scriptMap['jquery-ui.min.js'] = false;
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('_form', array('model'=>$model), true,true)));
            exit;               
        }
        else{
			$this->render('create',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		if(isset($_POST['AluBachillerato']))
		{
			//$_POST['InsRegAlumnos']['FOTOGRAFIA'] = $model->FOTOGRAFIA;
			$model->attributes=$_POST['AluBachillerato'];



			if($model->save())
               
	            if (!empty($_GET['asDialog']))
	            {


	                echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
	                			window.parent.$('#cru-frame').attr('src','');	
	                			window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
	                			"
							);
	                Yii::app()->end();
	            }
	            else{
					Yii::app()->clientScript->scriptMap['jquery.js'] = true;
					$this->redirect(array('admin','id'=>$model->ID_ALUMNO));
				
				}

		}

	    if (!empty($_GET['asDialog']))
	        $this->layout = '//layouts/iframe';
		
		$this->render('update',array(
			'model'=>$model
		),false,true);
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
		$dataProvider=new CActiveDataProvider('AluBachillerato');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AluBachillerato('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AluBachillerato']))
			$model->attributes=$_GET['AluBachillerato'];

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
		$model=AluBachillerato::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-bachillerato-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
