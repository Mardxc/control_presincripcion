<div align="right">
	<?php 
		echo CHtml::link('','index.php?r=gruExamen/admin',
			array(
				'class'=>'fa fa-cog',
				'title'=>'Crear Nuevo Grupo',
				'style'=>'left:100%;float:right;
		    		font-size: 3.0em;'
		    )
		);
 	?>
</div>


<h1><u><?php echo ucwords(strtolower($model->nombre)); ?></u>	</h1>
<br>
<table class="table table-condensed" align="center" style="width: 80%;">
	<tr>
		<td>
			<div class="row">
				<label for="nombre" class="required">NOMBRE</span>
				<a href="#" onclick="mensajeAdvertencia('nombreObligatorio','Este es el mensaje')"
				 id="nombreObligatorio" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;"></a></label>
			</div>
		</td>
		<td>
			<div class="row">
				<?php echo $model->nombre; ?>
			</div>
		</td>
		<td>
			<div class="row">
				<label for="oportunidad" class="required">OPORTUNIDAD </span>

			</div>
		</td>
		<td>
			<div class="row">
				<?php echo $model->oportunidad; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="row">
				<label for="horario" class="required">HORARIO </span>

			</div>
		</td>
		<td>
			<div class="row">
				<?php echo $model->horario; ?>
			</div>
		</td>
		<td>
			<div class="row">
				<label for="fecha_de_aplicacion" class="required">FECHA DE APLICACION </span>

			</div>
		</td>
		<td>
			<div class="row">
				<?php echo $model->fecha; ?>
			</div>
		</td>
	</tr>

		<td>
			<div class="row">
				<label for="periodo" class="required">PERIODO </span>
			</div>
		</td>
		<td>
			<div class="row">
				<?php echo GruExamen::getNamePeriodo($model->id_periodo); ?>
			</div>
		</td>
		<td>
			<div class="row">
				<label for="ciclo" class="required">CICLO </span>
			</div>
		</td>
		<td>
			<div class="row">
				<?php echo GruExamen::getPeriodoCiclo($model->id_periodo); ?>
			</div>
		</td>
	</tr>
</table>
