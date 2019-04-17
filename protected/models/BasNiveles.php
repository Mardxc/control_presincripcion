<?php

/**
 * This is the model class for table "bas_niveles".
 *
 * The followings are the available columns in table 'bas_niveles':
 * @property integer $id_nivel
 * @property string $fecha_inicial
 * @property string $fecha_final
 * @property string $status
 * @property integer $grados
 * @property integer $grupos
 * @property integer $id_periodo
 * @property integer $id_carrera
 */
class BasNiveles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BasNiveles the static model class
	 */
	public static $estados=array(''=>'','ACTIVO'=>'ACTIVO','BAJA'=>'BAJA');
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getEstado($key=null){
		
		if ($key!=null) {
			return self::$estados[$key];
		}
		return self::$estados;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bas_niveles';
	}
	public static function getNamePeriodo($id_periodo){
		$Periodo=BasPeriodo::model()->find('id_periodo='.$id_periodo);
		return $Periodo['periodo'];
	}
	public static function getListPeriodos(){
		return CHtml::listData(BasPeriodo::model()->findAll(),'id_periodo','periodo');
	}
	public static function getNameCarrera($id_carrera){
		$Carrera=BasCarreras::model()->find('id_carrera='.$id_carrera);
		return $Carrera['nombre'];
	}
	public static function getListCarreras(){
		return CHtml::listData(BasCarreras::model()->findAll(),'id_carrera','nombre');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_inicial, fecha_final, status, grados, grupos, id_periodo, id_carrera', 'required'),
			array('grados, grupos, id_periodo, id_carrera', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_nivel, fecha_inicial, fecha_final, status, grados, grupos, id_periodo, id_carrera', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nivel' => 'Id Nivel',
			'fecha_inicial' => 'FECHA INICIAL',
			'fecha_final' => 'FECHA FINAL',
			'status' => 'STATUS',
			'grados' => 'GRADOS',
			'grupos' => 'GRUPOS',
			'id_periodo' => 'PERIODO',
			'id_carrera' => 'CARRERA',
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

		$criteria->compare('id_nivel',$this->id_nivel);
		$criteria->compare('fecha_inicial',$this->fecha_inicial,true);
		$criteria->compare('fecha_final',$this->fecha_final,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('grados',$this->grados);
		$criteria->compare('grupos',$this->grupos);
		$criteria->compare('id_periodo',$this->id_periodo);
		$criteria->compare('id_carrera',$this->id_carrera);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}