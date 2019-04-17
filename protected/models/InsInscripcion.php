<?php

/**
 * This is the model class for table "ins_inscripcion".
 *
 * The followings are the available columns in table 'ins_inscripcion':
 * @property integer $id_inscripcion
 * @property string $fecha_inicial
 * @property string $fecha_final
 * @property integer $semestre
 * @property integer $status
 * @property integer $id_alumno
 * @property integer $id_carrera
 * @property integer $id_periodo
 *
 * The followings are the available model relations:
 * @property AluAlumno $idAlumno
 */
class InsInscripcion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InsInscripcion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ins_inscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semestre, id_alumno, id_carrera, id_periodo, id_ciclo', 'numerical', 'integerOnly'=>true),
			//array('status', 'length', 'max'=>10),
			array('fecha_inicial, fecha_final', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_inscripcion, fecha_inicial, fecha_final, semestre, status, id_alumno, id_carrera, id_periodo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idAlumno' => array(self::BELONGS_TO, 'AluAlumno', 'id_alumno'),
			'idCiclo' => array(self::BELONGS_TO, 'AluAlumno', 'id_ciclo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inscripcion' => 'CONSECUTIVO',
			'fecha_inicial' => 'Fecha Inicial',
			'fecha_final' => 'Fecha Final',
			'semestre' => 'Semestre',
			'status' => 'Status',
			'id_alumno' => 'Id Alumno',
			'id_carrera' => 'Carrera',
			'id_periodo' => 'Periodo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('fecha_inicial',$this->fecha_inicial,true);
		$criteria->compare('fecha_final',$this->fecha_final,true);
		$criteria->compare('semestre',$this->semestre);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('id_carrera',$this->id_carrera);
		$criteria->compare('id_periodo',$this->id_periodo);
		//$criteria->addInCondition('id_alumno',array($id));

		//$criteria = InsInscripcion::model()->findAll($criteria);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if($this->fecha_inicial <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_inicial);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_inicial = date ('Y-m-d', $mk2);
		}

		if($this->fecha_final <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_final);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_final = date ('Y-m-d', $mk2);
		}
		return parent::beforeSave();
	}

	public function afterFind ()
	{
	    if($this->fecha_inicial <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_inicial);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_inicial = date ('d/m/Y', $mk);
	    }

	    if($this->fecha_final <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_final);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_final = date ('d/m/Y', $mk);
	    }
	    return parent::afterFind ();
	}

	public function listarPeriodos($id){
		
		$criteria=new CDbCriteria;
		$criteria->condition="id_alumno=:id";
		$criteria->params=array(':id'=>$id);
		$criteria->order="semestre";
		//$criteria->limit=30;
		
		$data=InsInscripcion::model()->findAll($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			//'data'=>$data,
		));

	}

	public static function getNamePeriodo($id_periodo){
		$periodo=BasPeriodo::model()->find('id_periodo='.$id_periodo);
		return $periodo['periodo'];
	}

	public static function getNameCarrera($id_carrera){
		$carrera=BasCarreras::model()->find('id_carrera='.$id_carrera);
		return $carrera['nombre'];
	}

	public static function getCarreraInscrita($id_alumno){
		$sql="SELECT 
			    bc.nombre
			FROM
			    bas_carreras bc
			INNER JOIN
				ins_inscripcion ii ON ii.id_carrera = bc.id_carrera
			WHERE
			    ii.id_alumno='$id_alumno';";

		$carreraIns=BasCarreras::model()->findBySql($sql);

		return $carreraIns['nombre'];
	}

	public static function getNameCiclo($id_ciclo){
		$ciclo=BasCiclo::model()->find('id_ciclo='.$id_ciclo);
		return $ciclo['estado'];
	}

	public static function getFechaCiclo($id_ciclo){
		$fecha=BasCiclo::model()->find('id_ciclo='.$id_ciclo);
		return $fecha['ciclo'];
	}

	public static function getCicloValido()
	{
		$sql="SELECT 
			    bc.id_ciclo
			FROM
			    bas_ciclo bc
			WHERE
			    bc.estado =1";

		$cicloFound=BasCiclo::model()->findBySql($sql);

		return $cicloFound['id_ciclo'];
	}

	public static function getSemestre($id_alumno)
	{
		$sql="SELECT 
			semestre
		FROM 
			ins_inscripcion ii
		##INNER JOIN
		##	bas_carreras bc ON ii.id_carrera=bc.id_carrera
		WHERE 
			id_alumno='$id_alumno'
			ORDER BY semestre DESC;";

		$semestre=InsInscripcion::model()->findBySql($sql);
		return $semestre['semestre'];
		//if ($semestre['semestre']!='') {
		//}else{
		//	return 0;
		//}
	}

	public static function getListCarreras(){
		return CHtml::listData(BasCarreras::model()->findAll(),'id_carrera','nombre');
	}

}