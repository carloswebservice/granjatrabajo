<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Tiporegistro extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "tipo_registro";
  //public $has_one = array("distrito");


    //validación de los campos de la tabla users
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'tiporeg_descripcion' => array(
            'label' => 'DESCRIPCION',
            'rules' => array('required')
        ),
         'tiporeg_abreviatura' => array(
            'label' => 'ABREVIATURA',
            'rules' => array('required')
        )
        
            );

}
