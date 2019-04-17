<?php

/**
 * This is the model class for table "gen_municipios".
 *
 * The followings are the available columns in table 'gen_municipios':
 * @property string $CVE_ENT
 * @property string $CVE_MUN
 * @property string $NOM_MUN
 * @property integer $ID_MUN
 */
class GenMunicipios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GenMunicipios the static model class
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
		return 'gen_municipios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CVE_ENT, CVE_MUN, NOM_MUN', 'required'),
			array('CVE_ENT', 'length', 'max'=>2),
			array('CVE_MUN', 'length', 'max'=>3),
			array('NOM_MUN', 'length', 'max'=>110),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CVE_ENT, CVE_MUN, NOM_MUN, ID_MUN', 'safe', 'on'=>'search'),
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
			'CVE_ENT' => 'Cve Ent',
			'CVE_MUN' => 'Cve Mun',
			'NOM_MUN' => 'Nom Mun',
			'ID_MUN' => 'Id Mun',
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

		$criteria->compare('CVE_ENT',$this->CVE_ENT,true);
		$criteria->compare('CVE_MUN',$this->CVE_MUN,true);
		$criteria->compare('NOM_MUN',$this->NOM_MUN,true);
		$criteria->compare('ID_MUN',$this->ID_MUN);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}