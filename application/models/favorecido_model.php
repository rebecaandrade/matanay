<?php
	
class favorecido_model extends CI_Model{


	public function cadastrar_favorecido($favorecido){
		$this->db->insert('favorecido',$favorecido);
		return  $this->db->insert_id();
	}
	public function buscar_favorecido(){
		$query=$this->db->query("SELECT * FROM favorecido");
            return $query->result();
	}
	function buscar_favorecido_especifica($id){
    		$this->db->where('Entidade_idEntidade', $id);
        	return $this->db->get('favorecido')->result()[0];
   	}









}
