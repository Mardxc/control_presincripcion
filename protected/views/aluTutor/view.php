<script>
	function guardaTutor(){
		var guarda=$('#guardaTutor').val();
		var id_tutor=$('#id_tutor').val();
		var id_alumno=$('#id_alumno').val();

		var nombre=$('#nombre_t').val() ;
		var ape_pat=$('#ape_pat_t').val() ;
		var ape_mat=$('#ape_mat_t').val() ;
		var domicilio=$('#domicilio_t').val() ;
		var telefono=$('#telefono_t').val() ;
		var parentesco=$('#parentescos').val() ;

		var profesion=$('#profesion_t').val() ;
		var lugar_trabajo=$('#lugar_trabajo_t').val() ;
		var domicilio_trabajo=$('#domicilio_trabajo_t').val() ;
		var telefono_trabajo=$('#telefono_trabajo_t').val() ;
		var jefe_inmediato=$('#jefe_inmediato_t').val() ;
		var telefono_jefe_inmediato=$('#telefono_jefe_inmediato_t').val() ;

if (id_alumno=='' || nombre=='' || ape_pat=='' || ape_mat=='' || domicilio=='' || telefono=='' || parentesco=='' || profesion=='' || domicilio_trabajo=='' || telefono_trabajo=='' || telefono_trabajo==''  || jefe_inmediato==''  || telefono_jefe_inmediato=='') {
	alert("VERIFIQUE QUE LOS DATOS SE RELLENARAN CORRECTAMENTE")
}else{

    	<?php echo CHtml::ajax(array(
            'url'=>array('aluTutor/guardar'),
            'data'=> array(
            	'id_tutor'=>'js:id_tutor',
            	'id_alumno'=>'js:id_alumno',
            	'nombre'=>'js:nombre',
            	'ape_pat'=>"js:ape_pat",
            	'ape_mat'=>"js:ape_mat",
            	'domicilio'=>"js:domicilio",
            	'telefono'=>"js:telefono",
            	'parentesco'=>"js:parentesco",

            	'profesion'=>"js:profesion",
            	'lugar_trabajo'=>"js:lugar_trabajo",
            	'domicilio_trabajo'=>"js:domicilio_trabajo",
            	'telefono_trabajo'=>"js:telefono_trabajo",
            	'jefe_inmediato'=>"js:jefe_inmediato",
            	'telefono_jefe_inmediato'=>"js:telefono_jefe_inmediato",

            	'guarda'=>"js:guarda"
            ),
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {	
            	$.each(data.datos,function(key,value){
					$('#key').val(value) ;
            	});
				window.location='index.php?r=aluAlumno/detalles&id='+id_alumno;
				$.fn.yiiGridView.update('tutor_grid');
				$('#crearTutor').dialog('close');


				alert('La información de el tutor del alumno ha sido guardada');

            	if(data.status=='guardar' && data.id_tutor==''){
            		$('#id_tutor').val('');
            		$('#id_tutor').html('');
            		$('#nombre_t').val('');
            		$('#nombre_t').html('');
            		$('#ape_pat_t').val('');
            		$('#ape_pat_t').html('')
            		$('#ape_mat_t').val('');
            		$('#ape_mat_t').html('')
            		$('#domicilio_t').val('');
            		$('#domicilio_t').html('');
            		$('#telefono_t').val('');
            		$('#telefono_t').html('');
            		$('#parentesco').val('');
            		$('#parentesco').html('');
            		$('#profesion_t').val('');
            		$('#profesion_t').html('');
            		$('#lugar_trabajo_t').val('');
            		$('#lugar_trabajo_t').html('');
            		$('#domicilio_trabajo_t').val('');
            		$('#domicilio_trabajo_t').html('');
            		$('#telefono_trabajo_t').val('');
            		$('#telefono_trabajo_t').html('');
            		$('#jefe_inmediato_t').val('');
            		$('#jefe_inmediato_t').html('');
            		$('#telefono_jefe_inmediato_t').val('');
            		$('#telefono_jefe_inmediato_t').html('');
            	}
            } "
            ))
    	?>;
}    	
        return false; 					
	}
/*$('#save_tutor').val('actualizar');
$('#save_tutor').html('Actualizar');*/
	function cambia(){
		alert('cambio');
	}
	$(document).ready(function(){
		$('#parentescos').change(function(){
			$('#parentesco').val($("#parentescos option:selected").text());
		});
	});
</script>
<script>
	function fijarDatos() {
		var parentesco=$('#parentesco').val();

		$('#parentescos option').each(function(){
			if ($(this).text() == parentesco)
				$(this).attr('selected','selected');
		});

	}
</script>
<?php  
//$model=aluTutor::listTut($id_tutor);
	if ($id_tutor!='')  {
		$id_tutor=$model->id_tutor;
		$id_alumno=$model->id_alumno;
		$nombre=$model->nombre;
		$ape_pat=$model->ape_pat;
		$ape_mat=$model->ape_mat;
		$domicilio=$model->domicilio;
		$telefono=$model->telefono;
		$parentesco=aluTutor::getNameParentesco($model->id_parentesco);

		$profesion=$model->profesion;
		$lugar_trabajo=$model->lugar_trabajo;
		$domicilio_trabajo=$model->domicilio_trabajo;
		$telefono_trabajo=$model->telefono_trabajo;
		$jefe_inmediato=$model->jefe_inmediato;
		$telefono_jefe_inmediato=$model->telefono_jefe_inmediato;
	} else{ 
		$id_alumno=$id;
		$id_tutor=$id_tutor;
		$nombre='';
		$ape_pat='';
		$ape_mat='';
		$domicilio='';
		$telefono='';
		$parentesco='';

		$profesion='';
		$lugar_trabajo='';
		$domicilio_trabajo='';
		$telefono_trabajo='';
		$jefe_inmediato='';
		$telefono_jefe_inmediato='';
	}
?>

<?php echo CHtml::textField('id_alumno',$id_alumno,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('id_tutor',$id_tutor,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('parentesco',$parentesco,array('style'=>'display:none;')); ?>
<style>
	#nombre_t,#ape_pat_t,#ape_mat_t,#domicilio_t,#telefono_t,#parentescos,#profesion_t,#lugar_trabajo_t,#domicilio_trabajo_t,#telefono_trabajo_t,#jefe_inmediato_t,#telefono_jefe_inmediato_t{
		width: 70%;
	}
	#parentescos{
		font-size: 0.98em;
	}
</style>


<table class="table table-condensed">
	<tr>
		<td>
			Nombre
		</td>
		<td>
			<?php echo CHtml::textField(
				'nombre_t',
				$nombre,
				array('onblur'=>'vacios("nombre_t","Ingresa el nombre del tutor")',
					'onkeypress'=>'letras("nombre_t")'),
				array('id'=>'nombre_t','width'=>'200px','maxlength'=>3)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Apellido Paterno
		</td>
		<td>
			<?php echo CHtml::textField(
				'ape_pat_t',
				$ape_pat,
				array('onblur'=>'vacios("ape_pat_t","Falta el Apellido Paterno")',
					'onkeypress'=>'letras("ape_pat_t")'),
				array('id'=>'ape_pat_t','width'=>'200px','maxlength'=>45)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Apellido Materno
		</td>
		<td>
			<?php echo CHtml::textField(
				'ape_mat_t',
				$ape_mat,
				array('onblur'=>'vacios("ape_mat_t","Falta el Apellido Materno")',
					'onkeypress'=>'letras("ape_mat_t")'),
				array('id'=>'ape_mat_t','width'=>'200px','maxlength'=>45)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Domicilio
		</td>
		<td>
			<?php echo CHtml::textField(
				'domicilio_t',
				$domicilio,
				array('onblur'=>'vacios("domicilio_t","Falta el Domicilio")'),
				array('id'=>'domicilio_t','width'=>'200px','maxlength'=>45)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Telefono
		</td>
		<td>
			<?php echo CHtml::textField(
				'telefono_t',
				$telefono,
				array('onblur'=>'vacios("telefono","Ingresa el Telefonoa 10 digitos")',
					'onkeypress'=>'numeros("telefono")'),
				array('id'=>'telefono_t','width'=>'200px','maxlength'=>10)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Parentesco
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'parentescos',
					'', 
	              	aluTutor::getListParentescos(),
	              	array('empty' => 'Selecciona un Parentesco')
	             );
			?>
		    <!--<?php/* echo CHtml::Button('+',
		    	array('onclick'=>
		    		'AddParentesco();
		    		$("#dialogParentesco").dialog("open");'
		    	),
		    	array('style'=>'color:red;')
		    ); */?>-->
		</td>
	</tr>
	<tr>
		<td>
			Profesion
		</td>
		<td>
			<?php echo CHtml::textField(
				'profesion_t',
				$profesion,
				array('onblur'=>'vacios("profesion","Ingresa la Profesion")',
					'onkeypress'=>'letras("profesion")'),
				array('id'=>'profesion','width'=>'200px','maxlength'=>25)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Lugar de Trabajo
		</td>
		<td>
			<?php echo CHtml::textField(
				'lugar_trabajo_t',
				$lugar_trabajo,
				array('onblur'=>'vacios("lugar_trabajo","Ingresa el lugar de trabajo")',
					'onkeypress'=>'letras("lugar_trabajo")'),
				array('id'=>'lugar_trabajo','width'=>'200px','maxlength'=>60)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Domicilio de Trabajo
		</td>
		<td>
			<?php echo CHtml::textField(
				'domicilio_trabajo_t',
				$domicilio_trabajo,
				array('onblur'=>'vacios("domicilio_trabajo","Ingresa el domicilio de trabajo")',
					'onkeypress'=>'letras("domicilio_trabajo")'),
				array('id'=>'domicilio_trabajo','width'=>'200px','maxlength'=>60)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Telefono de Trabajo
		</td>
		<td>
			<?php echo CHtml::textField(
				'telefono_trabajo_t',
				$telefono_trabajo,
				array('onblur'=>'vacios("telefono_trabajo_t","Ingresa el telefono de trabajo")',
					'onkeypress'=>'numeros("telefono_trabajo_t")'),
				array('id'=>'telefono_trabajo_t','width'=>'70%','maxlength'=>10)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Jefe Inmediato
		</td>
		<td>
			<?php echo CHtml::textField(
				'jefe_inmediato_t',
				$jefe_inmediato,
				array('onblur'=>'vacios("jefe_inmediato_t","Ingresa el jefe inmediato")',
					'onkeypress'=>'letras("jefe_inmediato_t")'),
				array('id'=>'jefe_inmediato_t','width'=>'200px','maxlength'=>60)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Telefono de Jefe Inmediato
		</td>
		<td>
			<?php echo CHtml::textField(
				'telefono_jefe_inmediato_t',
				$telefono_jefe_inmediato,
				array('onblur'=>'vacios("telefono_jefe_inmediato_t","Ingresa el Telefono de Jefe Inmediato")',
					'onkeypress'=>'numeros("telefono_jefe_inmediato_t")'),
				array('id'=>'telefono_jefe_inmediato_t','width'=>'200px','maxlength'=>10)); ?>
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
			<?php if($id_tutor=='') { ?>
				<button id="guardaTutor" class="btn btn-success" value="guardar" onclick="guardaTutor()">Guardar</button>
			<?php } else { ?>
				<button id="guardaTutor" class="btn btn-success" value="actualizar" onclick="guardaTutor()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'dialogParentesco',
    'options'=>array(
        'title'=>'Crear Parentesco',
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
    function AddParentesco()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('aluParentesco/create'),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogParentesco div.divForForm').html(data.div);
                        $('#dialogParentesco div.divForForm form').submit(AddParentesco);
                    }
                    else
                    {
                        $('#dialogParentesco div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogParentesco').dialog('close') \",100);
                        
                        $('#parentescos').empty();
						$.each(data.datosParentesco, function(value,key) {
						  $('#parentescos').append($('<option></option>')
						     .attr('value', value).text(key));
						});
                    }
     
                } ",
                ))
        ?>;
        return false; 
    }   
</script>
<script> fijarDatos();</script>