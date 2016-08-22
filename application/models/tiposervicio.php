<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

class Tiposervicio extends DataMapper
{


   public $table = "tipo_servicio";


   

    //validación de los campos de la tabla users
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'tps_descripcion' => array(
            'label' => 'DESCRIPCION',
            'rules' => array('required')
        ),
         'tps_abreviatura' => array(
            'label' => 'ABREVIATURA',
            'rules' => array('required')
        )
        
            );

}
