<?php
	
class entidade_model extends CI_Model{



	public function cadastrar_entidade($entidade){
		$this->db->insert('entidade',$entidade);
		return  $this->db->insert_id();
	}
	public function cadastrar_telefone($telefone){
		$this->db->insert('telefone',$telefone);
		return  $this->db->insert_id();
	}
	public function cadastrar_favorecido($favorecido){
		$this->db->insert('favorecido',$favorecido);
		return  $this->db->insert_id();
	}
	public function buscar_entidades(){
		$query=$this->db->query("SELECT * FROM entidade");
            return $query->result();
	}









}
