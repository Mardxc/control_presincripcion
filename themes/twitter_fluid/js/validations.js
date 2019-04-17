/*
function valoresVacios(){

	for (var i = 0; i < cajas.length; i++) {
		alert('hola');
		if (cajas[i]=='') {
			alert(cajas[i].val());
			return false;
		}
	}
}
*/
function vacios(caja,mensaje) {
	if($("#"+caja).val()==''){
		$('#'+caja).focus().after("<span class='errores'>"+mensaje+"</span>");
		return false;
	}else{
		$('.errores').remove();
	}	
}
function numeros(caja){
	$('#'+caja).keypress(function(tecla){
		if(tecla.charCode < 48 || tecla.charCode > 57) {
			$('#'+caja).val('');
			return false;
		}
	});
}
function letras(caja){
	$('#'+caja).keypress(function(tecla){
		if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && 
			(tecla.charCode != 45) && (tecla.charCode!=32) && (tecla.charCode!=44) && (tecla.charCode!=39) && (tecla.charCode!=34) ){
			 	$('#'+caja).val('');
			 	return false;
		}
	});
}
function decimales(caja){
	$('#'+caja).keypress(function(event) {
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) ) {
		    if (event.keyCode !== 8 && event.keyCode !== 46 ){ //exception
		        $('#'+caja).val('');
		        event.preventDefault();
		    }
		}
		if(($(this).val().indexOf('.') != -1) && ($(this).val().substring($(this).val().indexOf('.'),$(this).val().indexOf('.').length).length>2 )){
		   if (event.keyCode !== 8 && event.keyCode !== 46 ){ //exception
		        $('#'+caja).val('');
		        event.preventDefault();
		   }
		}
  	});
}