<?php

/**
 * This is the model class for table "esc_escuela".
 *
 * The followings are the available columns in table 'esc_escuela':
 * @property integer $id_escuela
 * @property string $nombre
 * @property string $calle
 * @property integer $num
 * @property string $telefono
 * @property string $email
 * @property string $CVE_MUN
 *@property string $ID_LOC
 * The followings are the available model relations:
 * @property AluEscolares[] $aluEscolares
 */
class EscEscuelas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EscEscuelas the static model class
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
		return 'esc_escuela';
	}

	public static function getNameMunicipio($ID_MUNICIPIO){
		$MUNICIPIO=GenMunicipios::model()->find('ID_MUN='.$ID_MUNICIPIO);
		return $MUNICIPIO['NOM_MUN'];
	}

	public static function getNameLocalidad($ID_LOCALIDAD){
		$LOCALIDAD=GenLocalidades::model()->find('ID='.$ID_LOCALIDAD);
		return $LOCALIDAD['NOM_LOC'];
	}
	public static function getListMunicipios(){
		return CHtml::listData(GenMunicipios::model()->findAll(),'ID_MUN','NOM_MUN');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, calle, num, telefono, email, ID_MUN', 'required'),
			array('ID_LOC', 'numerical', 'integerOnly'=>true),
			array('num','length','max'=>10),
			array('nombre, calle', 'length', 'max'=>45),
			array('telefono', 'length', 'max'=>10),
			array('email', 'length', 'max'=>70),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_escuela, nombre, calle, num, telefono, email, ID_MUN, ID_LOC', 'safe', 'on'=>'search'),
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
			'aluEscolares' => array(self::HAS_MANY, 'AluEscolares', 'id_escuela'),
			'GenLocalidades' => array(self::HAS_ONE, 'GenLocalidades', 'ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_escuela' => 'Id Escuela',
			'nombre' => 'NOMBRE',
			'calle' => 'CALLE',
			'num' => 'NUMERO',
			'telefono' => 'TELEFONO',
			'email' => 'EMAIL',
			'ID_MUN' => 'MUNICIPIO',
			'ID_LOC'=>'LOCALIDAD',
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

		$criteria->compare('id_escuela',$this->id_escuela);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('num',$this->num);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ID_MUN',$this->ID_MUN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}