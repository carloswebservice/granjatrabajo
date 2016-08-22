<?php

defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

class Perfil extends DataMapper {

    public $table = "seguridad.perfiles";   

    
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'per_descripcion' => array(
            'label' => 'Descripcion',
            'rules' => array('required'),
        )
    );
}