<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Sexo extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
  public $table = "sexo_cria";
  //public $has_one = array("distrito");


    //validación de los campos de la tabla users
    public $error_prefix = '<div class="text-danger errorforms">';
    public $error_suffix = '</div>';

    public $validation = array(
        'scr_descripcion' => array(
            'label' => 'DESCRIPCION',
            'rules' => array('required')
        ),
         'scr_abreviatura' => array(
            'label' => 'ABREVIATURA',
            'rules' => array('required')
        )
        
            );

}


/* 
 SELECT 
 extract(year from eveani.eveani_fecha) as year_indice,extract(month from eveani.eveani_fecha) as mont_indice,eveani.id ,ani.id as idanimal,
ani.ani_rp,eveani.eveani_fecha,eveani.eveani_evento ,ani.ani_nombre ,eve.eve_descripcion 
FROM eventoanimal eveani
INNER JOIN animales ani ON ani.id = eveani.eveani_animal
INNER JOIN evento eve ON eve.id = eveani.eveani_evento WHERE ani.id = 1
ORDER BY year_indice,mont_indice

 */