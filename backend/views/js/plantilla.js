$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
});

/* jQueryKnob */
$('.knob').knob();

/*sidebar menu */
$('.sidebar-menu').tree();

//Colorpicker
$('.my-colorpicker').colorpicker();

//Datepicker	
$('.datepicker').datepicker({
	format: 'yyyy-mm-dd 23:59:59',
    //validar para elegir dia desde el actual
	startDate: '0d'
});