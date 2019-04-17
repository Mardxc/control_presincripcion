<?php

/**
 * This is the model class for table "bas_carreras".
 *
 * The followings are the available columns in table 'bas_carreras':
 * @property integer $id_carrera
 * @property string $nombre
 * @property string $nombre_corto
 * @property string $fecha_ingreso
 * @property string $fecha_egreso
 * @property integer $id_plan
 *
 * The followings are the available model relations:
 * @property AluPreinscripcion[] $aluPreinscripcions
 * @property BasPlanEstudios $idPlan
 */
class BasCarreras extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BasCarreras the static model class
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
		return 'bas_carreras';
	}

	public static function getNamePlan($id_plan){
		$plan=BasPlanEstudios::model()->find('id_plan='.$id_plan);
		return $plan['plan_estudios'];
	}
	public static function getListPlanes(){
		return CHtml::listData(BasPlanEstudios::model()->findAll(),'id_plan','plan_estudios');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, nombre_corto, fecha_ingreso, id_plan', 'required'),
			array('id_plan', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('nombre_corto', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_carrera, nombre, nombre_corto, fecha_ingreso, fecha_egreso, id_plan', 'safe', 'on'=>'search'),
		);
	}

	public function beforeSave()
	{
		if($this->fecha_ingreso <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_ingreso);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_ingreso = date ('Y-m-d', $mk2);
		}
		if($this->fecha_egreso <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_egreso);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_egreso = date ('Y-m-d', $mk2);
		}
		return parent::beforeSave();
	}

	public function afterFind ()
	{
	    if($this->fecha_ingreso <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_ingreso);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_ingreso = date ('d/m/Y', $mk);
	    }
	    if($this->fecha_egreso <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_egreso);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_egreso = date ('d/m/Y', $mk);
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
			'aluPreinscripcions' => array(self::HAS_MANY, 'AluPreinscripcion', 'id_carrera'),
			'idPlan' => array(self::BELONGS_TO, 'BasPlanEstudios', 'id_plan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_carrera' => 'Id Carrera',
			'nombre' => 'NOMBRE',
			'nombre_corto' => 'NOMBRE CORTO',
			'fecha_ingreso' => 'FECHA DE REGISTRO',
			'fecha_egreso' => 'FECHA DE BAJA',
			'id_plan' => 'PLAN',
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

		$criteria->compare('id_carrera',$this->id_carrera);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre_corto',$this->nombre_corto,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_egreso',$this->fecha_egreso,true);
		$criteria->compare('id_plan',$this->id_plan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}