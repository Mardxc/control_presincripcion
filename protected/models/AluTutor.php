<?php

/**
 * This is the model class for table "alu_tutor".
 *
 * The followings are the available columns in table 'alu_tutor':
 * @property integer $id_tutor
 * @property string $nombre
 * @property string $ape_pat
 * @property string $ape_mat
 * @property string $domicilio
 * @property string $telefono
 * @property integer $id_parentesco
 * @property integer $id_alumno
 *
 * The followings are the available model relations:
 * @property AluParentesco $idParentesco
 * @property AluAlumno $idAlumno
 */
class AluTutor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AluTutor the static model class
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
		return 'alu_tutor';
	}
	public static function getIdParentesco($parentesco){
		$parentesco=AluParentesco::model()->find("parentesco='".$parentesco."'");
		return $parentesco['id_parentesco'];
	}
	public static function getNameParentesco($id_parentesco){
		$parentesco=AluParentesco::model()->find('id_parentesco='.$id_parentesco);
		return $parentesco['parentesco'];
	}
	public static function getListParentescos(){
		return CHtml::listData(AluParentesco::model()->findAll(),'id_parentesco','parentesco');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, ape_pat, ape_mat, domicilio, telefono, id_parentesco, 
				profesion, lugar_trabajo, domicilio_trabajo, telefono_trabajo, 
				jefe_inmediato, telefono_jefe_inmediato, id_alumno', 'required'),
			array('id_parentesco, id_alumno', 'numerical', 'integerOnly'=>true),
			array('nombre, ape_pat, ape_mat', 'length', 'max'=>45),
			array('domicilio', 'length', 'max'=>60),
			array('telefono', 'length', 'max'=>10),
			array('profesion', 'length', 'max'=>25),
			array('lugar_trabajo, domicilio_trabajo, jefe_inmediato', 'length', 'max'=>60),
			array('telefono_trabajo, telefono_jefe_inmediato', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tutor, nombre, ape_pat, ape_mat, 
				domicilio, telefono, id_parentesco, id_alumno', 'safe', 'on'=>'search'),
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
			'idParentesco' => array(self::BELONGS_TO, 'AluParentesco', 'id_parentesco'),
			'idAlumno' => array(self::BELONGS_TO, 'AluAlumno', 'id_alumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tutor' => 'CONSECUTIVO',
			'nombre' => 'NOMBRE',
			'ape_pat' => 'APELLIDO PATERNO',
			'ape_mat' => 'APELLIDO MATERNO',
			'domicilio' => 'DOMICILIO',
			'telefono' => 'TELEFONO',
			'id_parentesco' => 'PARENTESCO',
			'id_alumno' => 'ALUMNO',
			'profesion' => 'PROFESION',
			'lugar_trabajo' => 'LUGAR DE TRABAJO',
			'domicilio_trabajo' => 'DOMICILIO DE TRABAJO',
			'telefono_trabajo' => 'TELEFONO DE TRABAJO',
			'jefe_inmediato' => 'JEFE INMEDIATO',
			'telefono_jefe_inmediato' => 'TELEFONO DEL JEFE',
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

		$criteria->compare('id_tutor',$this->id_tutor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ape_pat',$this->ape_pat,true);
		$criteria->compare('ape_mat',$this->ape_mat,true);
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('id_parentesco',$this->id_parentesco);
		$criteria->compare('id_alumno',$this->id_alumno);

		$criteria->compare('profesion',$this->profesion);
		$criteria->compare('lugar_trabajo',$this->lugar_trabajo);
		$criteria->compare('domicilio_trabajo',$this->domicilio_trabajo);
		$criteria->compare('telefono_trabajo',$this->telefono_trabajo);
		$criteria->compare('jefe_inmediato',$this->jefe_inmediato);
		$criteria->compare('telefono_jefe_inmediato',$this->telefono_jefe_inmediato);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function listarTutor($id){
		
		$criteria=new CDbCriteria;
		$criteria->condition="id_alumno=:id";
		$criteria->params=array(':id'=>$id);
		//$criteria->limit=30;
		
		$data=InsInscripcion::model()->findAll($criteria);

		return new CActiveDataProvider($this, array(
			'keyAttribute'=>'id_tutor',
			'criteria'=>$criteria,
			//'data'=>$data,
		));

	}

}