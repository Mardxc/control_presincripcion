function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	
  if(typeof(XMLHttpRequest) != 'undefined'){
    try{
      var xmlhttp = new XMLHttpRequest();
    }
    catch(e){ }
  }
  else{
    /* Compatibilidad para el navegador más ASQUEROSO del planeta [ IE ] */
    try{
       var xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    catch(e){
      var xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
    }
  }
  
	return xmlhttp; 
}


function mostrarMenu(modulo,tipo,id_usuario){
  var divContenido=document.getElementById("menu");


  ajax=nuevoAjax();
  //alert(modulo);
  ajax.open("GET", "themes/twitter_fluid/js/mostrar_menus.php?mod=" 
    + modulo + '&tipo=' + tipo + '&id_usuario=' + id_usuario ,true);
    ajax.onreadystatechange=function() {
      if (ajax.readyState==4) {
        divContenido.innerHTML = ajax.responseText;
        //enviar.parametro.value=modulo;
    
        ajax=null;

      }
    }
    ajax.send(null)
}
