<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");
 
//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Departamento extends DataMapper
{
  public $table = "departamento";  
  //public $has_many = array("provincia");
}