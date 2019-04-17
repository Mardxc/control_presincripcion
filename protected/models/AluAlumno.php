<?php


class AluAlumno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluAlumno the static model class
	 */
	public static $estados=array(''=>'','SOLTERO'=>'SOLTERO','CASADO'=>'CASADO');
	public static $sexos=array(''=>'','M'=>'MASCULINO','F'=>'FEMENINO');
	public $varFullname;

  	public function getCompiledFullname()
    {
    	return
                $this->nombre . ' ' .
                $this->ape_pat . ' ' .
                $this->ape_mat;

    }

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alu_alumno';
	}

	public static function getEstado($key=null){
		
		if ($key!=null) {
			return self::$estados[$key];
		}
		return self::$estados;
	}
	public static function getSexo($key=null){
		
		if ($key!=null) {
			return self::$sexos[$key];
		}
		return self::$sexos;
	}

	public static function getNameLocalidad($ID_LOC){
		$LOCALIDAD=GenLocalidades::model()->find('ID='.$ID_LOC);
		return $LOCALIDAD['NOM_LOC'];
	}
	public static function getNameMunicipio($CVE_MUN){
		$MUNICIPIOS=GenMunicipios::model()->find('ID_MUN='.$CVE_MUN);
		return $MUNICIPIOS['NOM_MUN'];
	}
	public static function getNameAlumno($id_alumno){
		$Alumno=AluAlumno::model()->find('id_alumno='.$id_alumno);
		return $Alumno['nombre'] . ' ' . $Alumno['ape_pat'] . ' ' . $Alumno['ape_mat'];
	}
	public static function checarExistente($id_alumno){
		$sql="SELECT * FROM gru_detalles_grupos WHERE id_alumno=". $id_alumno ;

		$AlumnosGrupos=GruDetallesGrupos::model()->findBySql($sql);
		
		if(count($AlumnosGrupos)==1)
			return 1;
		else 
			return 0;
	}
	public static function alumnoGrupoExistente($id_alumno){
		$sql="SELECT 
			    gg.nombre
			FROM
			    gru_detalles_grupos gdg
			        INNER JOIN
			    gru_grupos gg ON gg.id_grupo = gdg.id_grupo
			WHERE
			    gdg.id_alumno =". $id_alumno ;

		$AlumnosGrupos=GruGrupos::model()->findBySql($sql);

		return $AlumnosGrupos['nombre'];
	}
	public static function getListPeriodos(){

		$sql="SELECT id_ciclo FROM bas_ciclo WHERE estado=1";
		$ciclos=basCiclo::model()->findBySql($sql);
		$id_ciclo=$ciclos['id_ciclo'];

		return CHtml::listData(basPeriodo::model()->findAll('id_ciclo='.$id_ciclo),'id_periodo','periodo');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, ape_pat, ape_mat, curp, telefono, sexo, correo, fecha_nac, lugar_nac, domicilio, cp, estado_civil, ID_MUN', 'required'),
			array('no_control', 'length', 'max'=>15),
			array('nombre, ape_pat, ape_mat, lugar_nac, colonia', 'length', 'max'=>45),
			array('curp', 'length', 'max'=>20),
			array('ID_LOC', 'numerical', 'integerOnly'=>true),
			array('telefono, estado_civil', 'length', 'max'=>10),
			array('sexo', 'length', 'max'=>1),
			array('correo', 'length', 'max'=>70),
			array('domicilio', 'length', 'max'=>60),
			array('varFullname', 'safe', 'on'=>'search'),
			array('cp', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_alumno,varFullname, no_control, nombre, ape_pat, ape_mat, curp, telefono, sexo, correo, fecha_nac, lugar_nac, domicilio, cp, estado_civil,IDE_LOC', 'safe', 'on'=>'search'),
		);
	}

	public function beforeSave()
	{
		if($this->fecha_nac <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_nac);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_nac = date ('Y-m-d', $mk2);
		}
		return parent::beforeSave();
	}

	public function afterFind ()
	{
	    if($this->fecha_nac <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_nac);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_nac = date ('d/m/Y', $mk);
	    }
	    return parent::afterFind ();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'aluDocumentacions' => array(self::HAS_MANY, 'AluDocumentacion', 'id_alumno'),
			'aluEscolares' => array(self::HAS_MANY, 'AluEscolares', 'id_alumno'),
			'aluMedicos' => array(self::HAS_MANY, 'AluMedico', 'id_alumno'),
			'aluEconomicos' => array(self::HAS_MANY, 'AluEconomicos', 'id_alumno'),
			'aluPreinscripcions' => array(self::HAS_MANY, 'AluPreinscripcion', 'id_alumno'),
			'aluTutors' => array(self::HAS_MANY, 'AluTutor', 'id_alumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_alumno' => 'CONSECUTIVO',
			'no_control' => 'NO CONTROL',
			'nombre' => 'NOMBRE',
			'ape_pat' => 'APELLIDO PATERNO',
			'ape_mat' => 'APELLIDO MATERNO',
			'curp' => 'CURP',
			'telefono' => 'TELEFONO',
			'sexo' => 'SEXO',
			'correo' => 'CORREO',
			'fecha_nac' => 'FECHA NACIMIENTO',
			'lugar_nac' => 'LUGAR NACIMIENTO',
			'domicilio' => 'DOMICILIO',
			'cp' => 'CODIGO POSTAL',
			'estado_civil' => 'ESTADO CIVIL',
			'ID_LOC' => 'LOCALIDAD',
			'ID_MUN' => 'MUNICIPIO',
			'colonia'=> 'COLONIA',
			'tiempo_residencia'=> 'tiempo_residencia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort           = new CSort;

  		$criteria->compare(
            "CONCAT(IFNULL(nombre,'',nombre),'',
             		IFNULL(ape_pat,'',ape_pat),'',
                    IFNULL(ape_mat,'',ape_mat)
            )", 
 		$this->varFullname, true);
 		
        $sort->attributes = array(
            'varFullname'=>array(
                'asc'=>"
                    CONCAT( IFNULL(nombre,''),
                            IFNULL(ape_pat,''),
                            IFNULL(ape_mat,''))
                ",
                'desc'=>"
                    CONCAT( IFNULL(nombre,''),
                            IFNULL(ape_pat,''),
                            IFNULL(ape_mat,''))
                 desc",
            ),
            '*',
        );


        $sort->defaultOrder= array(
            'id_alumno'=>CSort::SORT_ASC,
        );

	
		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('no_control',$this->no_control,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ape_pat',$this->ape_pat,true);
		$criteria->compare('ape_mat',$this->ape_mat,true);
		$criteria->compare('curp',$this->curp,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('lugar_nac',$this->lugar_nac,true);
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);

		return new CActiveDataProvider($this, array(
            'pagination'=>array('pageSize'=>20),
            'criteria'=>$criteria,
            'sort'=>$sort,
		));
	}
}