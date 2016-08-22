<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");
 

class Usuario extends DataMapper
{
 
  public $table = "seguridad.usuarios"; 

  
 public $validation = array(
        'usu_nombre' => array(
            'label' => 'Nombres',
            'rules' => array('required'),
        ),
        'usu_apellidos' => array(
            'label' => 'Apellidos',
            'rules' => array('required'),
        ),    
        'usu_usuario' => array(
            'label' => 'USUARIO',
            'rules' => array('required','unique'),
        ),
        'usu_password' => array(
            'label' => 'PASSWORD',
            'rules' => array('required'),
        ),
        'perfil_id' => array(
            'label' => 'PERFIL',
            'rules' => array('required'),
        ),
    );
 
 
}