<?php

/**
 * This is the model class for table "bas_periodo".
 *
 * The followings are the available columns in table 'bas_periodo':
 * @property integer $id_periodo
 * @property string $periodo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_ciclo
 */
class BasPeriodo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BasPeriodo the static model class
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
		return 'bas_periodo';
	}

	public static function getNameCiclo($id_ciclo){
		$ciclo=BasCiclo::model()->find('id_ciclo='.$id_ciclo);
		return $ciclo['ciclo'];
	}

	public static function getListCiclos(){
		return CHtml::listData(BasCiclo::model()->findAll(),'id_ciclo','ciclo');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periodo, fecha_inicio, fecha_fin, id_ciclo', 'required'),
			array('id_ciclo', 'numerical', 'integerOnly'=>true),
			array('periodo', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_periodo, periodo, fecha_inicio, fecha_fin, id_ciclo', 'safe', 'on'=>'search'),
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

	public function beforeSave()
	{
		if($this->fecha_inicio <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_inicio);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_inicio = date ('Y-m-d', $mk2);
		}
		if($this->fecha_fin <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_fin);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_fin = date ('Y-m-d', $mk2);
		}
		return parent::beforeSave();
	}
	
	public function afterFind ()
	{
	    if($this->fecha_inicio <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_inicio);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_inicio = date ('d/m/Y', $mk);
	    }
	    if($this->fecha_fin <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_fin);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_fin = date ('d/m/Y', $mk);
	    }
	    return parent::afterFind ();
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_periodo' => 'Id Periodo',
			'periodo' => 'PERIODO',
			'fecha_inicio' => 'FECHA DE INICIO',
			'fecha_fin' => 'FECHA DE FIN',
			'id_ciclo' => 'CICLO',
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

		$criteria->compare('id_periodo',$this->id_periodo);
		$criteria->compare('periodo',$this->periodo,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_ciclo',$this->id_ciclo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}