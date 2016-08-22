$(document).ready(function () {

    var oTable = $('#datatables-' + curiosityprefix);
    oTable.dataTable();
    
    
    $('#input-fecha').datepicker( {
        onSelect: function(date) {
            window.location = "#controles/index/"+date;
        },
        selectWeek: true,
        inline: true,
        dateFormat: 'yy-mm-dd'
    });

    $("#grababb").on("click",function(){
                          $.ajax({
                            url: baseurl+"controles/save",
                            type: 'POST',
                            data: $("#formbb").serialize(),
                            success: function(msg) {
                                var result = JSON.parse(msg);
                                if(result.say == "yes")
                                {
                                   
                                    location.reload();
                                 
                                }else{
                                        alert("fuego fuego");
                                }
                            }
                        });
    });

//    $("#form-" + curiosityprefix).dialog({
//        autoOpen: false,
//        //height: "auto",
//        width: "520px",
//        resizable: false,
//        modal: true,
//        title: "<div class='widget-header'><h4><i class='fa fa-form'></i> Registro de " + $.ucfirst(curiosityprefix) + "</h4></div>",
//        show: {
//            effect: "slide",
//            duration: 400
//        },
//        hide: {
//            effect: "fold",
//            duration: 400
//        },
//        buttons: [{
//                html: "<i class='fa fa-times'></i>&nbsp; Cancelar",
//                "class": "btn btn-danger",
//                click: function () {
//                    $(this).dialog("close");
//                }
//            }, {
//                html: "<i class='fa fa-save'></i>&nbsp; Grabar",
//                "class": "btn btn-info",
//                click: function () {
//
//
//                           frm = $("#form-" + curiosityprefix);
//                        $.ajax({
//                            url: frm.attr("action"),
//                            type: 'POST',
//                            data: frm.serialize(),
//                            success: function(msg) {
//
//                                var result = JSON.parse(msg);
//                                if(result.say === "yes")
//                                {
//
//                                 //  $("#modalnew").modal("hide");
//                                  
//                                   bootbox.alert("<strong>Se agrego correctamente</strong>")
//                                   location.reload()
//                                }else{
//
//                                  $(".errorforms").remove();
//
//                                  $.each(result, function(i, val){
//                                     $("#input-"+i).focus();
//                                     $("#input-"+i).after(val);
//                                  });
//                                }
//                            }
//                        });
//                }
//            }],
//        close: function () {
//            //$("#form-" + curiosityprefix).dialog.reset();
//        }
//    });
//
//
//    $("#input-evento_id").on("change",function(){
//        $("#form-load").empty();
//        switch($(this).val()){
//            //PARTO
//            case "1":
//                form_parto();
//                break;
//                
//            //ABORTO
//            case "2":
//                form_aborto();
//                break;
//            
//            //CELO
//            case "3":
//                form_celo();
//                break;    
//            
//            //SERVICIO
//            case "4":
//                form_servicio();
//                break;
//            
//            case "5":
//                form_muerte();
//                break;
//            
//            case "6":
//                form_venta();
//                break;
//            case "7":
//                form_secado();
//                break;
//            case "8":
//                form_rechazo();
//                break;
//            case "9":
//                form_medicacion();
//                break;
//            
//            case "10":
//                form_iee();
//                break;
//            
//            case "11":
//                form_enfermedad();
//                break;
//            case "12":
//                form_analisis();
//                break;
//            case "13":
//                form_tactorectal();
//                break;
//            default :
//                break;
//                
//        }
//    });
//


});


