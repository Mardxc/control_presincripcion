<?php

/**
 * This is the model class for table "alu_documentacion".
 *
 * The followings are the available columns in table 'alu_documentacion':
 * @property integer $id_documentacion
 * @property integer $constancia_estudios
 * @property integer $constancia_bachillerato
 * @property integer $acta_nacimiento
 * @property integer $fotografias
 * @property integer $carta_aceptado
 * @property integer $certificado_secundaria
 * @property integer $certificado_medico
 * @property integer $carta_compromiso
 * @property integer $solicitud_inscripcion
 * @property integer $id_alumno
 * @property integer $curpp
 *
 * The followings are the available model relations:
 * @property AluAlumno $idAlumno
 */
class AluDocumentacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluDocumentacion the static model class
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
		return 'alu_documentacion';
	}

	public static function trueOrFalse($value){
		if($value==="true") return 1; else return 0;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_alumno', 'required'),
			array('constancia_estudios, constancia_bachillerato,
				acta_nacimiento, fotografias, 
				carta_aceptado, certificado_secundaria, certificado_medico, 
				carta_compromiso, solicitud_inscripcion, id_alumno, curpp', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_documentacion, constancia_estudios, constancia_bachillerato, 
				acta_nacimiento, fotografias,
				caarta_aceptado, certificado_secundaria, certificado_medico,
				carta_compromiso, solicitud_inscripcion, id_alumno, curpp', 'safe', 'on'=>'search'),
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
			'id_documentacion' => 'Id Documentacion',
			'constancia_estudios' => 'CONSTANCIA DE ESTUDIOS',
			'constancia_bachillerato' => 'CONSTANCIA DE BACHILLERATO',
			'acta_nacimiento' => 'ACTA DE NACIMIENTO',
			'fotografias' => 'FOTOGRAFIAS',
			'carta_aceptado' => 'CARTA DE ACEPTACION',

			'certificado_secundaria' => 'Certificado Secundaria',
			'certificado_medico' => 'Certificado Medico',
			'carta_compromiso' => 'Carta Compromiso',
			'solicitud_inscripcion' => 'Solicitud Inscripcion',
			'id_alumno' => 'Id Alumno',
			'curpp' => 'Curpp',
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

		$criteria->compare('id_documentacion',$this->id_documentacion);
		$criteria->compare('constancia_estudios',$this->constancia_estudios);
		$criteria->compare('constancia_bachillerato',$this->constancia_bachillerato);
		$criteria->compare('acta_nacimiento',$this->acta_nacimiento);
		$criteria->compare('fotografias',$this->fotografias);
		$criteria->compare('carta_aceptado',$this->carta_aceptado);

		$criteria->compare('certificado_secundaria',$this->certificado_secundaria);
		$criteria->compare('certificado_medico',$this->certificado_medico);
		$criteria->compare('carta_compromiso',$this->carta_compromiso);
		$criteria->compare('solicitud_inscripcion',$this->solicitud_inscripcion);


		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('curpp',$this->curpp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}