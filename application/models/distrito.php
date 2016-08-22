<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");
 
//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Distrito extends DataMapper
{
  public $table = "distrito";
  
 // public $has_many = array("empresa");
 // public $has_one = array("provincia"); 


}