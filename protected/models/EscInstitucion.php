<?php

/**
 * This is the model class for table "esc_institucion".
 *
 * The followings are the available columns in table 'esc_institucion':
 * @property integer $id_institucion
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $director
 * @property string $subdirector
 * @property string $logo
 * @property integer $CVE_MUN
 */
class EscInstitucion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EscInstitucion the static model class
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
		return 'esc_institucion';
	}

	public function beforeSave()
	{
			
		$uploadedFileLogoSep=CUploadedFile::getInstance($this,'logo_sep');   
			
		if(!empty($uploadedFileLogoSep))  // checkeamos si el archivo subido esta seteado o no
        {	
			$this->logo_sep = $uploadedFileLogoSep;
		}
				
		$uploadedFileLogoIns=CUploadedFile::getInstance($this,'logo_ins');   

		if(!empty($uploadedFileLogoIns))  // checkeamos si el archivo subido esta seteado o no
        {	
			$this->logo_ins = $uploadedFileLogoIns;
		}

		$uploadedFileLogoInf1=CUploadedFile::getInstance($this,'logo_inf1');   

		if(!empty($uploadedFileLogoInf1))  // checkeamos si el archivo subido esta seteado o no
        {	
			$this->logo_inf1 = $uploadedFileLogoInf1;
		}

		$uploadedFileLogoInf2=CUploadedFile::getInstance($this,'logo_inf2');   

		if(!empty($uploadedFileLogoInf2))  // checkeamos si el archivo subido esta seteado o no
        {	
			$this->logo_inf2 = $uploadedFileLogoInf2;
		}

		//return parent::beforeSave();
		return parent::beforeSave();
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, direccion, telefono, fax, director, subdirector, logo_inf1, logo_inf2 logo_sep, logo_ins, CVE_LOC', 'required'),
			array('CVE_LOC', 'numerical', 'integerOnly'=>true),
			array('nombre, direccion', 'length', 'max'=>45),
			array('telefono, fax', 'length', 'max'=>10),
			array('director, subdirector', 'length', 'max'=>50),
			array('logo_sep', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), 
			array('logo_ins', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('logo_inf1', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('logo_inf2', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('logo_sep', 'length', 'max'=>500),
			array('logo_ins', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_institucion, nombre, direccion, telefono, fax, director, subdirector, CVE_LOC', 'safe', 'on'=>'search'),
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
			'id_institucion' => 'Id Institucion',
			'nombre' => 'NOMBRE',
			'direccion' => 'DIRECCION',
			'telefono' => 'TELEFONO',
			'fax' => 'FAX',
			'director' => 'DIRECTOR',
			'subdirector' => 'SUBDIRECTOR',
			'logo_sep' => 'LOGO SEP',
			'logo_ins' => 'LOGO INSTITUCIONAL',
			'CVE_LOC' => 'LOCALIDAD',
			'logo_inf1'=> 'LOGO INFERIOR IZQUIERDO',
			'logo_inf2'=> 'LOGO INFERIOR DERECHO',
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

		$criteria->compare('id_institucion',$this->id_institucion);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('director',$this->director,true);
		$criteria->compare('subdirector',$this->subdirector,true);
		$criteria->compare('CVE_LOC',$this->CVE_LOC);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}