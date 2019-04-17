<?php

/**
 * This is the model class for table "bas_plan_estudios".
 *
 * The followings are the available columns in table 'bas_plan_estudios':
 * @property integer $id_plan
 * @property string $plan_estudios
 * @property string $doc_autorizacion
 * @property integer $creditos_optativos
 * @property integer $creditos_totales
 * @property string $estado
 * @property string $reticula
 * @property string $fecha_alta
 * @property string $carga_max_creditos
 * @property string $carga_min_creditos
 *
 * The followings are the available model relations:
 * @property BasCarreras[] $basCarrerases
 */
class BasPlanEstudios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BasPlanEstudios the static model class
	 */
	public static $estado=array(''=>'','VIGENTE'=>'VIGENTE','LIQUIDADO'=>'LIQUIDADO');
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bas_plan_estudios';
	}
	public static function getEstado($key=null){
		
		if ($key!=null) {
			return self::$estado[$key];
		}
		return self::$estado;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plan_estudios, doc_autorizacion, creditos_optativos, creditos_totales, estado, reticula, fecha_alta', 'required'),
			array('creditos_optativos, creditos_totales', 'numerical', 'integerOnly'=>true),
			array('plan_estudios, doc_autorizacion', 'length', 'max'=>45),
			array('estado, reticula', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_plan, plan_estudios, doc_autorizacion, creditos_optativos, creditos_totales, estado, reticula, fecha_alta, carga_max_creditos, carga_min_creditos', 'safe', 'on'=>'search'),
		);
	}
	public function beforeSave()
	{
		if($this->fecha_alta <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha_alta);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha_alta = date ('Y-m-d', $mk2);
		}
		return parent::beforeSave();
	}

	public function afterFind ()
	{
	    if($this->fecha_alta <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha_alta);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha_alta = date ('d/m/Y', $mk);
	    }
	    return parent::afterFind ();
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'basCarrerases' => array(self::HAS_MANY, 'BasCarreras', 'id_plan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_plan' => 'Id Plan',
			'plan_estudios' => 'PLAN DE ESTUDIOS',
			'doc_autorizacion' => 'DOCUMENTO DE AUTORIZACION',
			'creditos_optativos' => 'CREDITOS OPTATIVOS',
			'creditos_totales' => 'CREDITOS TOTALES',
			'estado' => 'ESTADO',
			'reticula' => 'RETICULA',
			'fecha_alta' => 'FECHA ALTA',
			'carga_max_creditos' => 'CARGA MAXIMA DE CREDITOS',
			'carga_min_creditos' => 'CARGA MINIMA DE CREDITOS',
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

		$criteria->compare('id_plan',$this->id_plan);
		$criteria->compare('plan_estudios',$this->plan_estudios,true);
		$criteria->compare('doc_autorizacion',$this->doc_autorizacion,true);
		$criteria->compare('creditos_optativos',$this->creditos_optativos);
		$criteria->compare('creditos_totales',$this->creditos_totales);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('reticula',$this->reticula,true);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('carga_max_creditos',$this->carga_max_creditos,true);
		$criteria->compare('carga_min_creditos',$this->carga_min_creditos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}