<?php

/**
 * This is the model class for table "gen_localidades".
 *
 * The followings are the available columns in table 'gen_localidades':
 * @property string $ID
 * @property string $CVE_ENT
 * @property string $CVE_MUN
 * @property string $CVE_LOC
 * @property string $NOM_LOC
 * @property string $AMBITO
 */
class GenLocalidades extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GenLocalidades the static model class
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
		return 'gen_localidades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CVE_ENT, CVE_MUN, CVE_LOC, NOM_LOC, AMBITO', 'required'),
			array('CVE_ENT', 'length', 'max'=>2),
			array('CVE_MUN', 'length', 'max'=>3),
			array('CVE_LOC', 'length', 'max'=>4),
			array('NOM_LOC', 'length', 'max'=>110),
			array('AMBITO', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, CVE_ENT, CVE_MUN, CVE_LOC, NOM_LOC, AMBITO', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'CVE_ENT' => 'Cve Ent',
			'CVE_MUN' => 'Cve Mun',
			'CVE_LOC' => 'Cve Loc',
			'NOM_LOC' => 'Nom Loc',
			'AMBITO' => 'Ambito',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('CVE_ENT',$this->CVE_ENT,true);
		$criteria->compare('CVE_MUN',$this->CVE_MUN,true);
		$criteria->compare('CVE_LOC',$this->CVE_LOC,true);
		$criteria->compare('NOM_LOC',$this->NOM_LOC,true);
		$criteria->compare('AMBITO',$this->AMBITO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}