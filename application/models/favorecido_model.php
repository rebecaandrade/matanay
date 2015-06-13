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

	public function buscar_favorecidos($qtde=0, $inicio=0){
		if($qtde > 0) $this->db->limit($qtde, $inicio);
        return $this->db->get('favorecido');
	}
	public function buscar_favorecido(){
	$this->db->select("*")->from("favorecido");
	$this->db->join("tipo_favorecido","tipo_favorecido.idTipo_Favorecido=favorecido.idTipo_Favorecido");
	$this->db->where("excluido", null);
	$dados=$this->db->get()->result();
	return $dados;
	}
	public function atualizar_favorecido($favorecido){
		$this->db->where('idFavorecido',$favorecido['idFavorecido']);
		return  $this->db->update('favorecido', $favorecido);
	}

	public function atualizar_telefone($telefone){
		$this->db->where('idTelefone_Favorecido',$telefone['idTelefone_Favorecido']);
		return  $this->db->update('telefone_favorecido', $telefone);
	}

	function buscar_telefone_especifico($id, $idtelefone){
    		$this->db->where('idFavorecido', $id);
        	return $this->db->get('telefone_favorecido')->result()[$idtelefone];
   	}

   	function buscar_identificacao_especifica($id){
    		$this->db->where('idTipo_Favorecido', $id);
        	return $this->db->get('tipo_favorecido')->result()[0];
   	}

	public function buscar_favorecido_especifica($id){
    		$this->db->where('idFavorecido', $id);
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
		$this->db->or_where("email",$dado);
		$query = $this->db->get("favorecido");

		return $query->result();
   	}









}
