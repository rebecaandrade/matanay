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
	public function deletar_modelo($id){
		$array = array(
					'excluido' => 1
				);
		$this->db->where('idModelo',$id);
		return $this->db->update('modelo',$array);
	}
	public function buscar_modelos(){
		$this->db->select("*");
		$this->db->from('modelo');
		$this->db->where('excluido',NULL);
		$this->db->join('tipo_modelo', 'tipo_modelo.idTipo_Modelo = modelo.idTipo_Modelo');
		return $this->db->get()->result();
	}
}