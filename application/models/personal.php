<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Personal extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "personal";
  //public $has_one = array("distrito");

    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'per_apepa' => array(
            'label' => 'apellido paterno',
            'rules' => array('required')
        ),
          'per_nombre' => array(
            'label' => 'Nombre',
            'rules' => array('required')
        ),
           'per_dni' => array(
            'label' => 'DNI',
            'rules' => array('required')
        ),
           'per_distrito' => array(
            'label' => 'Distrito',
            'rules' => array('required')
        ),
           
        
         'per_apema' => array(
            'label' => 'apellido materno',
            'rules' => array('required')
        )
            );
  

}
