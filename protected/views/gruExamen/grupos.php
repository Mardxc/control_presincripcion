<style>

</style>

<?php 
	foreach ($grupos as  $campo) {
		$tipo_examen=$campo['tipo_examen'];
		$fecha=$campo['fecha'];
		$carrera=$campo['carrera'];
		$grupo=$campo['grupo'];
		$aplicador=$campo['aplicador'];
	}
	
?>
<div id="header" align="center">
	<h1 class="title_header">
		REGISTRO DE ASISTENCIA DE SUSTENTANTES DEL EXAMEN NACIONAL DE INGRESO
	</h1>
</div>

<table id="data_header">
	<tr>
		<td>
			Tipo de Examen:
		</td>
		<td>
			<?php echo $tipo_examen; ?>
		</td>
		<td>
			
		</td>
		<td>
			Sede de Aplicación:
		</td>
		<td>
			Rioverde, S.L.P.
		</td>
	</tr>
	<tr>
		<td>
			Fecha de Aplicación: 
		</td>
		<td>
			<?php echo $fecha; ?>
		</td>
		<td>
			
		</td>
		<td>
			Carrera:
		</td>
		<td>
			<?php echo $carrera; ?>
		</td>
	</tr>
	<tr>
		<td>
			Institución: 
		</td>
		<td>
			Instituto Tecnológico Superior de Rioverde
		</td>
		<td>
			
		</td>
		<td>
			Grupo:
		</td>
		<td>
			<?php echo $grupo; ?>
		</td>
	</tr>
</table>
<br>
<br>
<table id="data_body"  border="1" cellpadding="0" cellspacing="0"  align="center" width="100%">
	<tr  bgcolor="lightgray">
		<td style="font-weight:bold;text-align:center;">No.</td>
		<td style="font-weight:bold;text-align:center;">Folio Ceneval</td>
		<td style="font-weight:bold;">Nombre del sustentante</td>
		<td style="font-weight:bold;">Versión del examen</td>
	</tr>
	<?php 
		$i=1;
		foreach ($detallesGrupos as  $campo) { ?>
			<tr width="100%" >
				<td align="center">
					<?php echo $i; ?>
				</td>
				<td>
					<?php echo $campo['folio_ceneval']; ?>
				</td>	
				<td>
					<?php echo $campo['nombre']; ?>
				</td>	
				<td>
					<?php echo $campo['version']; ?>
				</td>	
			</tr>
		<?php 
		$i++;
		} 
	?>
</table>
<br>
<table id="data_aplicador" align="center">
	<tr>
		<td>
			Nombre y firma del aplicador:
		</td>
		<td style="border-bottom:1px solid black;">
			<?php echo $aplicador; ?> 
		</td>
	</tr>
</table>
