<?php

defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

class Modulo extends DataMapper {

    public $table = "seguridad.modulos";   

    
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'mod_descripcion' => array(
            'label' => 'Descripcion',
            'rules' => array('required'),
        ),
        'mod_url' => array(
            'label' => 'URL',
            'rules' => array('required'),
        ),
         'mod_icono' => array(
            'label' => 'MODULO PADRE',
            'rules' => array('required'),
        ),
         'mod_orden' => array(
            'label' => 'ORDEN',
            'rules' => array('required'),
        )
    );
}