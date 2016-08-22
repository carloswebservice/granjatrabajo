<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Permisos extends CI_Controller {

    public function __construct() {
        parent::__construct();       
        if(!$this->session->userdata('is_logued')){
            redirect(base_url(), "refresh");
        } 
    }
    
    public function get() {
        error_reporting(0);
        $per_id = $_GET['per_id'];
        
        
        $datos = array();
        
        $padres = $this->db->query("SELECT m.mod_descripcion, m.id, m.mod_url, mp.estado
                FROM seguridad.permisos mp inner join seguridad.modulos m on mp.modulo_id = m.id
                WHERE m.mod_padre = 0 and m.estado = 'A' and mp.perfil_id = $per_id and m.id <> 0
                ORDER BY m.mod_orden");

        foreach ($padres->result() as $padre) {

            $hijos = $this->db->query("SELECT m.mod_descripcion, m.id, m.mod_url, mp.estado
                FROM seguridad.permisos mp inner join seguridad.modulos m on mp.modulo_id = m.id
                WHERE m.mod_padre = $padre->id and m.estado = 'A' and mp.perfil_id = $per_id and m.id <> 0
                ORDER BY m.mod_orden");
            $numHijos = $hijos->num_rows();

            $value->data = $padre->mod_descripcion;
            $value->attr->id = $padre->id;

            if ($numHijos > 0) {
                $value->state = "closed";

                $datoshijos = array();
                foreach ($hijos->result() as $hijo) {
                    $valueh->data = $hijo->mod_descripcion;
                    $valueh->attr->id = $hijo->id;

                    if ($hijo->estado == 'A')
                        $valueh->attr->class = "jstree-checked";
                    else
                        $valueh->attr->class = "jstree-unchecked";

                    $datoshijos[] = $valueh;

                    $valueh = null;
                }

                $value->children = $datoshijos;
            }else {
                if ($padre->estado == 'A') {
                    $value->attr->class = "jstree-checked";
                }
            }

            $datos[] = $value;
            $value = null;
        }
        echo json_encode($datos);
    }

    public function actualizarPermisos() {
        if (isset($_POST['permisos'])) {
            $permisos = $_POST['permisos'];
            foreach ($permisos as $value) {
                $this->db->query("UPDATE seguridad.permisos SET estado = '{$value['val']}' WHERE modulo_id = {$value['idm']} and perfil_id = {$value['idp']}");
//                $permiso->find(array('mod_id' => $value['idm'], 'per_id' => $value['idp']));
//                $permiso->estado = $value['val'];
//                $permiso->update();
            }
            echo json_encode(array("ok"));
        }
    }

        
  
}