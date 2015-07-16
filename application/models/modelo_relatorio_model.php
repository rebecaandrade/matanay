<?php

class Modelo_relatorio_model extends CI_Model {

	public function buscar_tipo_modelo($id){
		$this->db->where('idTipo_Modelo',$id);
		return $this->db->get('tipo_modelo');
	}
	public function buscar_tipos_modelo(){
		return $this->db->get('tipo_modelo')->result();
	}
	public function cadastrar_modelo($post){
		return $this->db->insert('modelo',$post);
	}
}