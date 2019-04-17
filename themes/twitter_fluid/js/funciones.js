function mensajeAdvertencia(control,mensaje){
	$("#"+control).popover({
		placement : 'left', //placement of the popover. also can use top, bottom, left or right
		// title : '<div style="text-align:center; color:red; text-decoration:underline; font-size:14px;"></div>', //this is the top title bar of the popover. add some basic css
		html: 'true', //needed to show html of course
		content : '<div>' + mensaje +' </div>' //this is the content of the html box. add the image here or anything you want really.
	});
}
