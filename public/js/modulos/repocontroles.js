$(document).ready(function () {

   $('#startdate').datepicker({
			dateFormat : 'yy-mm-dd',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});
		
		$('#finishdate').datepicker({
			dateFormat : 'yy-mm-dd',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#startdate').datepicker('option', 'maxDate', selectedDate);
			}
		});

                
                 $("#reportexd").on("click",function(){
        var date1 = $("#startdate").val();
        var date2 = $("#finishdate").val();
        
        if(date1 !== "" && date2 !== ""){
              var urlcompuesta = baseurl+"repocontroles/repodate/"+date1+"/"+date2;
              $("#iframe-bonis").attr("src",urlcompuesta);
        }else{
            alert("Debe seleccionar Ambas fechas para poder establecer un rango");
        }
        
        //var urlcompuesta = baseurl+"repoeventos/repoyear/"+anio;
        //$("#iframe-bonis").attr("src",urlcompuesta);
    });
         
    });





