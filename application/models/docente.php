<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Docente extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
    public $table = "docentes";
    //validación de los campos de la tabla users
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'nombres' => array(
            'label' => 'Nombres',
            'rules' => array('required')
        ),
        'apellidos' => array(
            'label' => 'Apellidos',
            'rules' => array('required')
        ),
        'dni' => array(
            'label' => 'DNI',
            'rules' => array('numeric','unique','exact_length' => 8)
        ),
        'email' => array(
            'label' => 'EMAIL',
            'rules' => array('valid_email'),
        )
            );

}
