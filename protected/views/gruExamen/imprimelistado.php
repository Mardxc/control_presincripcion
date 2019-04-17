<style>
    table{
        border-spacing: 0;
        border-collapse: collapse;
        padding: 0;
    }
    td{
        font-size:8.5px; 
    }
    tr{
        border:1px solid black; 
    }
    th{
        padding:2px; 
    }
    th,td{
        text-align: center;
        border:1px solid black; 
    }
    p{
        font-size:24px; 
        font-weight:bold; 
        padding:0;
        margin:0; 
    }
    p .resaltado{
        text-decoration: underline;
    }
</style>
<div align="center">
    <img  src="<?php echo Yii::app()->request->baseUrl.'/protected/images/tec.jpg';?>" alt="">
    <p>
        INSTITUTO TECNOLÓGICO SUPERIOR DE RIOVERDE
    </p>
    <p>
        <span class="resaltado">
            Listado de Alumnos
        </span>
    </p>
</div>   
<br>

<div align="center" style="font-size:18px;">
    <?php echo '<b><u>CRITERIOS DE FILTRADO</u></b><br>'; ?>
</div>
<br>
<div align="center"  style="margin:0 10%;">
    <table align="center">
        <?php 
            echo '<tr>';
            foreach ($datos as $key => $value) {
                
                    if(!empty($value)){
                        if($key=='oportunidad'){
                            if($value==1)
                                echo '<td><b>'.strtoupper($key).'</b>:'. 'PRIMERA' .'<br></td>';
                            elseif ($value==2) 
                                echo '<td><b>'.strtoupper($key) .'</b>:'. 'SEGUNDA' .'<br></td>';
                            else
                                echo '<td><b>'.strtoupper($key) .'</b>:'. 'TERCERA' .'<br></td>';  
                        }else
                                echo '<td><b>'.strtoupper($key) .'</b>:'. $value .'<br></td>';
                    }
                
            }
            echo '</tr>';
        ?>
    </table>
</div>
<br>
<div align="center" style="font-size:18px;">
    <?php echo '<b><u>FILTRADO DE ALUMNOS</u></b><br>'; ?>
</div>
<br>
<table align="center" border="0" bordercolor="black">
    <tr>
        <th>
            CONS.
        </th>
        <th>
            ALUMNO
        </th>
        <th>
            CARRERA
        </th>
        <th>
            ESCUELA DE PROCEDENCIA
        </th>
        <th>
            MUNICIPIO
        </th>
        <th>
            LOCALIDAD
        </th>
        <th>
            SEXO
        </th>
        <th>
            OPORTUNIDAD
        </th>      
    </tr>
    <?php 
        $total=0;
        foreach ($dataAlumnosFiltrado as $key => $registro) {
            echo '<tr>';
            foreach ($registro as $key => $campo) {
                echo '<td>';
                    if($key=='OPORTUNIDAD'){
                        if($campo==1)
                            echo 'PRIMERA';
                        elseif ($campo==2) {
                            echo 'SEGUNDA';
                        }else{
                            echo 'TERCERA';   
                        }
                    }else
                    echo $campo;
                echo '</td>';
            }
            echo '</tr>';
            $total++;
        }
    ?>
    <tr>
        <td align="right" colspan="8">
            <?php echo 'Alumnos Registrados: '.$total; ?>
        </td>
    </tr>
</table>