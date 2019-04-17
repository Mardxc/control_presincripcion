<?php

/**
 * This is the model class for table "alu_parentesco".
 *
 * The followings are the available columns in table 'alu_parentesco':
 * @property integer $id_parentesco
 * @property string $parentesco
 *
 * The followings are the available model relations:
 * @property AluTutor[] $aluTutors
 */
class AluParentesco extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluParentesco the static model class
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
		return 'alu_parentesco';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parentesco', 'required'),
			array('parentesco', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_parentesco, parentesco', 'safe', 'on'=>'search'),
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
			'aluTutors' => array(self::HAS_MANY, 'AluTutor', 'id_parentesco'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_parentesco' => 'Id Parentesco',
			'parentesco' => 'PARENTESCO',
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

		$criteria->compare('id_parentesco',$this->id_parentesco);
		$criteria->compare('parentesco',$this->parentesco,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}