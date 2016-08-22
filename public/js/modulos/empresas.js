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
            {"mData": "logo", sDefaultContent: ""},
            {"mData": "ruc", sDefaultContent: ""},
            {"mData": "razon_social", sDefaultContent: ""},
            {"mData": "rubro", sDefaultContent: ""},
            {"mData": "contacto", sDefaultContent: ""},
            {"mData": "telefono", sDefaultContent: ""}
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
                    var form = new FormData(document.getElementById("form-" + curiosityprefix));
                    //append files
                    var file = document.getElementById('file').files[0];
                    if (file) {
                        form.append('file', file);
                    }

                    $.ajax({
                        type: 'POST',
                        url: baseurl + curiosityprefix + "/add",
                        data: form,
                        dataType: 'json',
                        success: function (response) {
                            alert("okiws");

                        },
                        processData: false,
                        contentType: false
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

    $("#departamento").on("change", function () {
        var iddepa = $(this).val();
        if (iddepa !== "")
        {
            $.ajax({
                type: 'POST',
                url: baseurl + curiosityprefix + "/json_provincias",
                data: {id: iddepa},
                dataType: 'json',
                success: function (response) {
                    var html = "";
                    html = html + "<option value=''>Provincia</option>";
                    for (var i = 0; i < response.length; i++) {
                        html += "<option value='" + response[i].id + "'>" + response[i].provincia + "</option>";
                    }
                    $("#provincia").html(html);
                    var htmlex = "<option value=''>Distrito</option>";
                    $("#distrito").html(htmlex);
                }
            });
        } else {
            var html1e = "<option value=''>Provincia</option>";
            var html2e = "<option value=''>Distrito</option>";
            $("#provincia").html(html1e);
            $("#distrito").html(html2e);
        }

    });

    $("#provincia").on("change", function () {
        var idprov = $(this).val();
        if (idprov !== "")
        {
            $.ajax({
                type: 'POST',
                url: baseurl + curiosityprefix + "/json_distritos",
                data: {id: idprov},
                dataType: 'json',
                success: function (response) {
                    var html = "";
                    html = html + "<option value=''>Distrito</option>";
                    for (var i = 0; i < response.length; i++) {
                        html += "<option value='" + response[i].id + "'>" + response[i].distrito + "</option>";
                    }
                    $("#distrito").html(html);
                }
            });
        } else {
            var htmli = "<option value=''>Distrito</option>";
            $("#distrito").html(htmli);
        }
    });





    //validar form  

    $("#per-save").click(function () {
        var descripcion = $("#mod_descripcion");

        if (descripcion.val() === "") {
            descripcion.focus();
            $("#group_desc").addClass("has-error");
            $("#error-descripcion").show();
        } else {
            $("#form_modulos").submit();
        }
    });



});



function viewaction(prefsmart) {
    if ($(".selrow").is(':checked')) {
        var xsmart = $('input:radio[name=selrow]:checked').val();
        $.ajax({
            type: 'POST',
            url: baseurl + prefsmart + "/json_get" + prefsmart + "_id",
            data: {id: xsmart},
            dataType: 'json',
            success: function (response) {
                $("#view-label-id").html(response[0].id);
                $("#view-label-ruc").html(response[0].ruc);
                $("#view-label-razon_social").html(response[0].razon_social);
                $("#view-label-direccion").html(response[0].direccion);
                $("#view-label-rubro").html("(" + response[0].rubro + ")");
                $("#view-label-contacto").html(response[0].contacto);
                $("#view-label-telefono").html(response[0].telefono);
                $("#view-label-email").html(response[0].email);
                $("#view-label-motivo").html(response[0].motivo);
                $("#view-label-logo").attr("src", baseurl + "public/img/empresas/" + response[0].logo);
                $("#view-label-estado").html(response[0].estado);
            }, complete: function () {
                $("#form-view-" + prefsmart).dialog("open");
            }
        });


    } else {
        errordialogtablecuriosity();
        
    }

}



function eliminar(id)
{
    if (confirm("Desea eliminar este registro")) {
        $.ajax({
            type: 'POST',
            url: baseurl + "modulos/delete",
            async: true,
            data: {id: id},
            complete: function () {
                $('#datatables-per').dataTable().fnDraw();
                $.smallBox({
                    title: "Notificaciones",
                    content: "El registro se elimino correctamente!",
                    color: "#296191",
                    icon: "fa fa-bell shake animated",
                    timeout: 1000
                });
            },
            error: function (error) {
                alert("se produjo un error");
            }
        });
    }
}
