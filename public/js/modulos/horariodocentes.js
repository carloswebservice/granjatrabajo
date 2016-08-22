$(document).ready(function () {
   
   $(".js-example-basic-multiple").select2();
   
    $("#envio").on("click",function(){
        $("#form-horario").submit();
    });
});


  function target_popup(form) {
    window.open('', 'formpopup', 'width=800,height=600,resizeable,scrollbars');
    form.target = 'formpopup';
}
   
