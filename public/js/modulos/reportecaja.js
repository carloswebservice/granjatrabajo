$(document).ready(function () {
	var urlcompuesta = baseurl+"reportecaja/reportecajita";
    $("#iframe-bonis").attr("src",urlcompuesta); 
});

function guardarcaja(){

	if ($("#fecha").val()=="") {
		bootbox.alert("<strong> Los campos estan vacios </strong>"); return 0;
	}
	if ($("#ingreso").val()!="" || $("#compra").val()!="" || $("#medicina").val()!="" || $("#transporte").val()!="") {
		$.ajax({
	        url: baseurl+curiosityprefix+"/guardar",
	        type: 'POST',
	        data: $("#form_cajita").serialize(),
	        success: function(data){
	        	if (data=="Correcto") {
	        		bootbox.alert("<strong>Se Guardo Correctamente</strong>");
	            	var urlcompuesta = baseurl+"reportecaja/reportecajita";
	    			$("#iframe-bonis").attr("src",urlcompuesta); 
	    			$("#form_cajita").trigger("reset");
	        	}else{
	        		bootbox.alert("<strong>Ocurrió Un Error. No Se Guardo Correctamente</strong>");
	        	}
	        }
	    });
	}else{
		bootbox.alert("<strong> Ingrese el monto de ingreso o algun egreso </strong>");
	}
}