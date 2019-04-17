<?php

/**
 * This is the model class for table "alu_economicos".
 *
 * The followings are the available columns in table 'alu_economicos':
 * @property integer $id_economico
 * @property string $id_parentesco
 * @property string $sueldo_mensual
 * @property integer $numero_dependientes
 * @property string $empresa_trabajo
 * @property string $domicilio
 * @property string $telefono
 * @property string $turno_trabajo
 * @property string $puesto_trabajo
 * @property string $antigüedad
 * @property string $nombre_jefe_inmediato
 * @property string $turno_escuela
 * @property integer $id_alumno
 *
 * The followings are the available model relations:
 * @property AluAlumno $idAlumno
 */
class AluEconomicos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluEconomicos the static model class
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
		return 'alu_economicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parentesco, sueldo_mensual, numero_dependientes, empresa_trabajo, domicilio, turno_trabajo, puesto_trabajo, antigüedad, turno_escuela, id_alumno', 'required'),
			array('numero_dependientes, id_alumno, id_parentesco', 'numerical', 'integerOnly'=>true),
			array('empresa_trabajo, domicilio, telefono', 'length', 'max'=>45),
			array('sueldo_mensual, turno_trabajo, antigüedad, turno_escuela', 'length', 'max'=>10),
			array('puesto_trabajo', 'length', 'max'=>30),
			array('nombre_jefe_inmediato', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_economico, id_parentesco, sueldo_mensual, numero_dependientes, empresa_trabajo, domicilio, telefono, turno_trabajo, puesto_trabajo, antigüedad, nombre_jefe_inmediato, turno_escuela, id_alumno', 'safe', 'on'=>'search'),
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
			'idParentesco' => array(self::BELONGS_TO, 'AluParentesco', 'id_parentesco'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_economico' => 'Id Economico',
			'id_parentesco' => 'id_parentesco',
			'sueldo_mensual' => 'Sueldo Mensual',
			'numero_dependientes' => 'Numero Dependientes',
			'empresa_trabajo' => 'Empresa Trabajo',
			'domicilio' => 'Domicilio',
			'telefono' => 'Telefono',
			'turno_trabajo' => 'Turno Trabajo',
			'puesto_trabajo' => 'Puesto Trabajo',
			'antigüedad' => 'Antigüedad',
			'nombre_jefe_inmediato' => 'Nombre Jefe Inmediato',
			'turno_escuela' => 'Turno Escuela',
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

		$criteria->compare('id_economico',$this->id_economico);
		$criteria->compare('id_parentesco',$this->id_parentesco,true);
		$criteria->compare('sueldo_mensual',$this->sueldo_mensual,true);
		$criteria->compare('numero_dependientes',$this->numero_dependientes);
		$criteria->compare('empresa_trabajo',$this->empresa_trabajo,true);
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('turno_trabajo',$this->turno_trabajo,true);
		$criteria->compare('puesto_trabajo',$this->puesto_trabajo,true);
		$criteria->compare('antigüedad',$this->antigüedad,true);
		$criteria->compare('nombre_jefe_inmediato',$this->nombre_jefe_inmediato,true);
		$criteria->compare('turno_escuela',$this->turno_escuela,true);
		$criteria->compare('id_alumno',$this->id_alumno);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}