<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

class Estadocria extends DataMapper
{


   public $table = "estado_cria";
   
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'etc_descripcion' => array(
            'label' => 'Descripcion',
            'rules' => array('required')
        ),
         'etc_abreviatura' => array(
            'label' => 'Abreviatura',
            'rules' => array('required')
        )
            );

/*
   public $error_prefix = '<div class="text-danger errorforms">';
   public $error_suffix = '</div>';

   public $validation = array(
        'descripcion' => array(
            'label' => 'Descripcion',
            'rules' => array('required')
        )
     );
*/
}
