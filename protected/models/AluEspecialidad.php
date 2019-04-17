<?php

/**
 * This is the model class for table "alu_especialidad".
 *
 * The followings are the available columns in table 'alu_especialidad':
 * @property integer $id_especialidad
 * @property string $especialidad
 */
class AluEspecialidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluEspecialidad the static model class
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
		return 'alu_especialidad';
	}

	public static function getListEspecialidad(){
		return CHtml::listData(AluEspecialidad::model()->findAll(),'id_especialidad','especialidad');
	}
	public static function getNameEspecialidad($id_especialidad){
		$especialidad=AluEspecialidad::model()->find('id_especialidad='.$id_especialidad);
		return $especialidad['especialidad'];
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('especialidad', 'required'),
			array('especialidad', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_especialidad, especialidad', 'safe', 'on'=>'search'),
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
			'id_especialidad' => 'Id Especialidad',
			'especialidad' => 'ESPECIALIDAD',
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

		$criteria->compare('id_especialidad',$this->id_especialidad);
		$criteria->compare('especialidad',$this->especialidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}