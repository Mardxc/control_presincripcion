<?php

/**
 * This is the model class for table "alu_tipo_bachillerato".
 *
 * The followings are the available columns in table 'alu_tipo_bachillerato':
 * @property integer $id_tipo_bachillerato
 * @property string $tipo_bachillerato
 */
class AluTipoBachillerato extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluTipoBachillerato the static model class
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
		return 'alu_tipo_bachillerato';
	}

	public static function getListTipoBachillerato(){
		return CHtml::listData(AluTipoBachillerato::model()->findAll(),'id_tipo_bachillerato','tipo_bachillerato');
	}
	public static function getNameTipoBachillerato($id_tipo_bachillerato){
		$tipo_bachillerato=AluTipoBachillerato::model()->find('id_tipo_bachillerato='.$id_tipo_bachillerato);
		return $tipo_bachillerato['tipo_bachillerato'];
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_bachillerato', 'required'),
			array('tipo_bachillerato', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipo_bachillerato, tipo_bachillerato', 'safe', 'on'=>'search'),
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
			'id_tipo_bachillerato' => 'Id Tipo Bachillerato',
			'tipo_bachillerato' => 'TIPO DE BACHILLERATO',
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

		$criteria->compare('id_tipo_bachillerato',$this->id_tipo_bachillerato);
		$criteria->compare('tipo_bachillerato',$this->tipo_bachillerato,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}