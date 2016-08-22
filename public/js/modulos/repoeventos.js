$(document).ready(function () {

    $("#year").on("change",function(){
        var anio = $(this).val();
        var urlcompuesta = baseurl+"repoeventos/repoyear/"+anio;
        $("#iframe-bonis").attr("src",urlcompuesta);
    });

        


});


