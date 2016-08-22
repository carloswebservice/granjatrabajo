$(document).ready(function () {

    var oTable = $('#datatables-' + curiosityprefix);
    oTable.dataTable();


    $("#form-" + curiosityprefix).dialog({
        autoOpen: false,
        //height: "auto",
        width: "520px",
        resizable: false,
        modal: true,
        title: "<div class='widget-header'><h4><i class='fa fa-form'></i> Registro de " + $.ucfirst(curiosityprefix) + "</h4></div>",
        show: {
            effect: "slide",
            duration: 400
        },
        hide: {
            effect: "fold",
            duration: 400
        },
        buttons: [{
                html: "<i class='fa fa-times'></i>&nbsp; Cancelar",
                "class": "btn btn-danger",
                click: function () {
                    $(this).dialog("close");
                }
            }, {
                html: "<i class='fa fa-save'></i>&nbsp; Grabar",
                "class": "btn btn-info",
                click: function () {


                           frm = $("#form-" + curiosityprefix);
                        $.ajax({
                            url: frm.attr("action"),
                            type: 'POST',
                            data: frm.serialize(),
                            success: function(msg) {

                                var result = JSON.parse(msg);
                                if(result.say === "yes")
                                {

                                 //  $("#modalnew").modal("hide");
                                  
                                   bootbox.alert("<strong>Se agrego correctamente</strong>")
                                   location.reload()
                                }else{

                                  $(".errorforms").remove();

                                  $.each(result, function(i, val){
                                     $("#input-"+i).focus();
                                     $("#input-"+i).after(val);
                                  });
                                }
                            }
                        });
                }
            }],
        close: function () {
            //$("#form-" + curiosityprefix).dialog.reset();
        }
    });


    $("#input-evento_id").on("change",function(){
        $("#form-load").empty();
        switch($(this).val()){
            //PARTO
            case "1":
                form_parto();
                break;
                
            //ABORTO
            case "2":
                form_aborto();
                break;
            
            //CELO
            case "3":
                form_celo();
                break;    
            
            //SERVICIO
            case "4":
                form_servicio();
                break;
            
            case "5":
                form_muerte();
                break;
            
            case "6":
                form_venta();
                break;
            case "7":
                form_secado();
                break;
            case "8":
                form_rechazo();
                break;
            case "9":
                form_medicacion();
                break;
            
            case "10":
                form_iee();
                break;
            
            case "11":
                form_enfermedad();
                break;
            case "12":
                form_analisis();
                break;
            case "13":
                form_tactorectal();
                break;
            default :
                break;
                
        }
    });



});

function form_tactorectal(){    
   $("#form-load").load( baseurl+ "eventos/form_tactorectal");
}

function form_analisis(){    
   $("#form-load").load( baseurl+ "eventos/form_analisis");
}


function form_enfermedad(){    
   $("#form-load").load( baseurl+ "eventos/form_enfermedad");
}


function form_iee(){    
   $("#form-load").load( baseurl+ "eventos/form_iee");
}

function form_medicacion(){    
   $("#form-load").load( baseurl+ "eventos/form_medicacion");
}

function form_secado(){    
   $("#form-load").load( baseurl+ "eventos/form_secado");
}

function form_rechazo(){    
   $("#form-load").load( baseurl+ "eventos/form_rechazo");
}


function form_venta(){    
   $("#form-load").load( baseurl+ "eventos/form_venta");
}

function form_aborto(){    
   $("#form-load").load( baseurl+ "eventos/form_aborto");
}

function form_servicio(){    
   $("#form-load").load( baseurl+ "eventos/form_servicio");
}

function form_parto(){
    $("#form-load").load( baseurl+ "eventos/form_parto");
}

function form_celo(){
    $("#form-load").load( baseurl+ "eventos/form_celo");
}

function form_muerte(){    
   $("#form-load").load( baseurl+ "eventos/form_muerte");
}

function addxaction(){
     if ($(".selrow").is(':checked')) {
        var xsmart = $('input:radio[name=selrow]:checked').val();
        $("#input-animal_id").val(xsmart);
         
        $("#form-" + curiosityprefix)[0].reset();
        $("#form-" + curiosityprefix).dialog("open");
        
     } else {
        errordialogtablecuriosity();

    }
}

function ediate(id,evento){
    //alert(id+"-- e: "+evento);
    $("#input-evento_id").val(evento).trigger('change');
    
     $.ajax({
            type: 'POST',
            url: baseurl + curiosityprefix + "/json_get" + curiosityprefix + "_id",
            data: {evento:evento,ref:id},
            dataType: 'json',
            success: function (response) {               

                              $.each(response, function(i, val){
                                        if(i == "efecha"){
                                       
                                            var from =  new Date(val);
                                           // from = (from.getMonth() + 1) + '/' + from.getDate() + '/' +  from.getFullYear();
                                           // alert(from);
                                            $("#input-"+i).datepicker("setDate",from);
                                        }else{
                                            $("#input-"+i).val(val);
                                        }


                              });
                              
                                $(".errorforms").remove();
                          
            }, complete: function () {
                 $("#form-" + curiosityprefix).dialog("open");
            }
     });
     
      $.ajax({
            type: 'POST',
            url: baseurl + curiosityprefix + "/json_get" + curiosityprefix + "_id",
            data: {evento:evento,ref:id},
            dataType: 'json',
            success: function (response) {               

                              $.each(response, function(i, val){
                                        
                                        if(i == "efecha"){
                                            var from = new Date(val);
                                           
                                            //from = (from.getMonth() + 1) + '/' + from.getDate() + '/' +  from.getFullYear();
                                            //alert(from);
                                            $("#input-"+i).datepicker("setDate",from);
                                        }else{
                                            $("#input-"+i).val(val);
                                        }

                              });
                              
                                $(".errorforms").remove();
                          
            }, complete: function () {
                 $("#form-" + curiosityprefix).dialog("open");
            }
     });
    
    
}

function editaction() {
    if ($(".selrow").is(':checked')) {
        var xsmart = $('input:radio[name=selrow]:checked').val();
        alert(xsmart);
        $.ajax({
            type: 'POST',
            url: baseurl + curiosityprefix + "/json_get" + curiosityprefix + "_id",
            data: {id: xsmart},
            dataType: 'json',
            success: function (response) {
                 //var result = JSON.parse(msg);

                              $.each(response, function(i, val){
                                    
                                        $("#input-"+i).val(val);


                              });
                            $(".errorforms").remove();
                           // $("#modalnew").modal("show");
            }, complete: function () {
                 $("#form-" + curiosityprefix).dialog("open");
            }
        });


    } else {
        errordialogtablecuriosity();

    }

}

//
//
//function deleteaction(id)
//{
//
//        if ($(".selrow").is(':checked')) {
//            var xsmart = $('input:radio[name=selrow]:checked').val();
//
//            bootbox.dialog({
//                message: "<strong>¿ Desea Eliminar este registro ?</strong>",
//                title: "Confirmar",
//                buttons: {
//                  success: {
//                    label: "Aceptar",
//                    className: "btn-success",
//                    callback: function() {
//                      $.ajax({
//                        url: baseurl+curiosityprefix+"/delete",
//                        type: 'POST',
//                        data: {"id":xsmart},
//                        success: function(msg) {
//                          var result = JSON.parse(msg);
//                          if(result.say == "yes"){
//
//                            $('#datatables-'+curiosityprefix).dataTable().fnDraw();
//                          }else{
//
//                          }
//                        }
//                      });
//                    }
//                  },
//                  danger: {
//                    label: "Cancelar",
//                    className: "btn-danger"
//
//                  }
//                }
//              });
//
//        } else {
//            errordialogtablecuriosity();
//
//        }
//
//
//}
