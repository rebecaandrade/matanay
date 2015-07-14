<?php
	
class Favorecido_model extends CI_Model{


	public function cadastrar_favorecido($favorecido){
		$this->db->insert('favorecido',$favorecido);
		return  $this->db->insert_id();
	}
	
	public function cadastra_fav_has_tipo_fav($fav_has_tipo_fav){
		foreach ($fav_has_tipo_fav as $fav) {
			$this->db->insert('favorecido_has_tipo_favorecido', $fav);
		}
	}
	
	public function cadastrar_telefone($telefone){
		$this->db->insert('telefone_favorecido',$telefone);
		return  $this->db->insert_id();
	}

	public function buscar_favorecidos($qtde=0, $inicio=0){
		if($qtde > 0) $this->db->limit($qtde, $inicio);
        return $this->db->get('favorecido');
	}

	public function buscar_favorecido($qtde = 0, $inicio = 0){
		//$this->db->select('idFavorecido,nome AS Fnome')->from('Favorecido fav');
        if ($qtde > 0) $this->db->limit($qtde, $inicio);
        $this->db->select('fav.*,eht.*,te.*')->from('Favorecido fav');
        $this->db->join('Favorecido_has_Tipo_Favorecido eht', 'eht.idFavorecido = fav.idFavorecido');
        $this->db->join('Tipo_Favorecido te', 'te.idTipo_Favorecido = eht.idTipo_Favorecido');
        $this->db->where(array('fav.excluido' => NULL));
        $dados = $this->db->get()->result();
        /*foreach ($dados as $key => $dado) {
            $dados[$key]->Fnome = $this->db->where('idFavorecido', $dado->idFavorecido)->get('Favorecido')->row()->nome;
        }*/
        //die(var_dump($dados));
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

	function buscar_telefone_especifico($id, $indicetelefone){
    		$this->db->where('idFavorecido', $id);
    		$query=$this->db->get('telefone_favorecido')->result();
        	return $query[$indicetelefone];
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
    
    public function mudar_favorecido_para_excluidos($id)
    {
        $this->db->where('idFavorecido', $id);
        $dados['excluido'] = 1;
        $this->db->update('Favorecido', $dados);
    }









}
