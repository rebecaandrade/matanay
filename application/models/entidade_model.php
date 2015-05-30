<?php
	
class Entidade_model extends CI_Model{



	public function cadastrar_entidade($entidade){
		$this->db->insert('entidade',$entidade);
		return  $this->db->insert_id();
	}
	public function cadastrar_telefone($telefone){
		$this->db->insert('telefone_entidade',$telefone);
		return  $this->db->insert_id();
	}
	public function buscar_entidades(){
		$query=$this->db->query("SELECT * FROM entidade");
            return $query->result();
	}
	function buscar_entidade_especifica($id){
    		$this->db->where('idEntidade', $id);
        	return $this->db->get('entidade')->result()[0];
   	}
	function buscar_telefone_especifico($id, $idtelefone){
    		$this->db->where('idEntidade', $id);
        	return $this->db->get('telefone')->result()[$idtelefone];
   	}
   	function buscar_contar_telefones($id, $idtelefone){
    		$this->db->where('idEntidade', $id);
        	return $this->db->count_all_results('telefone');
   	}
   	function buscar_identificacao_especifica($id){
    		$this->db->where('idTipo_Entidade', $id);
        	return $this->db->get('tipo_entidade')->result()[0];
   	}
   	public function atualizar_entidade($entidade){
		$this->db->where('idEntidade',$entidade['idEntidade']);
		return  $this->db->update('entidade', $entidade);
	}
	public function atualizar_telefone($telefone){
		$this->db->where('idTelefone',$telefone['idTelefone']);
		return  $this->db->update('telefone', $telefone);
	}
	public function procurar_entidade($dado){
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
