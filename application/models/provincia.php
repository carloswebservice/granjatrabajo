<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");
 
//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Provincia extends DataMapper
{
  public $table = "provincia";
  
  //public $has_many = array("distrito");
  //public $has_one = array("departamento"); 
 
    

}