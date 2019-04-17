<script>
	$(document).ready(function(){

		$('#escuelas').change(function(){
			$('#escuela').val($("#escuelas option:selected").text());
		});
		$('#bachilleratos').change(function(){
			$('#bachillerato').val($("#bachilleratos option:selected").text());
		});
		$('#especialidades').change(function(){
			$('#especialidad').val($("#especialidades option:selected").text());
		});
		$('#tipo_bachilleratos').change(function(){
			$('#tipo_bachillerato').val($("#tipo_bachilleratos option:selected").text());
		});
	});
	function fijarDatos() {
		var bachillerato=$('#bachillerato').val();
		var especialidad=$('#especialidad').val();
		var tipo_bachillerato=$('#tipo_bachillerato').val();
		var escuela=$('#escuela').val();

		$('#bachilleratos option').each(function(){
			if ($(this).text() == bachillerato)
				$(this).attr('selected','selected');
		});

		$('#especialidades option').each(function(){
			if ($(this).text() == especialidad)
				$(this).attr('selected','selected');
		});

		$('#tipo_bachilleratos option').each(function(){
			if ($(this).text() == tipo_bachillerato)
				$(this).attr('selected','selected');
		});

		$('#escuelas option').each(function(){
			if ($(this).text() == escuela)
				$(this).attr('selected','selected');
		});
	}
	function guardarEscolar(){
		var guarda=$('#guardarEscolares').val();
		var id_alumno=$('#id_alumno').val();

		var promedio=$('#promedio').val() ;
		var bachillerato=$('#bachilleratos').val() ;
		var especialidad=$('#especialidades').val() ;
		var tipo_bachillerato=$('#tipo_bachilleratos').val() ;
		var escuela=$('#escuela').val() ;
				
		if(promedio=='' || bachillerato=='' || especialidad=='' || 
			tipo_bachillerato=='' || escuela==''){
			alert('Verifique que la información escolar del alumno este completa')
		}else{
			<?php echo CHtml::ajax(array(
			    'url'=>array('aluEscolares/guardar'),
			    'data'=> array(
			        'id_alumno'=>'js:id_alumno',
			        'promedio'=>"js:promedio",
			        'bachillerato'=>"js:bachillerato",
			        'especialidad'=>"js:especialidad",
			        'tipo_bachillerato'=>"js:tipo_bachillerato",
			        'escuela'=>"js:escuela",
			        'guarda'=>"js:guarda"
			    ),
			    'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	
			        $.each(data.datos,function(key,value){
						$('#key').val(value) ;
			    	});
				
					alert('Los datos escolares del alumno han sido guardados');

			    	if(data.status=='guardar' && data.id_escolar==0){
						$('#guardar').html('Actualizar');
						$('#guardar').val('actualizar');
			    	}
			    } "
			    ))
			?>;
			return false; 			
		}		
	}
	function cambia(){
		alert('cambio');
	}
</script>
<style>
	#promedio,#tipo_sangre,#discapacidad,#nombre,#ape_pat,#ape_mat,#domicilio,#telefono,#parentescos{
		width: 45%;
	}
</style>
<?php  
	if (isset($model->id_alumno))  {
		$id_alumno=$model->id_alumno;
		$promedio=$model->promedio;
		$bachillerato=aluBachillerato::getNameBachillerato($model->id_bachillerato);
		$especialidad=aluEspecialidad::getNameEspecialidad($model->id_especialidad);
		$tipo_bachillerato=aluTipoBachillerato::getNameTipoBachillerato($model->id_tipo_bachillerato);
		$escuela=aluEscolares::getNameEscuela($model->id_escuela);
	} else{ 
		$id_alumno=$id;
		$promedio='';
		$bachillerato='';
		$especialidad='';
		$tipo_bachillerato='';
		$escuela='';
	}
?>

<?php echo CHtml::textField('id_alumno',$id_alumno,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('bachillerato',$bachillerato,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('especialidad',$especialidad,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('tipo_bachillerato',$tipo_bachillerato,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('escuela',$escuela,array('style'=>'display:none;')); ?>

<table class="table table-condensed">
	<tr>
		<td>
			Escuela
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'escuelas',
					'', 
	              	aluEscolares::getListEscuelas(),
	              	array('empty' => 'Selecciona una Escuela','style'=>'width:45%')
	              	
	             );
			?>
				<a  onclick="mensajeAdvertencia('mensajeEscuela',
				'Para registrar una escuela nueva seleccionar el módulo->escuela proceso->escuela')"
				 id="mensajeEscuela" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;
				 cursor:hand;"></a>
		</td>
	</tr>	
	<tr>
		<td>
			Bachillerato
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'bachilleratos',
					'', 
	              	aluBachillerato::getListBachillerato(),
	              	array('empty' => 'Seleccione el Bachillerato','style'=>'width:45%')
	              	
	             );
			?>
		    <?php echo CHtml::Button('+',
		    	array('onclick'=>
		    		'AddBachillerato();
		    		$("#dialogBachillerato").dialog("open");'
		    	),
		    	array('style'=>'color:red;')
		    ); ?>
		</td>
	</tr>
	<tr>
		<td>
			Tipo Bachillerato
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'tipo_bachilleratos',
					'', 
	              	aluTipoBachillerato::getListTipoBachillerato(),
	              	array('empty' => 'Seleccione Tipo de Bachillerato','style'=>'width:45%')
	              	
	             );
			?>
		    <?php echo CHtml::Button('+',
		    	array('onclick'=>
		    		'AddTipoBachillerato();
		    		$("#dialogTipoBachillerato").dialog("open");'
		    	),
		    	array('style'=>'color:red;')
		    ); ?>
		</td>
	</tr>
	<tr>
		<td>
			Especialidad
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'especialidades',
					'', 
	              	aluEspecialidad::getListEspecialidad(),
	              	array('empty' => 'Seleccione la Especialidad','style'=>'width:45%')
	              	
	             );
			?>
		    <?php echo CHtml::Button('+',
		    	array('onclick'=>
		    		'AddEspecialidad();
		    		$("#dialogEspecialidad").dialog("open");'
		    	),
		    	array('style'=>'color:red;')
		    ); ?>
		</td>
	</tr>
	<tr>
		<td>
			Promedio
		</td>
		<td>
			<?php echo CHtml::textField(
				'promedio',
				$promedio,
				array('onblur'=>'vacios("promedio","Falta el Promedio")','onkeyup'=>'decimales("promedio")'),
				array('id'=>'promedio','maxlength'=>3,'style'=>'width:45%')); ?>
		</td>
	</tr>



	<tr>
		<td align="center" colspan="2">
			<div class="alert alert-danger">
				Presione registrar para crear los datos escolares del alumno y actualizar para realizar cambios
			</div>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<?php if(!isset($model->id_escolar)) { ?>
				<button id="guardarEscolares" class="btn btn-success" value="guardar" onclick="guardarEscolar()">Guardar</button>
			<?php } else { ?>
				<button id="guardarEscolares" class="btn btn-success" value="actualizar" onclick="guardarEscolar()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>

<!--Bachillerato-->

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'dialogBachillerato',
    'options'=>array(
        'title'=>'Crear Bachillerato',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>400,
        'height'=>350,
        'resizable'=>false,
        'position' => '{my:"bottom", at: "center", of:button}',
       // 'buttons'=>array('Cancelar'=>'js:function(){$(this).dialog("close");}',),
    ),
));?>
<div class="divForForm"></div>

<?php $this->endWidget();?>
 
<script type="text/javascript">
    function AddBachillerato()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('aluBachillerato/create'),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogBachillerato div.divForForm').html(data.div);
                        $('#dialogBachillerato div.divForForm form').submit(AddBachillerato);
                    }
                    else
                    {
                        $('#dialogBachillerato div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogBachillerato').dialog('close') \",100);
                        
                        $('#bachilleratos').empty();
						$.each(data.datosBachillerato, function(value,key) {
						  $('#bachilleratos').append($('<option></option>')
						     .attr('value', value).text(key));
						});
                    }
     
                } ",
                ))
        ?>;
        return false; 
    }   
</script>

<!--Bachillerato-->

<!--Especialidad-->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'dialogEspecialidad',
    'options'=>array(
        'title'=>'Crear Especialidad',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>400,
        'height'=>350,
        'resizable'=>false,
        'position' => '{my:"bottom", at: "center", of:button}',
       // 'buttons'=>array('Cancelar'=>'js:function(){$(this).dialog("close");}',),
    ),
));?>
<div class="divForForm"></div>

<?php $this->endWidget();?>
 
<script type="text/javascript">
    function AddEspecialidad()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('aluEspecialidad/create'),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogEspecialidad div.divForForm').html(data.div);
                        $('#dialogEspecialidad div.divForForm form').submit(AddEspecialidad);
                    }
                    else
                    {
                        $('#dialogEspecialidad div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogEspecialidad').dialog('close') \",100);
                        
                        $('#especialidades').empty();
						$.each(data.datosEspecialidad, function(value,key) {
						  $('#especialidades').append($('<option></option>')
						     .attr('value', value).text(key));
						});
                    }
     
                } ",
                ))
        ?>;
        return false; 
    }   
</script>
<!--Especialidad-->


<!--Tipo Bachillerato-->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'dialogTipoBachillerato',
    'options'=>array(
        'title'=>'Crear Tipo de Bachillerato',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>400,
        'height'=>350,
        'resizable'=>false,
        'position' => '{my:"bottom", at: "center", of:button}',
       // 'buttons'=>array('Cancelar'=>'js:function(){$(this).dialog("close");}',),
    ),
));?>
<div class="divForForm"></div>

<?php $this->endWidget();?>
 
<script type="text/javascript">
    function AddTipoBachillerato()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('aluTipoBachillerato/create'),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogTipoBachillerato div.divForForm').html(data.div);
                        $('#dialogTipoBachillerato div.divForForm form').submit(AddTipoBachillerato);
                    }
                    else
                    {
                        $('#dialogTipoBachillerato div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogTipoBachillerato').dialog('close') \",100);
                        
                        $('#tipo_bachilleratos').empty();
						$.each(data.datosTipoBachillerato, function(value,key) {
						  $('#tipo_bachilleratos').append($('<option></option>')
						     .attr('value', value).text(key));
						});
                    }
     
                } ",
                ))
        ?>;
        return false; 
    }   
</script>
<!--Tipo Bachillerato-->

<script> fijarDatos();</script>