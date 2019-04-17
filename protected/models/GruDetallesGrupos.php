<?php

/**
 * This is the model class for table "gru_detalles_grupos".
 *
 * The followings are the available columns in table 'gru_detalles_grupos':
 * @property integer $id_detalles_grupos
 * @property integer $id_alumno
 * @property integer $id_grupo
 */
class GruDetallesGrupos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GruDetallesGrupos the static model class
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
		return 'gru_detalles_grupos';
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
			array('id_alumno, id_grupo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_detalles_grupos, id_alumno, id_grupo', 'safe', 'on'=>'search'),
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
			'id_detalles_grupos' => 'Id Detalles Grupos',
			'id_alumno' => 'Id Alumno',
			'id_grupo' => 'Id Grupo',
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

		$criteria->compare('id_detalles_grupos',$this->id_detalles_grupos);
		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('id_grupo',$this->id_grupo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}