<?php

/**
 * This is the model class for table "gru_examen".
 *
 * The followings are the available columns in table 'gru_examen':
 * @property integer $id_examen
 * @property string $nombre
 * @property integer $oportunidad
 * @property string $horario
 * @property string $fecha
 * @property integer $id_periodo
 */
class GruExamen extends CActiveRecord
{
	public static $oportunidades=array(''=>'','1'=>'PRIMER','2'=>'SEGUNDA','3'=>'TERCERA');
	public static $turnos=array(''=>'','MATUTINO'=>'MATUTINO','VESPERTINO'=>'VESPERTINO');
	public static $sexos=array(''=>'','M'=>'MASCULINO','F'=>'FEMENINO');
	public static $ciclo,$edificio;

	public static function getSexo($key=null){
		
		if ($key!=null) {
			return self::$sexos[$key];
		}
		return self::$sexos;
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getOportunidad($key=null){
		
		if ($key!=null) {
			return self::$oportunidades[$key];
		}
		return self::$oportunidades;
	}
	public static function getTurnos($key=null){
		
		if ($key!=null) {
			return self::$turnos[$key];
		}
		return self::$turnos;
	}
	/*Aula*/
	
	public static function getNameAula($id_aula){
		$aula=EscAulas::model()->find('id_aula='.$id_aula);
		return $aula['aula'];
	}
	public static function getListAulas(){
		return CHtml::listData(EscAulas::model()->findAll(),'id_aula','aula');
	}
	
	/*Aula*/

	/*Ciclo*/
	public static function getNameCiclo($id_ciclo){
		$ciclo=BasCiclo::model()->find('id_ciclo='.$id_ciclo);
		return $ciclo['ciclo'];
	}
	public static function getNameCicloPeriodo($id_periodo){
		$periodo=BasPeriodo::model()->find('id_periodo='.$id_periodo);

		$ciclo=BasCiclo::model()->find('id_ciclo='.$periodo['id_ciclo']);

		return $ciclo['ciclo'];

	}
	public static function getListCiclos(){
		return CHtml::listData(BasCiclo::model()->findAll(),'id_ciclo','ciclo');
	}
	public static function getPeriodoCiclo($id_periodo){
		$ciclo=BasPeriodo::model()->find('id_periodo='.$id_periodo);
		$id_ciclo=$ciclo['id_ciclo'];
		$ciclo=BasCiclo::model()->find('id_ciclo='.$id_ciclo);
		return $ciclo['ciclo'];
	}
	/*Ciclo*/

	/*Examen*/
	public static function getNameExamen($id_examen){
		$examen=GruExamen::model()->find('id_examen='.$id_examen);
		return $examen['nombre'];
	}
	public static function getPeriodo($id_examen){
		$examen=GruExamen::model()->find('id_examen='.$id_examen);

		$periodo=BasPeriodo::model()->find('id_periodo='.$examen['id_periodo']);

		return $periodo['periodo'];
	}
	public static function getCiclo($id_examen){
		$examen=GruExamen::model()->find('id_examen='.$id_examen);

		$periodo=BasPeriodo::model()->find('id_periodo='.$examen['id_periodo']);

		$ciclo=BasCiclo::model()->find('id_ciclo='.$periodo['id_ciclo']);

		return $ciclo['ciclo'];
	}
	public static function getNameOportunidad($id_periodo){
		$examen=GruExamen::model()->find('id_periodo='.$id_periodo);
		return $examen['oportunidad'];
	}
	public static function getOportunidadExamen($id_examen){
		$examen=GruExamen::model()->find('id_examen='.$id_examen);
		return $examen['oportunidad'];
	}
	/*Examen*/

	/*Municipio*/
	public static function getNameMunicipio($ID_MUN){
		$municipios=GenMunicipios::model()->find('ID_MUN='.$ID_MUN);
		return $municipios['NOM_MUN'];
	}
	/*Municipio*/

	/*Localidad*/
	public static function getNameLocalidad($ID_LOC){
		$localidades=GenLocalidades::model()->find('ID='.$ID_LOC);
		return $localidades['NOM_LOC'];
	}
	/*Localidad*/

	/*Edificios*/
	public static function getListEdificios(){
		return CHtml::listData(EscEdificios::model()->findAll(),'id_edificio','nombre');
	}
	public static function getNameEdificio($id_aula){
		$sql="SELECT 
		    ee.nombre
		FROM
		    esc_aulas ea
		        INNER JOIN
		    esc_edificios ee ON ea.id_edificio = ee.id_edificio
		WHERE
		    ea.id_aula =" .$id_aula;

		$edificio=EscEdificios::model()->findBySql($sql);

		return $edificio['nombre'];
	}
	/*Edificios*/

	/*Periodo*/
	public static function getNamePeriodo($id_periodo){
		$periodo=BasPeriodo::model()->find('id_periodo='.$id_periodo);
		return $periodo['periodo'];
	}
	public static function getListPeriodos(){
		return CHtml::listData(BasPeriodo::model()->findAll(),'id_periodo','periodo');
	}
	public static function getListPeriodosSQL($id_ciclo){
		return CHtml::listData(BasPeriodo::model()->findAll('id_ciclo='.$id_ciclo),'id_periodo','periodo');
	}
	public static function getListPeriodosActivo(){
		$sql="SELECT id_ciclo FROM bas_ciclo WHERE estado=1";
		$id_ciclo=BasCiclo::model()->findBySql($sql);
		return CHtml::listData(BasPeriodo::model()->findAll('id_ciclo='.$id_ciclo['id_ciclo']),'id_periodo','periodo');
	}
	/*Periodo*/

	/*Escuela*/
	public static function getListEscuelas(){
		return CHtml::listData(EscEscuelas::model()->findAll(),'id_escuela','nombre');
	}
	public static function getNameEscuela($id_escuela){
		$escuela=EscEscuelas::model()->find('id_escuela='.$id_escuela);
		return $escuela['nombre'];
	}
	/*Escuela*/

	/*Carrera*/
	public static function getNameCarrera($id_carrera){
		$carrera=BasCarreras::model()->find('id_carrera='.$id_carrera);
		return $carrera['nombre'];
	}
	public static function getListCarreras(){
		return CHtml::listData(BasCarreras::model()->findAll(),'id_carrera','nombre');
	}
	/*Carrera*/

	/*Grupo*/
	public static function getNameGrupo($id_grupo){
		$grupo=GruGrupos::model()->find('id_grupo='.$id_grupo);
		return $grupo['nombre'];
	}
	/*Grupo*/
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gru_examen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, oportunidad, horario, fecha, id_periodo,tipo_examen', 'required'),
			array('oportunidad, id_periodo', 'numerical', 'integerOnly'=>true),
			//array('id_periodo'),
			array('nombre', 'length', 'max'=>45),
			array('horario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_examen, nombre, oportunidad, horario, fecha, id_periodo', 'safe', 'on'=>'search'),
		);
	}

	
	public function beforeSave()
	{
		if($this->fecha <> '')
	    {
			list($d2, $m2, $y2) = explode('/', $this->fecha);
	        $mk2=mktime(0, 0, 0, $m2, $d2, $y2);
	        $this->fecha = date ('Y-m-d', $mk2);
		}

		return parent::beforeSave();
	}
	
	public function afterFind ()
	{
	    if($this->fecha <> '')
	    {               
	        list($y, $m, $d) = explode('-', $this->fecha);
	        $mk=mktime(0, 0, 0, $m, $d, $y);
	        $this->fecha = date ('d/m/Y', $mk);
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_examen' => 'Id Examen',
			'nombre' => 'NOMBRE',
			'oportunidad' => 'OPORTUNIDAD',
			'horario' => 'HORARIO',
			'fecha' => 'FECHA',
			'id_periodo' => 'PERIODO',
			'ciclo'=>'CICLO',
			'tipo_examen'=>'TIPO DE EXAMEN',
			'edificio'=>'EDIFICIO',
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

		$criteria->compare('id_examen',$this->id_examen);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('oportunidad',$this->oportunidad);
		$criteria->compare('horario',$this->horario,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('id_periodo',$this->id_periodo);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}