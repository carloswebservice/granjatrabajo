<div class="row">
    <br/><br/><br/><br/>    
    <div class="col-md-4 col-md-offset-4">

        <div class="well">

            <div class='row'>
                <form action="" id="login-form" class="smart-form client-form">
                    <header>
                        <i class="fa fa-unlock-alt fa-2x"></i> &nbsp;&nbsp;&nbsp;
                        LOGIN DE ACCESO
                    </header>
                    <fieldset>                      
                        <div class="col-md-12">
                            <section>
                                <label class="label">Usuario</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input id="usuario" type="text" name="usuario">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su usuario</b></label>
                            </section>
                            <section>
                                <label class="label">Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input id="clave" type="password" name="clave">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su password</b> </label>
                              
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button id="form-log" type="button" class="btn btn-primary">
                            Ingresar
                        </button>
                    </footer>
                </form>
            </div>

        </div>
    </div>
    
    <?php// print_r($_SESSION); ?>
</div>
<script>
    $("document").ready(function(){
        $("#form-log").click(function(){
            if($("#usuario").val() == ""){
                alert("los campos son obligatorios");
            }else{
                if($("#clave").val() == ""){
                    alert("los campos son obligatorios");
                }else{
                    $.post("login/verificar",$("#login-form").serialize(),function(response){
                        if(response.say == "yes"){
                            location.href = "<?php echo base_url(); ?>"+"panel";
                        }else{
                            alert("los datos son incorrectos");
                        }
                    },"json");
                }
            }
        });
    });
</script>