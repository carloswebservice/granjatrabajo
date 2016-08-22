<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Escuela extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "escuelas";
  //public $has_one = array("distrito");
  //public $has_many = array("log");
    //un usuario puede tener un estado y un dni
  //public $has_one = array("facultad");

    //un usuario puede tener muchos cursos
  //public $has_many = array("curso");

    //validación de los campos de la tabla users
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'descripcion' => array(
            'label' => 'Descripcion',
            'rules' => array('required')
        ),
         'facultad_id' => array(
            'label' => 'Facultad',
            'rules' => array('required')
        )
            );

}
