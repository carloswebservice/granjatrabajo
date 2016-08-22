<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Causanoinseminal extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "causa_no_inseminal";
  //public $has_one = array("distrito");


   public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'cni_descripcion' => array(
            'label' => 'Descripcion',
            'rules' => array('required')
        ),
         'cni_abreviatura' => array(
            'label' => 'Abreviatura',
            'rules' => array('required')
        )
            );

}
