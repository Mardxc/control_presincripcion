<?php

/**
 * This is the model class for table "alu_bachillerato".
 *
 * The followings are the available columns in table 'alu_bachillerato':
 * @property integer $id_bachillerato
 * @property string $bachillerato
 */
class AluBachillerato extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluBachillerato the static model class
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
		return 'alu_bachillerato';
	}

	public static function getListBachillerato(){
		return CHtml::listData(AluBachillerato::model()->findAll(),'id_bachillerato','bachillerato');
	}
	public static function getNameBachillerato($id_bachillerato){
		$bachillerato=AluBachillerato::model()->find('id_bachillerato='.$id_bachillerato);
		return $bachillerato['bachillerato'];
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bachillerato', 'required'),
			array('bachillerato', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bachillerato, bachillerato', 'safe', 'on'=>'search'),
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
			'id_bachillerato' => 'Id Bachillerato',
			'bachillerato' => 'BACHILLERATO',
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

		$criteria->compare('id_bachillerato',$this->id_bachillerato);
		$criteria->compare('bachillerato',$this->bachillerato,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}