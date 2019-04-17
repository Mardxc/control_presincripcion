<?php

/**
 * This is the model class for table "esc_edificios".
 *
 * The followings are the available columns in table 'esc_edificios':
 * @property integer $id_edificio
 * @property string $nombre
 * @property string $area
 * @property integer $id_institucion
 */
class EscEdificios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EscEdificios the static model class
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
		return 'esc_edificios';
	}

	public static function getNameInstitucion($id_institucion){
		$Institucion=EscInstitucion::model()->find('id_institucion='.$id_institucion);
		return $Institucion['nombre'];
	}

	public static function getListInstituciones(){
		return CHtml::listData(EscInstitucion::model()->findAll(),'id_institucion','nombre');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, area, id_institucion', 'required'),
			array('id_institucion', 'numerical', 'integerOnly'=>true),
			array('nombre, area', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_edificio, nombre, area, id_institucion', 'safe', 'on'=>'search'),
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
			'id_edificio' => 'Id Edificio',
			'nombre' => 'NOMBRE',
			'area' => 'AREA',
			'id_institucion' => 'INSTITUCION',
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

		$criteria->compare('id_edificio',$this->id_edificio);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('id_institucion',$this->id_institucion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}