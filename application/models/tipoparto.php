<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

class Tipoparto extends DataMapper
{


   public $table = "tipo_parto";

   public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'tpa_descripcion' => array(
            'label' => 'DESCRIPCION',
            'rules' => array('required')
        ),
         'tpa_abreviatura' => array(
            'label' => 'ABREVIATURA',
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
