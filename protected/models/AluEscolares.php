<?php

/**
 * This is the model class for table "alu_escolares".
 *
 * The followings are the available columns in table 'alu_escolares':
 * @property integer $id_escolar
 * @property string $promedio
 * @property string $bachillerato
 * @property string $especialidad
 * @property string $tipo_bachillerato
 * @property integer $id_escuela
 * @property integer $id_alumno
 *
 * The followings are the available model relations:
 * @property AluAlumno $idAlumno
 * @property EscEscuela $idEscuela
 */
class AluEscolares extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluEscolares the static model class
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
		return 'alu_escolares';
	}

	public static function getIdEscuela($escuela){
		$escuela=EscEscuelas::model()->find("nombre='".$escuela."'");
		return $escuela['id_escuela'];
	}
	public static function getIdBachillerato($bachillerato){
		$bachillerato=AluBachillerato::model()->find("bachillerato='".$bachillerato."'");
		return $bachillerato['id_bachillerato'];
	}
	public static function getIdEspecialidad($especialidad){
		$especialidad=AluEspecialidad::model()->find("especialidad='".$especialidad."'");
		return $especialidad['id_especialidad'];
	}
	public static function getIdTipoBachillerato($tipo_bachillerato){
		$tipoBachillerato=AluTipoBachillerato::model()->find("tipo_bachillerato='".$tipo_bachillerato."'");
		return $tipoBachillerato['id_tipo_bachillerato'];
	}
	public static function getNameEscuela($id_escuela){
		$escuela=EscEscuelas::model()->find('id_escuela='.$id_escuela);
		return $escuela['nombre'];
	}
	public static function getListEscuelas(){
		return CHtml::listData(EscEscuelas::model()->findAll(),'id_escuela','nombre');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promedio, id_bachillerato, id_especialidad, id_tipo_bachillerato, id_escuela, id_alumno', 'required'),
			array('id_escuela, id_alumno', 'numerical', 'integerOnly'=>true),
			array('promedio', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_escolar, promedio, id_bachillerato, id_especialidad, id_tipo_bachillerato, id_escuela, id_alumno', 'safe', 'on'=>'search'),
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
			'idEscuela' => array(self::BELONGS_TO, 'EscEscuela', 'id_escuela'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_escolar' => 'Id Escolar',
			'promedio' => 'PROMEDIO',
			'id_bachillerato' => 'BACHILLERATO',
			'id_especialidad' => 'ESPECIALIDAD',
			'id_tipo_bachillerato' => 'TIPO DE BACHILLERATO',
			'id_escuela' => 'ESCUELA',
			'id_alumno' => 'ALUMNO',
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

		$criteria->compare('id_escolar',$this->id_escolar);
		$criteria->compare('promedio',$this->promedio,true);
		$criteria->compare('id_bachillerato',$this->bachillerato,true);
		$criteria->compare('id_especialidad',$this->especialidad,true);
		$criteria->compare('id_tipo_bachillerato',$this->tipo_bachillerato,true);
		$criteria->compare('id_escuela',$this->id_escuela);
		$criteria->compare('id_alumno',$this->id_alumno);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}