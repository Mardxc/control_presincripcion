<?php

class AluAlumnoController extends Controller
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
				'actions'=>array('create','update','ListarLocalidades','ListarMunicipios',
					'Detalles','DynamicExamenes','DynamicGrupos','agregaAlumno','borrarAlumno',
					'CupoMaximo','Guardar'),
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

		$no_control=$_POST['no_control'];
		$nombre=$_POST['nombre'];
		$ape_pat=$_POST['ape_pat'];
		$ape_mat=$_POST['ape_mat'];
		$curp=$_POST['curp'];
		$telefono=$_POST['telefono'];
		$sexo=$_POST['sexo'];
		$correo=$_POST['correo'];
		$fecha_nac=$_POST['fecha_nac'];
		$lugar_nac=$_POST['lugar_nac'];
		$domicilio=$_POST['domicilio'];
		$cp=$_POST['cp'];
		$estado_civil=$_POST['estado_civil'];
		$colonia=$_POST['colonia'];
		$tiempo_residencia=$_POST['tiempo_residencia'];

		$id_municipio=$_POST['id_municipio'];
		$id_localidad=$_POST['id_localidad'];


				
		$datos=array(
			'no_control'=>$no_control,
			'nombre'=>$nombre,
			'ape_pat'=>$ape_pat,
			'ape_mat'=>$ape_mat,
			'curp'=>$curp,
			'telefono'=>$telefono,
			'sexo'=>$sexo,
			'correo'=>$correo,
			'fecha_nac'=>$fecha_nac,
			'lugar_nac'=>$lugar_nac,
			'domicilio'=>$domicilio,
			'cp'=>$cp,
			'estado_civil'=>$estado_civil,
			'colonia'=>$colonia,
			'tiempo_residencia'=>$tiempo_residencia,

			'id_municipio'=>$id_municipio,
			'id_localidad'=>$id_localidad
		);
		/* Save */
		if($accion=='guardar'){

			$alumno=new AluAlumno;

				$alumno->no_control			=		$no_control;
				$alumno->nombre				=		$nombre;
				$alumno->ape_pat			=		$ape_pat;
				$alumno->ape_mat			=		$ape_mat;
				$alumno->curp				=		$curp;
				$alumno->telefono			=		$telefono;
				$alumno->sexo				=		$sexo;
				$alumno->correo				=		$correo;
				$alumno->fecha_nac			=		$fecha_nac;
				$alumno->lugar_nac			=		$lugar_nac;
				$alumno->domicilio			=		$domicilio;
				$alumno->cp					=		$cp;
				$alumno->estado_civil		=		$estado_civil;
				$alumno->colonia			=		$colonia;
				$alumno->tiempo_residencia	=		$tiempo_residencia;

				$alumno->ID_MUN				=		$id_municipio;
				$alumno->ID_LOC				=		$id_localidad;

			$alumno->save();

			echo CJSON::encode(array(
				'status'=>'guardar',
				'id_alumno'=>$alumno->id_alumno,
				'datos'=>$datos
				))
			;

		/* Update */
		}elseif ($accion=='actualizar') {

			$alumno = AluAlumno::model()->findByAttributes(array('id_alumno'=>$id_alumno));

				$alumno->no_control			=		$no_control;
				$alumno->nombre				=		$nombre;
				$alumno->ape_pat			=		$ape_pat;
				$alumno->ape_mat			=		$ape_mat;
				$alumno->curp				=		$curp;
				$alumno->telefono			=		$telefono;
				$alumno->sexo				=		$sexo;
				$alumno->correo				=		$correo;
				$alumno->fecha_nac			=		$fecha_nac;
				$alumno->lugar_nac			=		$lugar_nac;
				$alumno->domicilio			=		$domicilio;
				$alumno->cp					=		$cp;
				$alumno->estado_civil		=		$estado_civil;
				$alumno->colonia			=		$colonia;
				$alumno->tiempo_residencia	=		$tiempo_residencia;

				$alumno->ID_MUN				=		$id_municipio;
				$alumno->ID_LOC				=		$id_localidad;

			$alumno->SaveAttributes(array(
				'no_control',
				'nombre',
				'ape_pat',
				'ape_mat',
				'curp',
				'telefono',
				'sexo',
				'correo',
				'fecha_nac',
				'lugar_nac',
				'domicilio',
				'cp',
				'estado_civil',
				'colonia',
				'tiempo_residencia',
				
				'ID_MUN',
				'ID_LOC'
				)
			);
			
			echo CJSON::encode(array(
				'status'=>'actualizar',
				'id_alumno'=>$alumno['id_alumno'],
				'datos'=>$datos
				)
			);
		}
	}

	public function actionCupoMaximo()
	{
		$id_grupo=$_POST['id_grupo'];

		$sqlCupo="select cupo_max from gru_grupos where id_grupo=". $id_grupo;
		$cupo=GruGrupos::model()->findBySql($sqlCupo);

		echo CJSON::encode(array('cupo'=>$cupo['cupo_max']));
	}
	public function actionBorrarAlumno(){
		$id_detalles_grupos=$_POST['id_detalles_grupos'];

		$connection = yii::app()->db;
		$sql = "DELETE FROM gru_detalles_grupos WHERE id_detalles_grupos=".$id_detalles_grupos[0];
				
		$command=$connection->createCommand($sql);
		$command->execute();


	}

	public function actionAgregaAlumno(){
		$id_alumno=$_POST['id_alumno'];
		$id_grupo=$_POST['id_grupo'];

		$sqlCupo="select cupo_max from gru_grupos where id_grupo=". $id_grupo;
		$cupoMaximo=GruGrupos::model()->findBySql($sqlCupo);

		$sqlRegistrados="select id_grupo from gru_detalles_grupos where id_grupo=".$id_grupo;
		$alumnosRegistrados=GruDetallesGrupos::model()->findBySql($sqlRegistrados);



		if($cupoMaximo['cupo_max']==count($alumnosRegistrados)){
			$status=1;
		}else{
			$status=0;
			$connection = yii::app()->db;
			$sql = "INSERT INTO 
					gru_detalles_grupos(id_alumno,id_grupo,fecha) 
					VALUES(".$id_alumno.",".$id_grupo.",'".date('Y-m-d H:i:s')."')";
					
			$command=$connection->createCommand($sql);
			$command->execute();		
		}

		echo CJSON::encode(array('status'=>$status));

	}  
    public function actionDynamicExamenes()
    {
        $data = GruExamen::model()->findAll('id_periodo=:parent_id',array(':parent_id'=>(int) $_POST['id_periodo']));
 
        $data = CHtml::listData($data,'id_examen','nombre');
		echo CHtml::tag('option',array('value' => ''),'Seleccione un examen...',true);
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
            }
    }
    public function actionDynamicGrupos()
    {
        $data = GruGrupos::model()->findAll('id_examen=:parent_id',array(':parent_id'=>(int) $_POST['id_examen']));
 
        $data = CHtml::listData($data,'id_grupo','nombre');
		echo CHtml::tag('option',array('value' => ''),'Seleccione un grupo...',true);
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
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
		$model=new AluAlumno;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AluAlumno']))
		{
			$model->attributes=$_POST['AluAlumno'];
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

		if(isset($_POST['AluAlumno']))
		{
			$model->attributes=$_POST['AluAlumno'];
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
		$dataProvider=new CActiveDataProvider('AluAlumno');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AluAlumno('search');
		$model->unsetAttributes(); 

		if(isset($_GET['AluAlumno']))
			$model->attributes=$_GET['AluAlumno'];
		
		$this->render('admin',array(
			'model'=>$model
		));
	
	}
	public function actionDetalles($id){

		/*if (!isset($id)) {
			$id=0;
		}*/

		$sqlGridAlumnos="SELECT 
							aa.id_alumno as CONSECUTIVO,
							gdg.id_detalles_grupos,
						    concat(aa.nombre,
						            ' ',
						            aa.ape_pat,
						            ' ',
						            aa.ape_mat) as ALUMNO
						FROM
						    gru_detalles_grupos gdg
						        INNER JOIN
						    alu_alumno aa ON gdg.id_alumno = aa.id_alumno
						WHERE
						    gdg.id_grupo = 0";

		$dataAlumnosGrupoFiltrado=new CSqlDataProvider($sqlGridAlumnos,
			array(
				'keyField' => 'id_detalles_grupos',
				'pagination'=>array('pageSize'=>10,)
			)
		);

		$dataGrupo=AluAlumno::alumnoGrupoExistente($id);


		if (Yii::app()->request->isAjaxRequest) {

			if(isset($_GET['id_grupo']) && isset($_GET['alumno'])){
				
				if ($_GET['alumno']==1) {
					$sqlGridAlumnos="SELECT 
								aa.id_alumno as CONSECUTIVO,
								gdg.id_detalles_grupos,
							    concat(aa.nombre,
							            ' ',
							            aa.ape_pat,
							            ' ',
							            aa.ape_mat) as ALUMNO
							FROM
							    gru_detalles_grupos gdg
							        INNER JOIN
							    alu_alumno aa ON gdg.id_alumno = aa.id_alumno
							WHERE
							    gdg.id_grupo = ". $_GET['id_grupo'];
				}elseif($_GET['alumno']==0) {
				
					$sqlGridAlumnos="SELECT 
						    aa.id_alumno as CONSECUTIVO,
						    gdg.id_detalles_grupos,
						    concat(aa.nombre,
						            ' ',
						            aa.ape_pat,
						            ' ',
						            aa.ape_mat) as ALUMNO
						FROM
						    gru_detalles_grupos gdg
						        INNER JOIN
						    alu_alumno aa ON gdg.id_alumno = aa.id_alumno
						WHERE
						    gdg.id_grupo = " . $_GET['id_grupo'] . "
						        AND concat(aa.nombre,
						            ' ',
						            aa.ape_pat,
						            ' ',
						            aa.ape_mat) LIKE '%".$_GET['nombreAlumno']."%'";
				}
			}

			$dataAlumnosGrupoFiltrado=new CSqlDataProvider($sqlGridAlumnos,
				array(
					'keyField' => 'id_detalles_grupos',
					'pagination'=>array('pageSize'=>10,)
				)
			);

			echo CJSON::encode($dataAlumnosGrupoFiltrado);

			$this->render('detalles',array(
				'id_alumno'=>$id,
				'model'=>$this->loadModel($id),
				'dataAlumnosGrupoFiltrado'=>$dataAlumnosGrupoFiltrado,

			));
		}

		$this->render('detalles',array(
			'dataGrupo'=>$dataGrupo,
			'id_alumno'=>$id,
			'dataAlumnosGrupoFiltrado'=>$dataAlumnosGrupoFiltrado,
			'id'=>$id,
		));
		//----------------------------
/*
		if (Yii::app()->request->isAjaxRequest) {

			if(isset($_GET['alumno'])){
				
				if ($_GET['alumno']==1) {
					$sqlGridAlumnos="SELECT 
								aa.id_alumno as CONSECUTIVO,
								gdg.id_detalles_grupos,
							    concat(aa.nombre,
							            ' ',
							            aa.ape_pat,
							            ' ',
							            aa.ape_mat) as ALUMNO
							FROM
							    gru_detalles_grupos gdg
							        INNER JOIN
							    alu_alumno aa ON gdg.id_alumno = aa.id_alumno
							WHERE
							    gdg.id_grupo = ". $_GET['id_grupo'];
				}elseif($_GET['alumno']==0) {
				
					$sqlGridAlumnos="SELECT 
						    aa.id_alumno as CONSECUTIVO,
						    gdg.id_detalles_grupos,
						    concat(aa.nombre,
						            ' ',
						            aa.ape_pat,
						            ' ',
						            aa.ape_mat) as ALUMNO
						FROM
						    gru_detalles_grupos gdg
						        INNER JOIN
						    alu_alumno aa ON gdg.id_alumno = aa.id_alumno
						WHERE
						    gdg.id_grupo = " . $_GET['id_grupo'] . "
						        AND concat(aa.nombre,
						            ' ',
						            aa.ape_pat,
						            ' ',
						            aa.ape_mat) LIKE '%".$_GET['nombreAlumno']."%'";
				}
			}

			$dataAlumnosGrupoFiltrado=new CSqlDataProvider($sqlGridAlumnos,
				array(
					'keyField' => 'id_detalles_grupos',
					'pagination'=>array('pageSize'=>10,)
				)
			);

			echo CJSON::encode($dataAlumnosGrupoFiltrado);

			$this->render('detalles',array(
				'id_alumno'=>$id,
				'model'=>$this->loadModel($id),
				'dataAlumnosGrupoFiltrado'=>$dataAlumnosGrupoFiltrado,

			));
		}
*/
		//----------------------------
	}

	public function loadModel($id)
	{
		$model=AluAlumno::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='alu-alumno-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionListarLocalidades($term){
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
		$criteria->condition="LOWER(NOM_LOC) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=GenLocalidades::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->ID,
				'value'=>$item->NOM_LOC,
				'label'=>$item->NOM_LOC,
			);
		}

		echo CJSON::encode($arr);
	}
	public function actionListarMunicipios($term){
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
		$criteria->condition="LOWER(NOM_MUN) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=GenMunicipios::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->ID_MUN,
				'value'=>$item->NOM_MUN,
				'label'=>$item->NOM_MUN,
			);
		}

		echo CJSON::encode($arr);
	}
}
