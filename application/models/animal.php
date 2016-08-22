<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Animal extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "animales";
  //public $has_one = array("distrito");


    //validación de los campos de la tabla users
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'ani_rp' => array(
            'label' => 'RP ANIMAL',
            'rules' => array('required')
        ),
         'ani_nombre' => array(
            'label' => 'NOMBRE ANIMAL',
            'rules' => array('required')
        ),
         'ani_padre' => array(
            'label' => 'RP PADRE',
            'rules' => array('required')
        ),
         'ani_madre' => array(
            'label' => 'RP MADRE',
            'rules' => array('required')
        ),
         'ani_fechanac' => array(
            'label' => 'FECHA NACIMIENTO',
            'rules' => array('required')
        ),
        'ani_tiporeg' => array(
            'label' => 'TIPO REGISTRO',
            'rules' => array('required')
        ),
          'ani_raza' => array(
            'label' => 'RAZA',
            'rules' => array('required')
        ),
          'ani_descripcion' => array(
            'label' => 'DESCRIPCION',
            'rules' => array('required')
        ),
          'ani_proveedor' => array(
            'label' => 'PROVEEDOR',
            'rules' => array('required')
        ),
          'ani_sexo' => array(
            'label' => 'SEXO',
            'rules' => array('required')
        )
            );

}
