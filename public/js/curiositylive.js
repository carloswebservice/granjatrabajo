$('.tablecuriosity tbody').on('click', 'tr', function () {
    if ($(this).hasClass('info')) {
        $(this).removeClass('info');
    }
    else {
        $('.tablecuriosity').dataTable().$('tr.info').removeClass('info');
        $(this).addClass('info');
    }
    $(this).find(".selrow").prop("checked", true);
});

function CuriositySoundError() {
    var e = 0;
    if (e = 1, 0 == isIE8orlower()) {
        var f = document.createElement("audio");
        f.setAttribute("src", "public/" + $.sound_path + "cerrar.ogg"), $.get(), f.addEventListener("load", function () {
            f.play();
        }, !0), $.sound_on && (f.pause(), f.play());
    }
}

$('.datepicker').datepicker({
      changeMonth: true,
      changeYear: true
     
    }
            );


$("#dialog-smart-error").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    title: "<div class='widget-header txt-color-red'><h4><i class='fa fa-warning'></i> Error ! </h4></div>",
    show: {
        effect: "highlight",
        duration: 300
    },
    hide: {
        effect: "clip",
        duration: 300
    },
    buttons: [{
            html: "Aceptar",
            "class": "btn btn-danger btn-sm ",
            click: function () {
                $(this).dialog("close");
            }
        }]
});

function errordialogtablecuriosity(){
    $("#dialog-smart-error").dialog("open");
    CuriositySoundError();
}


function addaction(prefsmart) {
    $(".errorforms").hide();
    $("#input-id").val("");
    $("#form-" + prefsmart)[0].reset();
    $("#form-" + prefsmart).dialog("open");
}
