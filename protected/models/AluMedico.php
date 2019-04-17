<?php

/**
 * This is the model class for table "alu_medico".
 *
 * The followings are the available columns in table 'alu_medico':
 * @property integer $id_medico
 * @property string $tipo_sangre
 * @property integer $id_alumno
 *
 * The followings are the available model relations:
 * @property AluAlumno $idAlumno
 */
class AluMedico extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluMedico the static model class
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
		return 'alu_medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_sangre, id_alumno', 'required'),
			array('id_alumno', 'numerical', 'integerOnly'=>true),
			array('tipo_sangre', 'length', 'max'=>5),
			
			array('alergia_medicamento', 'length', 'max'=>500),
			array('nss', 'length', 'max'=>15),
			//array('esquema_vacunacion', 'integerOnly'=>true),
			array('enfermedades_importantes', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(
				'id_medico, 
				tipo_sangre, id_alumno, 
				alergia_medicamento, 
				nss, 
				enfermedades_importantes',
				'safe', 'on'=>'search'),
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
			'idAlumno' => array(self::BELONGS_TO, 'AluAlumno', 'id_alumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_medico' => 'Id Medico',
			'tipo_sangre' => 'TIPO DE SANGRE',
			'alergia_medicamento' => 'alergia_medicamento',
			'nss'=>'NSS',
			'enfermedades_importantes'=>'enfermedades_importantes',
			//'esquema_vacunacion'=>'esquema_vacunacion',
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

		$criteria->compare('id_medico',$this->id_medico);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);

		$criteria->compare('nss',$this->nss,true);
		//$criteria->compare('esquema_vacunacion',$this->esquema_vacunacion,true);
		$criteria->compare('id_alumno',$this->id_alumno);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}