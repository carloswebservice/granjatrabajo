<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Resultadoanalisis extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "resultado_analisis";
  //public $has_one = array("distrito");


      public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'res_descripcion' => array(
            'label' => 'DESCRIPCION',
            'rules' => array('required')
        ),
         'res_abreviatura' => array(
            'label' => 'ABREVIATURA',
            'rules' => array('required')
        )
        
            );

}
