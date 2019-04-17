<?php

/**
 * This is the model class for table "gru_examen_alumno".
 *
 * The followings are the available columns in table 'gru_examen_alumno':
 * @property integer $id_gru_examen_alumno
 * @property integer $folio_ceneval
 * @property integer $id_alumno
 */
class GruExamenAlumno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GruExamenAlumno the static model class
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
		return 'gru_examen_alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folio_ceneval, id_alumno', 'required'),
			array('folio_ceneval, id_alumno, version', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_gru_examen_alumno, folio_ceneval, id_alumno', 'safe', 'on'=>'search'),
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
			'id_gru_examen_alumno' => 'Id Gru Examen Alumno',
			'folio_ceneval' => 'Folio Ceneval',
			'id_alumno' => 'Id Alumno',
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

		$criteria->compare('id_gru_examen_alumno',$this->id_gru_examen_alumno);
		$criteria->compare('folio_ceneval',$this->folio_ceneval);
		$criteria->compare('id_alumno',$this->id_alumno);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}