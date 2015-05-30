<?php
	
class Favorecido_model extends CI_Model{


	public function cadastrar_favorecido($favorecido){
		$this->db->insert('favorecido',$favorecido);
		return  $this->db->insert_id();
	}
	public function cadastrar_telefone($telefone){
		$this->db->insert('telefone_favorecido',$telefone);
		return  $this->db->insert_id();
}
	public function buscar_favorecido(){
		$query=$this->db->query("SELECT * FROM favorecido");
            return $query->result();
	}
	public function buscar_favorecido_especifica($id){
    		$this->db->where('Entidade_idEntidade', $id);
        	return $this->db->get('favorecido')->result()[0];
   	}
   	public function procurar_favorecido($dado){
   		$this->db->like("nome",$dado);
		$this->db->or_like("conta",$dado);
		$this->db->or_like("agencia",$dado);
		$this->db->or_like("banco",$dado);
		$this->db->or_where("cpf",$dado);
		$this->db->or_where("cnpj",$dado);
		$this->db->or_like("contato",$dado);
		$this->db->or_like("idTipo_Favorecido",$dado);
		$this->db->or_like("email",$dado);
		$query = $this->db->get("favorecido");

		return $query->result();
   	}









}
