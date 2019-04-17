<?php

/**
 * This is the model class for table "sys_procesos".
 *
 * The followings are the available columns in table 'sys_procesos':
 * @property integer $id_proceso
 * @property string $tipo
 * @property string $proceso
 * @property string $etiqueta
 * @property string $link
 * @property integer $id_modulo
 *
 * The followings are the available model relations:
 * @property SysPermisosUsuarios[] $sysPermisosUsuarioses
 * @property SysModulos $idModulo
 */
class SysProcesos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SysProcesos the static model class
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
		return 'sys_procesos';
	}

	public static function getNameModulo($id_modulo){
		$MODULO=SysModulos::model()->find('id_modulo='.$id_modulo);
		return $MODULO['modulo'];
	}
	public static function getListModulos(){
		return CHtml::listData(SysModulos::model()->findAll(),'id_modulo','modulo');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, proceso, etiqueta, link, id_modulo', 'required'),
			array('id_modulo', 'numerical', 'integerOnly'=>true),
			array('tipo, etiqueta', 'length', 'max'=>50),
			array('proceso', 'length', 'max'=>120),
			array('link', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_proceso, tipo, proceso, etiqueta, link, id_modulo', 'safe', 'on'=>'search'),
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
			'sysPermisosUsuarioses' => array(self::HAS_MANY, 'SysPermisosUsuarios', 'id_proceso'),
			'idModulo' => array(self::BELONGS_TO, 'SysModulos', 'id_modulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_proceso' => 'Id Proceso',
			'tipo' => 'TIPO',
			'proceso' => 'PROCESO',
			'etiqueta' => 'ETIQUETA',
			'link' => 'LINK',
			'id_modulo' => 'MODULO',
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

		$criteria->compare('id_proceso',$this->id_proceso);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('proceso',$this->proceso,true);
		$criteria->compare('etiqueta',$this->etiqueta,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('id_modulo',$this->id_modulo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}