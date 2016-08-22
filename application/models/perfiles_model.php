<?php

class perfiles_model extends CI_Model {

    function __construct() {
        parent::__construct();
    } 

    
     public function getperfilid($id) {
        $where = array("per_id" => $id);

        $query = $this->db
                ->select('per_id,per_descripcion')
                ->from('perfiles')
                ->where($where)
                ->get();        
        return $query->row();       
    }
    
    public function saveperfil($datos = array()) {
        $this->db->insert("perfiles", $datos);
        return true;
    } 

    public function editperfil($datos = array(), $id) {
        $this->db->where('per_id', $id);
        $this->db->update("perfiles", $datos);
        return true;
    }

    public function deleteperfil($id) {
        $this->db->delete('perfiles', array('per_id' => $id));
        return true;
    }

   
}
