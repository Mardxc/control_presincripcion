<?php

class GruExamenController extends Controller
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
				'actions'=>array('create','update','ListarPeriodos','ListarCarreras','ListarAulas',
					'Detalles','Guardar','getData','AjaxDelete','Alumnos','GuardarAlumno','getDataAlumnos',
					'updateAlumnos','AjaxDeleteGrupos','DynamicPeriodos','actualizaGridExamenes','AjaxDeleteExamenes',
					'DynamicAulas','ValidaExamen','Imprimir','Grupos','fijarDatos','filtraAlumno',
					'ListarAlumnosBusqueda','ObtienePeriodos','buscaAlumnos','GruposAlumnos','Listado',
					'ListarLocalidades','ListarMunicipios','DynamicOportunidades','DynamicCarreras',
					'ImprimeListado'),
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
	public function actionImprimeListado(){

				$id_periodo=isset($_GET['id_periodo']) ? $_GET['id_periodo'] : 0;


				$sqlGridFiltrado="SELECT 
				    aa.id_alumno AS CONSECUTIVO,
				    Concat(aa.nombre,
				            ' ',
				            aa.ape_pat,
				            ' ',
				            aa.ape_mat) AS NOMBRE,
				    bc.nombre AS CARRERA,
				    eesc.nombre AS ESCUELA_PROCEDENCIA,
				    gm.nom_mun AS MUNICIPIO,
				    gl.nom_loc AS LOCALIDAD,
				    aa.sexo AS SEXO,
				    ge.oportunidad AS OPORTUNIDAD
				FROM
				    alu_alumno aa
				        INNER JOIN
				    gen_municipios gm ON aa.ID_MUN = gm.ID_MUN
				        INNER JOIN
				    gen_localidades gl ON aa.ID_LOC = gl.ID
				        INNER JOIN
				    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
				        INNER JOIN
				    gru_grupos gg ON gg.id_grupo = gdg.id_grupo
				        INNER JOIN
				    gru_examen ge ON ge.id_examen = gg.id_examen
				        INNER JOIN
				    bas_carreras bc ON gg.id_carrera = bc.id_carrera
				        INNER JOIN
				    alu_escolares ae ON aa.id_alumno = ae.id_alumno
				        INNER JOIN
				    esc_escuela eesc ON ae.id_escuela = eesc.id_escuela
				WHERE ge.id_periodo = ". $id_periodo;



				$oportunidad=
					empty($_GET['id_examen']) ? 
						0
						:
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND ge.oportunidad = ' .
							 GruExamen::getOportunidadExamen($_GET['id_examen']);

				$id_carrera=
					empty($_GET['id_carrera']) ?
						 0 
						 : 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND gg.id_carrera  = ' .
						 $_GET['id_carrera'];

				$id_escuela=
					empty($_GET['id_escuela']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND eesc.id_escuela  = ' .
						$_GET['id_escuela'];

				$id_municipio_alumno=
					empty($_GET['id_municipio_alumno']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND gm.ID_MUN  = ' .
						$_GET['id_municipio_alumno'];

				$id_localidad_alumno=
					empty($_GET['id_localidad_alumno']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND gl.ID   = ' .
					$_GET['id_localidad_alumno'];

				$sexo=
					empty($_GET['sexo']) ? 
						'' 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . " AND aa.sexo    = '" .
						$_GET['sexo'] . "'";


				$id_municipio_escuela=
					empty($_GET['id_municipio_escuela']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND eesc.ID_MUN    = ' .
						$_GET['id_municipio_escuela'];

				if(!empty($_GET['fecha_inicio']) &&  !empty($_GET['fecha_fin'])){
					$sqlGridFiltrado=
						$sqlGridFiltrado . " AND 
						(gdg.fecha>='".$_GET['fecha_inicio']."'
						 AND gdg.fecha<='".$_GET['fecha_fin']."'))";		 
				}
				$datos=array(
						'oportunidad'=>GruExamen::getOportunidadExamen($_GET['id_examen']),
						'carrera'=>GruExamen::getNameCarrera(empty($_GET['id_carrera']) ? 0 : $_GET['id_carrera']),
						'escuela'=>GruExamen::getNameEscuela(empty($_GET['id_escuela']) ? 0 : $_GET['id_escuela']),
						'municipio_Alumno'=>GruExamen::getNameMunicipio(empty($_GET['id_municipio_alumno']) ? 0 : $_GET['id_municipio_alumno']),
						'localidad_Alumno'=>GruExamen::getNameLocalidad(empty($_GET['id_localidad_alumno']) ? 0 : $_GET['id_municipio_alumno']),
						'sexo'=>empty($_GET['sexo']) ? '' : $_GET['sexo'],
						'municipio_Escuela'=>GruExamen::getNameMunicipio(empty($_GET['id_municipio_escuela']) ? 0 : $_GET['id_municipio_escuela'])

				);
		$dataAlumnosFiltrado=Yii::app()->db->createCommand($sqlGridFiltrado)->queryAll();

		$html2pdf = Yii::app()->ePdf->HTML2PDF('L');
		

        $html2pdf->WriteHTML($this->renderPartial('ImprimeListado', array(
			'dataAlumnosFiltrado'=>$dataAlumnosFiltrado,
			'datos'=>$datos,
        	), true));

        $html2pdf->Output('c:\wampadmin.pdf');
	}
	public function actionListado()
	{
		$sqlGridFiltrado="SELECT 
		    aa.id_alumno AS CONSECUTIVO,
		    Concat(aa.nombre,
		            ' ',
		            aa.ape_pat,
		            ' ',
		            aa.ape_mat) AS NOMBRE,
		    bc.nombre AS CARRERA,
		    eesc.nombre AS ESCUELA_PROCEDENCIA,
		    gm.nom_mun AS MUNICIPIO,
		    gl.nom_loc AS LOCALIDAD,
		    aa.sexo AS SEXO,
		    ge.oportunidad AS OPORTUNIDAD
		FROM
		    alu_alumno aa
		        INNER JOIN
		    gen_municipios gm ON aa.ID_MUN = gm.ID_MUN
		        INNER JOIN
		    gen_localidades gl ON aa.ID_LOC = gl.ID
		        INNER JOIN
		    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
		        INNER JOIN
		    gru_grupos gg ON gg.id_grupo = gdg.id_grupo
		        INNER JOIN
		    gru_examen ge ON ge.id_examen = gg.id_examen
		        INNER JOIN
		    bas_carreras bc ON gg.id_carrera = bc.id_carrera
		        INNER JOIN
		    alu_escolares ae ON aa.id_alumno = ae.id_alumno
		        INNER JOIN
		    esc_escuela eesc ON ae.id_escuela = eesc.id_escuela
		WHERE
		    (gm.ID_MUN = 640 OR eesc.id_escuela = 2
		        OR bc.id_carrera = 1
		        OR gl.ID = 979
		        OR aa.sexo = 'M'
		        OR ge.oportunidad = 1
		        OR eesc.ID_MUN = 640 
				OR (gdg.fecha>='2015-02-01' AND gdg.fecha<='2015-02-30'))
		        AND ge.id_periodo = 0";

		$dataAlumnosFiltrado=new CSqlDataProvider($sqlGridFiltrado,
			array(
				'keyField' => 'id_alumno',
				'pagination'=>array('pageSize'=>10,)
			)
		);

		if (Yii::app()->request->isAjaxRequest) {
			if (isset($_GET['id_periodo'])) {

				$id_periodo=isset($_GET['id_periodo']) ? $_GET['id_periodo'] : 0;


				$sqlGridFiltrado="SELECT 
				    aa.id_alumno AS CONSECUTIVO,
				    Concat(aa.nombre,
				            ' ',
				            aa.ape_pat,
				            ' ',
				            aa.ape_mat) AS NOMBRE,
				    bc.nombre AS CARRERA,
				    eesc.nombre AS ESCUELA_PROCEDENCIA,
				    gm.nom_mun AS MUNICIPIO,
				    gl.nom_loc AS LOCALIDAD,
				    aa.sexo AS SEXO,
				    ge.oportunidad AS OPORTUNIDAD
				FROM
				    alu_alumno aa
				        INNER JOIN
				    gen_municipios gm ON aa.ID_MUN = gm.ID_MUN
				        INNER JOIN
				    gen_localidades gl ON aa.ID_LOC = gl.ID
				        INNER JOIN
				    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
				        INNER JOIN
				    gru_grupos gg ON gg.id_grupo = gdg.id_grupo
				        INNER JOIN
				    gru_examen ge ON ge.id_examen = gg.id_examen
				        INNER JOIN
				    bas_carreras bc ON gg.id_carrera = bc.id_carrera
				        INNER JOIN
				    alu_escolares ae ON aa.id_alumno = ae.id_alumno
				        INNER JOIN
				    esc_escuela eesc ON ae.id_escuela = eesc.id_escuela
				WHERE ge.id_periodo = ". $id_periodo;

				$oportunidad=
					empty($_GET['id_examen']) ? 
						0
						:
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND ge.oportunidad = ' .
							 GruExamen::getOportunidadExamen($_GET['id_examen']);

				$id_carrera=
					empty($_GET['id_carrera']) ?
						 0 
						 : 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND gg.id_carrera  = ' .
						 $_GET['id_carrera'];

				$id_escuela=
					empty($_GET['id_escuela']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND eesc.id_escuela  = ' .
						$_GET['id_escuela'];

				$id_municipio_alumno=
					empty($_GET['id_municipio_alumno']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND gm.ID_MUN  = ' .
						$_GET['id_municipio_alumno'];

				$id_localidad_alumno=
					empty($_GET['id_localidad_alumno']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND gl.ID   = ' .
					$_GET['id_localidad_alumno'];

				$sexo=
					empty($_GET['sexo']) ? 
						'' 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . " AND aa.sexo    = '" .
						$_GET['sexo'] . "'";

				$id_municipio_escuela=
					empty($_GET['id_municipio_escuela']) ? 
						0 
						: 
						$sqlGridFiltrado=
							$sqlGridFiltrado . ' AND eesc.ID_MUN    = ' .
						$_GET['id_municipio_escuela'];

				if(!empty($_GET['fecha_inicio']) &&  !empty($_GET['fecha_fin'])){
					$sqlGridFiltrado=
						$sqlGridFiltrado . " AND 
						(gdg.fecha>='".$_GET['fecha_inicio']."'
						 AND gdg.fecha<='".$_GET['fecha_fin']."'))";		 
				}	        

				/*echo $sqlGridFiltrado;

				exit;*/

				$dataAlumnosFiltrado=new CSqlDataProvider($sqlGridFiltrado,
					array(
						'keyField' => 'CONSECUTIVO',
						'pagination'=>array('pageSize'=>10,)
					)
				);
				echo CJSON::encode($dataAlumnosFiltrado);


				$this->render('listado',array(
					'dataAlumnosFiltrado'=>$dataAlumnosFiltrado,
					'sqlGridFiltrado'=>$sqlGridFiltrado,
				));
			}
		}


		$this->render('listado',array(
			'dataAlumnosFiltrado'=>$dataAlumnosFiltrado,
			'sqlGridFiltrado'=>$sqlGridFiltrado,
		));
	}
	public function actionGruposAlumnos(){

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


			$this->render('gruposalumnos',array(
				'dataAlumnosGrupoFiltrado'=>$dataAlumnosGrupoFiltrado,

			));
		}

		$this->render('gruposalumnos',array(
			'dataAlumnosGrupoFiltrado'=>$dataAlumnosGrupoFiltrado,
		));
	}
	public function actionbuscaAlumnos(){

		$nombre_alumno=$_POST['nombreAlumno'];

		$sql="SELECT 
				    id_detalles_grupos,
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
				    concat(aa.nombre,
				            ' ',
				            aa.ape_pat,
				            ' ',
				            aa.ape_mat) LIKE '%".$nombre_alumno."%'";
	
		$dataProviderGruposAlumnos=new CSqlDataProvider($sql,
			array(
				'keyField' => 'id_detalles_grupos',
				'pagination'=>array('pageSize'=>10,)
			)
		);

		echo CJSON::encode($dataProviderGruposAlumnos);


	}
	public function actionObtienePeriodos(){
		$id_periodo=$_POST['id_periodo'];

		$sqlCiclo='SELECT 
					    bc.id_ciclo
					FROM
					    bas_ciclo bc
					        INNER JOIN
					    bas_periodo bp ON bc.id_ciclo = bp.id_ciclo
					WHERE
					    bp.id_periodo =' . $id_periodo;

		$ciclo=basCiclo::model()->findBySql($sqlCiclo);

		$sqlPeriodos='SELECT 
					    periodo
					FROM
					    bas_periodo
					WHERE
					    id_ciclo = '. $ciclo['id_ciclo'];

		$periodos=GruExamen::getListPeriodosSQL($ciclo['id_ciclo']);

		$periodo=GruExamen::getNamePeriodo($id_periodo);

		echo CJSON::encode(
			array(
				'periodos'=>$periodos,
				'periodo'=>$periodo
			)
		);
	}
	public function actionfiltraAlumno(){
		$nombre_alumno=$_POST['nombreAlumno'];
		
		$sqlAlumnos="SELECT 
					    aa.id_alumno,
					    aa.no_control AS NUMERO_CONTROL,
					    Concat(nombre, ' ', ape_pat, ' ', ape_mat) AS NOMBRE
					FROM
					    alu_alumno aa
					        left join
					    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
					WHERE
					    gdg.id_alumno IS NOT NULL
					AND Concat(aa.nombre, aa.ape_pat, aa.ape_mat) LIKE '%".$nombre_alumno."%'";

		$dataProviderAlumnos=new CSqlDataProvider($sqlAlumnos,
			array(
				'keyField' => 'id_alumno',
				'pagination'=>array('pageSize'=>10,)
			)
		);
		/*echo CJSON::encode($dataProviderAlumnos);
				$this->renderPartial('GruGrupos/alumnos',array(
			'dataProviderAlumnos'=>$dataProviderAlumnos,false,true
		));*/
	}
	public function actionfijarDatos(){
		$id_alumno=$_POST['id_alumno'];

		$sql="SELECT 
				id_alumno,
				Concat(nombre,' ', ape_pat,' ',ape_mat) as nombre
			FROM 
				alu_alumno 
			WHERE
				id_alumno=" . $id_alumno[0];

		$alumno=AluAlumno::model()->findBySql($sql);

		if (count($alumno)>0) {
			$status=1;
			$id_alumno=$alumno['id_alumno'];
			$nombre=$alumno['nombre'];
		}else
			$status=0;

		echo CJSON::encode(
			array(
				'status'=>$status,
				'id_alumno'=>$id_alumno,
				'nombre'=>$nombre
			)
		);
	}
	public function actionGrupos(){


		$id_grupo=$_GET['id_grupo'];


		$sqlGrupos="SELECT 
			ge.tipo_examen,
			date_format(ge.fecha,'%d-%m-%Y') as fecha,
			bc.nombre as carrera,
			gg.nombre as grupo,
			gg.aplicador
		FROM
		    gru_grupos gg
		        INNER JOIN
		    bas_carreras bc ON gg.id_carrera = bc.id_carrera
				INNER JOIN 
			gru_examen ge  on ge.id_examen=gg.id_examen
		WHERE 
			gg.id_grupo=" . $id_grupo;

		$grupos=Yii::app()->db->createCommand($sqlGrupos)->queryAll();

		$sqlGruposAlumnos="SELECT 
		    concat(aa.ape_pat,
		            ' ',
		            aa.ape_mat,
		            ' ',
		            aa.nombre) as nombre,
		    gea.folio_ceneval,
		    gea.version
		FROM
		    alu_alumno aa
		        INNER JOIN
		    gru_examen_alumno gea ON aa.id_alumno = gea.id_alumno
				INNER JOIN
			gru_detalles_grupos gdg ON gdg.id_alumno=aa.id_alumno 
		WHERE 
			gdg.id_grupo=". $_GET['id_grupo'];

		$detallesGrupos=Yii::app()->db->createCommand($sqlGruposAlumnos)->queryAll();

		$html2pdf = Yii::app()->ePdf->HTML2PDF();
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		//$html2pdf->WriteHTML($stylesheet, 1);
        $html2pdf->WriteHTML($this->renderPartial('grupos', array(
			'grupos'=>$grupos,
			'detallesGrupos'=>$detallesGrupos,
        	), true));

        $html2pdf->Output('admin.pdf');
       
	}
	public function actionImprimir(){

	}
	public function actionValidaExamen(){

		$id_periodo=$_POST['id_periodo'];
		$oportunidad=$_POST['oportunidad'];

		

		$examen=GruExamen::model()->findByAttributes(array(
			'id_periodo'=>$id_periodo,
			'oportunidad'=>$oportunidad
		));


		$examenPeriodoCarreraOportunidad=GruExamen::model()->findByAttributes(array(
			'id_periodo'=>$id_periodo,
			'oportunidad'=>$oportunidad
		));

		if(count($examen)==1 || count($examenPeriodoCarreraOportunidad)==1){
			$status=1;
			$mensaje='Ya existe un examen para el periodo, oportunidad, aula y/o carrera seleccionada';
		}
		else{
			$status=0;
			$mensaje='';
		}
		
		if( empty($_POST['id_periodo']) || empty($_POST['oportunidad']) ) {
			$mensaje='Seleccione el periodo y oportunidad para validar';
			$status=1;
		}

		echo CJSON::encode(
			array(
				'status'=>$status,
				'mensaje'=>$mensaje
			)
		);
	}
	public function actionactualizaGridExamenes(){

				$id_periodo=$_POST['id_periodo'];

				$sqlGridExamenesFiltrados="SELECT 
							ge.id_examen,
						    ge.nombre as NOMBRE,
						    ge.oportunidad  AS OPORTUNIDAD,
						    ge.horario AS HORARIO,
						    ge.fecha AS FECHA,
						    bp.periodo AS PERIODO,
						    bc.ciclo AS CICLO
						FROM
						    gru_examen ge
						        INNER JOIN
						    bas_periodo bp ON bp.id_periodo = ge.id_periodo
						        INNER JOIN
						    bas_ciclo bc ON bc.id_ciclo = bc.id_ciclo
						WHERE
						    ge.id_periodo = " . $id_periodo;

		

				$dataProviderExamenesFiltrados=new CSqlDataProvider($sqlGridExamenesFiltrados,
					array(
						'keyField' => 'id_examen',
						'pagination'=>array('pageSize'=>10,)
						)
					);

				echo CJSON::encode($dataProviderExamenesFiltrados);



	}
	public function actionupdateAlumnos(){

		$id_grupo=$_POST['id_grupo'];


		$sqlGrid="SELECT 
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
		    gdg.id_grupo = " . $id_grupo;

		$dataProviderGruposAlumnos=new CSqlDataProvider($sqlGrid,
			array(
				'keyField' => 'id_detalles_grupos',
				'pagination'=>array('pageSize'=>10,)
			)
		);
		echo CJSON::encode($dataProviderGruposAlumnos);

	}
	public function actionAjaxDelete(){

		if (isset($_POST['id_grupo'])) {

			$autoIdAll = $_POST['id_grupo'];

			if(count($autoIdAll)>0){
				foreach($autoIdAll as $autoId){
					//Se borra primero el grupo
					$modelGrupos=GruGrupos::model()->findByPk($autoId);
					$modelGrupos->delete();
					//Se borran despues los alumnos que pertenecen al grupo
					$modelDetallesAlumnos=GruDetallesGrupos::model()->findAll('id_grupo='.$autoId);
					foreach ($modelDetallesAlumnos as $alumno) {
						$modelDetalle=GruDetallesGrupos::model()->findByPk($alumno->id_detalles_grupos);
						$modelDetalle->delete();
					}
				}
			}
			echo CJSON::encode(
				array(
					'mensaje'=>'El grupo se elimino'
				)
			);
		}

	}
	public function actionAjaxDeleteGrupos(){

		if (isset($_POST['id_detalles_grupos'])) {

			$autoIdAll = $_POST['id_detalles_grupos'];

			if(count($autoIdAll)>0){
				foreach($autoIdAll as $autoId){
					$model=GruDetallesGrupos::model()->findByPk($autoId);
					$model->delete();
				}
			}
			echo CJSON::encode(
				array(
					'mensaje'=>'El alumno  se elimino del grupo'
				)
			);
		}

	}
	public function actionAjaxDeleteExamenes(){
		
		if (isset($_POST['id_examen'])) {

			$autoIdAll = $_POST['id_examen'];

			if(count($autoIdAll)>0){
				foreach($autoIdAll as $autoId){
					$gruposExamen=GruGrupos::model()->findByAttributes(array('id_examen'=>$autoId));
					if(count($gruposExamen)==1){
						$mensaje='Al examen ya le fue asignado un grupo.<br> 
						No se puede dar de baja, modifiquelo para reasignarlo'; 
						$status=1;
					}else{
						$mensaje='El examen fue eliminado';
						$model=GruExamen::model()->findByPk($autoId);
						$model->delete();
						$status=0;
					}
					
				}
			}
			echo CJSON::encode(
				array(
					'mensaje'=>$mensaje,
					'status'=>$status
				)
			);
		}

	}
	public function actiongetData(){
		$id_grupo=$_POST['id_grupo'];
		//print_r('grupo'.$id_grupo[0]);
		$grupos = GruGrupos::model()->findByAttributes(array('id_grupo'=>$id_grupo[0]));
		$detalleGrupos=GruDetallesGrupos::model()->findAllByAttributes(array('id_grupo'=>$id_grupo[0]));

			$nombre			=		$grupos->nombre;
			$turno  		=		$grupos->turno;
			$cupo_max		=		$grupos->cupo_max;
			$id_grupo   	=		$grupos->id_grupo ;
			$id_aula 		= 		$grupos->id_aula;
			$id_carrera 	= 		$grupos->id_carrera;
			$aplicador 		= 		$grupos->aplicador;
			$totalEnGrupo	=		count($detalleGrupos);
			
			$id_edificio=GruExamen::getNameEdificio($id_aula);
			$id_aula=GruExamen::getNameAula($id_aula);
			
			$aulas=GruExamen::getListAulas();
			$id_carrera=GruExamen::getNameCarrera($id_carrera);

		echo CJSON::encode(array(
			'nombre'=>$nombre,
			'turno'=>$turno,
			'cupo_max'=>$cupo_max,
			'id_grupo'=>$id_grupo,
			'id_aula'=>$id_aula,
			'id_carrera'=>$id_carrera,
			'aulas'=>$aulas,
			'id_edificio'=>$id_edificio,
			'totalEnGrupo'=>$totalEnGrupo,
			'aplicador'=>$aplicador
		));
	}
	public function actiongetDataAlumnos(){
		$id_detalles_grupos=$_POST['id_detalles_grupos'];

		$gruposDetalles = GruDetallesGrupos::model()->findByAttributes(array('id_detalles_grupos'=>$id_detalles_grupos));

			$id_alumno				=		$gruposDetalles->id_alumno;
			$id_grupo  				=		$gruposDetalles->id_grupo;
			$id_detalles_grupos		=		$gruposDetalles->id_detalles_grupos;

			$nombre_alumno=AluAlumno::getNameAlumno($id_alumno);

		echo CJSON::encode(array(
			'nombre_alumno'=>$nombre_alumno,
			'id_grupo'=>$id_grupo,
			'id_alumno'=>$id_alumno,
			'id_detalles_grupos'=>$id_detalles_grupos
		));
	}
	public function actionGuardar(){
		$id_grupo=$_POST['id_grupo'];
		$id_examen=$_POST['id_examen'];
		
		$nombre=$_POST['nombre'];
		$turno=$_POST['turno'];
		$cupo_max=$_POST['cupo_max'];
		$id_carrera=$_POST['id_carrera'];
		$id_aula=$_POST['id_aula'];
		$aplicador=$_POST['aplicador'];

		$carreras=GruExamen::getListCarreras();
		$edificios=GruExamen::getListEdificios();
		

		$datos=array(
			'nombre'=>$nombre,
			'turno'=>$turno,
			'cupo_max'=>$cupo_max,
			'id_carrera'=>$id_carrera,
			'id_aula'=>$id_aula,
			'aplicador'=>$aplicador
		);

		$bandera=0;

		if($nombre!='' && $turno!='' && $cupo_max!='' && $id_carrera!='' && $id_aula!='' && $aplicador!=''){
			$bandera=1;
			/* Save */
			if($id_grupo==0){

				$criteriaGrupos=GruGrupos::model()->findByAttributes(array('nombre'=>$nombre));

				if(count($criteriaGrupos)==0){
					$grupos=new GruGrupos;

						$grupos->nombre			=	$nombre;
						$grupos->turno			=	$turno;
						$grupos->cupo_max		=	$cupo_max;
						$grupos->id_examen 		= 	$id_examen;
						$grupos->id_aula 		= 	$id_aula;
						$grupos->id_carrera 	= 	$id_carrera;
						$grupos->aplicador 		= 	$aplicador;

					$grupos->save();
					$status='El grupo se registro con éxito';
				}else{
					$status='El grupo ya fue registrado';
				}


			/* Update */
			}else  {
				
				$grupos = GruGrupos::model()->findByAttributes(array('id_grupo'=>$id_grupo));

					$grupos->nombre			=	$nombre;
					$grupos->turno			=	$turno;
					$grupos->cupo_max		=	$cupo_max;
					$grupos->id_examen 		= 	$id_examen;
					$grupos->id_aula 		= 	$id_aula;
					$grupos->id_carrera 	= 	$id_carrera;
					$grupos->aplicador 		= 	$aplicador;

				$grupos->SaveAttributes(array(
					'nombre',
					'turno',
					'cupo_max',
					'id_carrera',
					'id_examen',
					'id_aula',
					'aplicador'
					)
				);
				$status='El grupo se actualizo correctamente';
				$bandera=1;
			}
		}else{
			$status='Para poder hacer un cambio o crear un grupo verifique que se haya introducido toda la información';

		}
			echo CJSON::encode(array(
				'bandera'=>$bandera,
				'status'=>$status,
				'datos'=>$datos,
				'carreras'=>$carreras,
				'edificios'=>$edificios
				)
			);
	}
	public function actionGuardarAlumno(){
		$id_detalles_grupos=$_POST['id_detalles_grupos'];
		$id_grupo=$_POST['id_grupo'];
		$id_alumno=$_POST['id_alumno'];

		$nombreCompleto=AluAlumno::getNameAlumno($id_alumno);

		$grupos=GruGrupos::model()->findByPk($id_grupo);	
		$cupo_maximo=$grupos['cupo_max'];

		$criteriaGrupos=GruDetallesGrupos::model()->findByAttributes(array('id_alumno'=>$id_alumno));


		$datos=array(
			'id_grupo'=>$id_grupo,
			'nombre_alumno'=>$nombreCompleto
		);

		/* Save */
		if(count($criteriaGrupos)==0){

			$criteriaDetallesGrupos=GruDetallesGrupos::model()->findByAttributes(array('id_alumno'=>$id_alumno));
			$totalEnGrupo=count($criteriaDetallesGrupos);

			if($cupo_maximo==0 || $totalEnGrupo<=$cupo_maximo){
				$gruposDetalles=new GruDetallesGrupos;

					$gruposDetalles->id_grupo		=	$id_grupo;
					$gruposDetalles->id_alumno 		= 	$id_alumno;

				$gruposDetalles->save();
				$status='Guardardo Correctamente';
			}else if($totalEnGrupo>=$cupo_maximo){
				$status='El cupo del grupo es de: ' . $cupo_maximo;
			}else{
				$grupo=GruExamen::getNameGrupo($id_grupo);
				$status='El alumno se encuentra registrado en el grupo de: ' . $grupo;
			}


			echo CJSON::encode(array(
				'status'=>'El alumno se guardo correctamente',
				'datos'=>$datos
			));
		}else{
			echo CJSON::encode(array(
				'status'=>'El alumno ya fue registrado en otro grupo',
				'datos'=>$datos
			));
		}

	}
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionAlumnos(){


		
		$this->render('GruGrupos/alumnos',array(
			'dataProviderGruposAlumnos'=>$dataProviderGruposAlumnos
			));
	}

	public function actionDetalles($id){
		
		$model_alu = new AluAlumno('search');
		if(isset($_GET['varFullname']))
   			$model_alu->attributes=$_GET['varFullname'];

		$sqlGrid="SELECT * FROM gru_grupos WHERE id_examen=" . $id;

		$dataProviderGrupos=new CSqlDataProvider($sqlGrid,
			array(
				'keyField' => 'id_grupo',
				'pagination'=>array('pageSize'=>10,)
			)
		);

		$sqlAlumnos="SELECT 
						aa.id_alumno,
						aa.no_control as NUMERO_CONTROL,
					    Concat(nombre,' ', ape_pat,' ',ape_mat) as NOMBRE
					FROM
					    alu_alumno aa
					        left join
					    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
					where
					    gdg.id_alumno is null";


		$sqlGridAlumnos="SELECT 
			id_detalles_grupos,
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

		$dataProviderGruposAlumnos=new CSqlDataProvider($sqlGridAlumnos,
			array(
				'keyField' => 'id_detalles_grupos',
				'pagination'=>array('pageSize'=>10,)
			)
		);
		$dataProviderAlumnos=new CSqlDataProvider($sqlAlumnos,
			array(
				'keyField' => 'id_alumno',
				'pagination'=>array('pageSize'=>10,)
			)
		);

		if (Yii::app()->request->isAjaxRequest) {

			if(isset($_GET[0])){
			
				$sqlGridAlumnos="SELECT 
					id_detalles_grupos,
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
				    gdg.id_grupo = ".$_GET[0];

				$dataProviderGruposAlumnos=new CSqlDataProvider($sqlGridAlumnos,
					array(
						'keyField' => 'id_detalles_grupos',
						'pagination'=>array('pageSize'=>10,)
					)
				);

				$sqlAlumnos="SELECT 
							aa.id_alumno,
							aa.no_control as NUMERO_CONTROL,
						    Concat(nombre,' ', ape_pat,' ',ape_mat) as NOMBRE
						FROM
						    alu_alumno aa
						        left join
						    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
						where
						    gdg.id_alumno is null";

				$dataProviderAlumnos=new CSqlDataProvider($sqlAlumnos,
					array(
						'keyField' => 'id_alumno',
						'pagination'=>array('pageSize'=>10,)
					)
				);
				echo CJSON::encode($dataProviderGruposAlumnos);

				$this->render('detalles',array(
					'model'=>$this->loadModel($id),
					'dataProviderGrupos'=>$dataProviderGrupos,
					'dataProviderGruposAlumnos'=>$dataProviderGruposAlumnos,
					'dataProviderAlumnos'=>$dataProviderAlumnos,
					'model_alu'=>$model_alu
				));
			}
		}	

		$this->render('detalles',array(
			'model'=>$this->loadModel($id),
			'dataProviderGrupos'=>$dataProviderGrupos,
			'dataProviderGruposAlumnos'=>$dataProviderGruposAlumnos,
			'dataProviderAlumnos'=>$dataProviderAlumnos,
			'model_alu'=>$model_alu
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GruExamen;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GruExamen']))
		{
			$model->attributes=$_POST['GruExamen'];
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

		if(isset($_POST['GruExamen']))
		{
			$model->attributes=$_POST['GruExamen'];
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
		$dataProvider=new CActiveDataProvider('GruExamen');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GruExamen('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GruExamen']))
			$model->attributes=$_GET['GruExamen'];

		$sqlGridExamenesFiltrados="SELECT 
					ge.id_examen,
				    ge.nombre as NOMBRE,
				    ge.oportunidad  AS OPORTUNIDAD,
				    ge.horario AS HORARIO,
				    ge.fecha AS FECHA,
				    bp.periodo AS PERIODO,
				    bc.ciclo AS CICLO
				FROM
				    gru_examen ge
				        INNER JOIN
				    bas_periodo bp ON bp.id_periodo = ge.id_periodo
				        INNER JOIN
				    bas_ciclo bc ON bc.id_ciclo = bp.id_ciclo
				WHERE
				    ge.id_periodo = 0";

		if (Yii::app()->request->isAjaxRequest) {
			
			if(isset($_GET['id'])){

				$id_periodo=$_GET['id'];

				//print_r($id_periodo);

				$sqlGridExamenesFiltrados="SELECT 
							ge.id_examen,
						    ge.nombre as NOMBRE,
						    ge.oportunidad  AS OPORTUNIDAD,
						    ge.horario AS HORARIO,
						    ge.fecha AS FECHA,
						    bp.periodo AS PERIODO,
						    bc.ciclo AS CICLO
						FROM
						    gru_examen ge
						        INNER JOIN
						    bas_periodo bp ON bp.id_periodo = ge.id_periodo
						        INNER JOIN
						    bas_ciclo bc ON bc.id_ciclo = bp.id_ciclo
						WHERE
						    ge.id_periodo = " . $id_periodo;

				$dataProviderExamenesFiltrados=new CSqlDataProvider($sqlGridExamenesFiltrados,
					array(
						'keyField' => 'id_examen',
						'pagination'=>array('pageSize'=>10,)
						)
					);

				echo CJSON::encode($dataProviderExamenesFiltrados);

				$this->render('admin',array(
					'model'=>$model,
					'dataProviderExamenesFiltrados'=>$dataProviderExamenesFiltrados,
				));
			}
		}

		$dataProviderExamenesFiltrados=new CSqlDataProvider($sqlGridExamenesFiltrados,
			array(
				'keyField' => 'id_examen',
				'pagination'=>array('pageSize'=>10,)
				)
			);



		$this->render('admin',array(
			'model'=>$model,
			'dataProviderExamenesFiltrados'=>$dataProviderExamenesFiltrados,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GruExamen::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gru-examen-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionListarAulas($term){


		$criteria=new CDbCriteria;
		$criteria->condition="LOWER(aula) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=escAulas::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->id_aula,
				'value'=>$item->aula,
				'label'=>$item->aula,
			);
		}

		echo CJSON::encode($arr);
	}

	public function actionListarPeriodos($term){


		$criteria=new CDbCriteria;
		$criteria->condition="LOWER(periodo) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=basPeriodo::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->id_periodo,
				'value'=>$item->periodo,
				'label'=>$item->periodo,
			);
		}

		echo CJSON::encode($arr);
	}

	public function actionListarCarreras($term){


		$criteria=new CDbCriteria;
		$criteria->condition="LOWER(nombre) like LOWER(:term)";
		$criteria->params=array(':term'=>'%' . $_GET['term'] . '%');
		$criteria->limit=30;

		$data=basCarreras::model()->findAll($criteria);
		$arr=array();

		foreach ($data as $item) {
			$arr[]=array(
				'id'=>$item->id_carrera,
				'value'=>$item->nombre,
				'label'=>$item->nombre,
			);
		}

		echo CJSON::encode($arr);
	}
    public function actionDynamicPeriodos()
    {
        $data = basPeriodo::model()->findAll('id_ciclo=:parent_id',array(':parent_id'=>(int) $_POST['ciclo']));
 
        $data = CHtml::listData($data,'id_periodo','periodo');
		echo CHtml::tag('option',array('value' => ''),'Seleccione un periodo...',true);
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
            }
    }
     public function actionDynamicAulas()
    {
        $data = escAulas::model()->findAll('id_edificio=:parent_id',array(':parent_id'=>(int) $_POST['edificio']));
 
        $data = CHtml::listData($data,'id_aula','aula');
		echo CHtml::tag('option',array('value' => ''),'Seleccione un aula...',true);
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
            }
    }
    public function actionDynamicOportunidades()
    {
        $data = GruExamen::model()->findAll('id_periodo=:parent_id',array(':parent_id'=>(int) $_POST['periodo']));
 
        $data = CHtml::listData($data,'id_examen','nombre');
		echo CHtml::tag('option',array('value' => ''),' ',true);
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
            }
    }
    public function actionDynamicCarreras()
    {
        $data = GruGrupos::model()->findAll('id_examen=:parent_id',array(':parent_id'=>(int) $_POST['oportunidades']));
 
        $data = CHtml::listData($data,'id_carrera','nombre');
		echo CHtml::tag('option',array('value' => ''),' ',true);
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
            }
    }
	public function actionListarAlumnosBusqueda($term){


		$sqlAlumnos="SELECT 
					    aa.id_alumno,
					    aa.no_control AS NUMERO_CONTROL,
					    Concat(nombre, ' ', ape_pat, ' ', ape_mat) AS NOMBRE
					FROM
					    alu_alumno aa
					        left join
					    gru_detalles_grupos gdg ON aa.id_alumno = gdg.id_alumno
					WHERE
					    gdg.id_alumno IS NULL
					AND Concat(aa.nombre, aa.ape_pat, aa.ape_mat) LIKE '%".$term."%'";

		
		$data=Yii::app()->db->createCommand($sqlAlumnos)->queryAll();
		
		$arr=array();

		foreach ($data as $item) {

			$arr[]=array(
				'id'=>$item['id_alumno'],
				'value'=>$item['NOMBRE'],
				'label'=>$item['NOMBRE'],
			);
		}

		echo CJSON::encode($arr);

	}
	public function actionListarLocalidades($term){


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
