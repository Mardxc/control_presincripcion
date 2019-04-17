<?php

/**
 * This is the model class for table "sys_permisos_usuarios".
 *
 * The followings are the available columns in table 'sys_permisos_usuarios':
 * @property integer $id_usuario
 * @property integer $id_proceso
 * @property integer $id_permiso
 *
 * The followings are the available model relations:
 * @property SysUsuarios $idUsuario
 * @property SysProcesos $idProceso
 */
class SysPermisos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SysPermisos the static model class
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
		return 'sys_permisos_usuarios';
	}
	/*Procesos*/
	public static function getNameProceso($id_proceso){
		$proceso=SysProcesos::model()->find('id_proceso='.$id_proceso);
		return $proceso['etiqueta'];
	}
	public static function getListProcesos(){
		return CHtml::listData(SysProcesos::model()->findAll(),'id_proceso','etiqueta');
	}
	/*Usuarios*/
	public static function getNameUsuario($id_usuario){
		$usuario=Usuarios::model()->find('id_usuario='.$id_usuario);
		return $usuario['usuario'];
	}
	public static function getListUsuarios(){
		return CHtml::listData(Usuarios::model()->findAll(),'id_usuario','usuario');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, id_proceso', 'required'),
			array('id_usuario, id_proceso', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usuario, id_proceso, id_permiso', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'SysUsuarios', 'id_usuario'),
			'idProceso' => array(self::BELONGS_TO, 'SysProcesos', 'id_proceso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'USUARIO',
			'id_proceso' => 'PROCESO',
			'id_permiso' => 'Id Permiso',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_proceso',$this->id_proceso);
		$criteria->compare('id_permiso',$this->id_permiso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}