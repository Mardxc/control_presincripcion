<?php

/**
 * This is the model class for table "alu_preinscripcion".
 *
 * The followings are the available columns in table 'alu_preinscripcion':
 * @property integer $id_aspirante
 * @property string $folio_aspirante
 * @property string $folio_exani
 * @property string $fecha
 * @property integer $id_alumno
 * @property integer $id_carrera
 *
 * The followings are the available model relations:
 * @property AluAlumno $idAlumno
 * @property BasCarreras $idCarrera
 */
class AluPreinscripcion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluPreinscripcion the static model class
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
		return 'alu_preinscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folio_aspirante, folio_exani, fecha, id_alumno, id_carrera', 'required'),
			array('id_alumno, id_carrera', 'numerical', 'integerOnly'=>true),
			array('folio_aspirante, folio_exani', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_aspirante, folio_aspirante, folio_exani, fecha, id_alumno, id_carrera', 'safe', 'on'=>'search'),
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
			'idCarrera' => array(self::BELONGS_TO, 'BasCarreras', 'id_carrera'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_aspirante' => 'Id Aspirante',
			'folio_aspirante' => 'Folio Aspirante',
			'folio_exani' => 'Folio Exani',
			'fecha' => 'Fecha',
			'id_alumno' => 'Id Alumno',
			'id_carrera' => 'Id Carrera',
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

		$criteria->compare('id_aspirante',$this->id_aspirante);
		$criteria->compare('folio_aspirante',$this->folio_aspirante,true);
		$criteria->compare('folio_exani',$this->folio_exani,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('id_carrera',$this->id_carrera);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}