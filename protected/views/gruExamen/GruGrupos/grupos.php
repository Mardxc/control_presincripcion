<script>
    function borrarGrupo(){
        //var id_grupo = $.fn.yiiGridView.getSelection('grupos');
        var id_grupo=  $.fn.yiiGridView.getChecked('grupos', 'id_grupos');



        <?php echo CHtml::ajax(array(
            'url'=>array('gruExamen/AjaxDelete'),
            'data'=> array(
                'id_grupo'=>'js:id_grupo',
            ),
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {   if(data.mensaje!=''){
                    $.fn.yiiGridView.update('grupos');
                    $.fn.yiiGridView.update('gruposalumnos');
                    $('#headerGrupo').text('Grupo no seleccionado');
                    $('#mensaje').css('display','block');
                    $('#mensaje').html(data.mensaje);
                    $('#nombre_alumno').val('');
                    $('#id_alumno').val('');
                    $('#nombre').val('');
                    $('#turno').val('');
                    $('#cupo_max').val('');
                    $('input[type=text]').prop('disabled',true);
                    $('#save_grupo').val('Nuevo');
                    $('#save_grupo').text('Nuevo');
                }
            }"
        ))
        ?>;
        return false; 
    }
    function imprimirGrupo(){
        var id_grupo=  $.fn.yiiGridView.getChecked('grupos', 'id_grupos');

        if(id_grupo!=""){
            window.location="index.php?r=gruExamen/grupos&id_grupo="+id_grupo;
        }
    }
    function editarGrupo () {
        var id_grupo=  $.fn.yiiGridView.getChecked('grupos', 'id_grupos');

        if(id_grupo=='')
            alert('Selecciona un grupo');
        else{
            $('#id_gr').val(id_grupo);
            $('#id_grupo').val(id_grupo);
            $('input[type=text]').prop('disabled',false);
     
            $('#save_grupo').val('actualizar');
            $('#save_grupo').text('Actualizar');

            getData(id_grupo);  
             $.fn.yiiGridView.update('gruposalumnos',{ data: id_grupo });
        }

    }
    $(document).ready(function(){
        $('#editar_grupo').mouseover(function(){
            $('#mensaje_grupos').css('font-weight','bold');
            $('#mensaje_grupos').html('EDITA EL GRUPO');
        });
        $('#borrar_grupo').mouseover(function(){
            $('#mensaje_grupos').css('font-weight','bold');
            $('#mensaje_grupos').html('ELIMINA EL GRUPO');
        });
        $('#imprimir_grupo').mouseover(function(){
            $('#mensaje_grupos').css('font-weight','bold');
            $('#mensaje_grupos').html('IMPRIME EL GRUPO Y LOS ALUMNOS');
        });
    });
</script>
<h1><u>Grupos Asinados al Examen</u> </h1>
<div align="right" >
    <a id="editar_grupo"  value="borrar" style="text-align:center;cursor:hand;" onclick="editarGrupo()">
        <i class="fa fa-pencil fa-3x"></i>
    </a>
    <a id="borrar_grupo"  value="borrar" style="text-align:center;cursor:hand;" onclick="borrarGrupo()">
        <i class="fa fa-times fa-3x"></i>
    </a>
</div>

<br>
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'grupos',
    'dataProvider'=>$dataProviderGrupos,
    'selectableRows'=>1,
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=> 'Mostrando {start}-{end} de {count}',
    'pager'=>array(
        'header'         => '',
        'firstPageLabel' => '&lt;&lt;',
        'cssFile'=> Yii::app()->request->baseUrl."/css/gridview/styles.css",
        'maxButtonCount' => 3,  
        'prevPageLabel'  => '<i class="icon-chevron-left icon-2x"></i>',
        'nextPageLabel'  => '<i class="icon-chevron-right icon-2x"></i>',
        'lastPageLabel'  => '&gt;&gt;',
        'htmlOptions'=>array('style'=>'width:27%;float:left;top:-1px;'),
    ),
    'columns'=>array(
            array(
                'id'=>'id_grupos',
                'class'=>'CCheckBoxColumn',
                 'selectableRows' => '1',  
            ),
            array(
            	'name'=>'nombre',
            	'header'=>'NOMBRE',
                'htmlOptions'=>array('style'=>'cursor:hand;')
            ),
            array(
            	'name'=>'turno',
            	'header'=>'TURNO',
                'htmlOptions'=>array('style'=>'cursor:hand;')
            ),
            array(
            	'name'=>'cupo_max',
            	'header'=>'CUPO MAXIMO',
                'htmlOptions'=>array('style'=>'cursor:hand;')
            ),
        ),
    ));
?>
<script>
	function reloadGrid(data) {
	    $.fn.yiiGridView.update('grupos');
	}
</script>