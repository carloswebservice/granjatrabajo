$(document).ready(function () {

    var oTable = $('#datatables-' + curiosityprefix);
    oTable.dataTable({
        //"bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": baseurl + curiosityprefix + '/datatable',
        "iDisplayStart ": 20,
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 cols-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth": true,
        "aoColumns": [
            {"mData": "actions", sDefaultContent: ""},
            //{"mData": "id", sDefaultContent: ""},
            {"mData": "mdm_descripcion", sDefaultContent: ""},
            {"mData": "mdm_abreviatura", sDefaultContent: ""}
        ],
        "fnInitComplete": function () {
            oTable.fnAdjustColumnSizing();

        },
        'fnServerData': function (sSource, aoData, fnCallback) {
            $.ajax
                    ({
                        'dataType': 'json',
                        'type': 'POST',
                        'url': sSource,
                        'data': aoData,
                        'success': fnCallback
                    });
        }
    });


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
                    //var form = new FormData(document.getElementById("form-" + curiosityprefix));
                    //append files
                    //var file = document.getElementById('file').files[0];
                    //if (file) {
                   //     form.append('file', file);
                  //  }

                //    $.ajax({
                //        type: 'POST',
                //        url: baseurl + curiosityprefix + "/add",
                //        data: form,
                //        dataType: 'json',
                //        success: function (response) {
                //            alert("okiws");

                //        },
                //        processData: false,
                //        contentType: false
                //    });

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
                                   $('#datatables-'+curiosityprefix).dataTable().fnDraw();
                                   bootbox.alert("<strong>Se agrego correctamente</strong>")
                                   $("#form-" + curiosityprefix).dialog("close");
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


    $("#form-view-" + curiosityprefix).dialog({
        autoOpen: false,
        resizable: false,
        width: "430px",
        modal: true,
        title: "<div class='widget-header '><h4><i class='fa fa-briefcase'></i>  Informacion de la Empresa </h4></div>",
        show: {
            effect: "slide",
            duration: 400
        },
        hide: {
            effect: "fold",
            duration: 400
        },
        buttons: [{
                html: "Cerrar",
                "class": "btn btn-warning btn-sm ",
                click: function () {
                    $(this).dialog("close");
                }
            }]
    });



});



function editaction() {
    if ($(".selrow").is(':checked')) {
        var xsmart = $('input:radio[name=selrow]:checked').val();
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



function deleteaction(id)
{

        if ($(".selrow").is(':checked')) {
            var xsmart = $('input:radio[name=selrow]:checked').val();

            bootbox.dialog({
                message: "<strong>¿ Desea Eliminar este registro ?</strong>",
                title: "Confirmar",
                buttons: {
                  success: {
                    label: "Aceptar",
                    className: "btn-success",
                    callback: function() {
                      $.ajax({
                        url: baseurl+curiosityprefix+"/delete",
                        type: 'POST',
                        data: {"id":xsmart},
                        success: function(msg) {
                          var result = JSON.parse(msg);
                          if(result.say == "yes"){

                            $('#datatables-'+curiosityprefix).dataTable().fnDraw();
                          }else{

                          }
                        }
                      });
                    }
                  },
                  danger: {
                    label: "Cancelar",
                    className: "btn-danger"

                  }
                }
              });

        } else {
            errordialogtablecuriosity();

        }


}
