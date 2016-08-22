<?php

function get_buttons($id,$controller)
{
    $ci= & get_instance();
    $html='<span>';
    $html .='<a class="btn btn-success btn-xs " href="'.  base_url().$controller.'/edit/'.$id.'" title="editar" ><i class="fa fa-edit"></i></a> ';
    $html .='<a class="btn btn-danger btn-xs " onclick="eliminar('.$id.')"   title="eliminar"><i class="fa fa-trash-o"></i></a>';
    $html.='</span>';
    
    return $html;
}

function get_check($id)
{
    $ci= & get_instance();
    $html='<center><label class="checkbox">';
    $html .='<input type="radio" name="selrow" class="selrow" value="'.$id.'"  ><i></i> ';    
    $html.='</label></center>';
    
    return $html;
}


function get_data_control($id,$fecha,$opt){
    $ci = & get_instance();
    $sql = "SELECT * FROM controles
    WHERE animal_id = ".$id."
    AND fechacontrol = '".date("Y-m-d",strtotime($fecha))."' ";
    $res = $ci->db->query($sql);
    
    $resp = $res->result_array();
    
    $html = "";
    
    if(count($resp) > 0){
            foreach ($resp as $r){
                if($opt == 1){
                    $html = $html.$r["control1"];
                }  else {
                    $html = $html.$r["control2"];
                }
            }
    }else{
        if($opt == 1){
            $html = $html."ju";
        }else{
            $html = $html."ju";
        }
        
    }
    return $html;
   
    
}

function  get_data_evento($id,$anio,$mes){
    $ci   = & get_instance();  
    $res  =$ci->db->query("SELECT 
 extract(year from eveani.eveani_fecha) as year_indice,
 extract(month from eveani.eveani_fecha) as mont_indice,
 extract(day from eveani.eveani_fecha) as day_indice,
 eveani.id ,ani.id as idanimal,eveani_refevento,
ani.ani_rp,eveani.eveani_fecha,eveani.eveani_evento ,ani.ani_nombre ,eve.eve_descripcion ,eve.eve_simbolo,eve.eve_color
FROM eventoanimal eveani
INNER JOIN animales ani ON ani.id = eveani.eveani_animal
INNER JOIN evento eve ON eve.id = eveani.eveani_evento 
WHERE ani.id = ".(int)$id."
AND extract(year from eveani.eveani_fecha) = ".(int)$anio."
AND extract(month from eveani.eveani_fecha) = ".(int)$mes."
ORDER BY year_indice,mont_indice");
    $resp = $res->result_array();
    
    $html = "";
    foreach ($resp as $r){
        
        $html = $html."<span class='badge' onclick='ediate(".$r["eveani_refevento"].",".$r["eveani_evento"].")'  style='background:".$r["eve_color"].";' ><i class='".$r["eve_simbolo"]."'></i>".$r["day_indice"]." </span>";
    }
    
    print $html;
    
    
}

function menu_levels($id){
        $ci= & get_instance();
        $perid = $ci->session->userdata('perfil');
        $where = array('keyperm.perfil_id' => $perid, 'modu.estado' => 'A', 'keyperm.estado' => 'A', 'modu.mod_padre' => $id);
        $query = $ci->db
                ->select('modu.id,modu.mod_descripcion as descripcion,modu.mod_url,modu.mod_padre,modu.mod_icono')
                ->from('seguridad.permisos as keyperm ')
                ->join('seguridad.modulos as modu', 'keyperm.modulo_id = modu.id', 'inner')
                ->join('seguridad.perfiles as per', 'per.id = keyperm.perfil_id', 'inner')
                ->where($where)
                ->order_by("modu.mod_orden", "asc")
                ->get();
        //echo $this->db->last_query();exit();
        $opt = $query->result_array();

        $html = "";

        foreach ($opt as $o) {
            if ($o["mod_url"] == "#") {
                $html.="<li>";
                $html.="<a href='#'><i class='fa fa-lg fa-fw " . $o["mod_icono"] . "'></i> <span class='menu-item-parent' >" .ucfirst(strtolower($o["descripcion"])) . "</span></a>";
                $html.="<ul>";
                $html.=menu_levels($o["id"]);
                $html.="</ul>";
                $html.="</li>";
            } else {
                #if($o["mod_padre"] == "0"){
                   #$html.="<li class=''><a href='" . base_url() . $o["mod_url"] . "'><i class='fa fa-lg " . $o["mod_icono"] . "'></i> <span>" . $o["descripcion"] . "</span></a></li>";
                #}else{
                   $html.="<li><a href='" .strtolower($o["mod_url"]). "'> " .ucfirst(strtolower($o["descripcion"])) . "</a></li>";
                  #  $html.="<li><a href='" . base_url() . $o["mod_url"] . "'>" . $o["descripcion"] . "</a></li>";
                #}

            }
        }
        return $html;
}

