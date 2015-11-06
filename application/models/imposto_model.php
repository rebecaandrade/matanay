<?php  /*FEITO POR MIM JADIEL*/
	
class Imposto_model extends CI_Model{

	public function buscar_imposto(){
        return $this->db->get('imposto')->result();

	}

	public function tipo_imposto($idImposto){
        $this->db->select('descricao')->from('imposto');
        $this->db->where('imposto.idImposto', $idImposto);
        $this->db->join('tipo_imposto', ' tipo_imposto.idTipo_Imposto = imposto.idTipo_Imposto');
        return $this->db->get()->result();
    }

	public function cadastrar_imposto($imposto){
		$this->db->insert('imposto',$imposto);
		return  $this->db->insert_id();
	}
	

	public function deletar($id){
        $this->db->where('idImposto', $id);
        return $this->db->delete('imposto');
    }

    public function pegar_impostos_faixa(){
    	$query = $this->db->query(
    		"SELECT imposto.nome, imposto.valor, imposto.idCliente, tipo_imposto.descricao, faixa_video_has_imposto.idFaixa
			FROM imposto
			JOIN faixa_video_has_imposto
			ON imposto.idImposto = faixa_video_has_imposto.idImposto
			JOIN tipo_imposto
			ON tipo_imposto.idTipo_Imposto = imposto.idTipo_Imposto
			WHERE imposto.excluido is null;
		");
		return $query->result();
    }

    public function pegar_impostos_album(){
    	$query = $this->db->query(
    		"SELECT imposto.nome, imposto.valor, imposto.idCliente, tipo_imposto.descricao, album_has_imposto.idAlbum
			FROM imposto
			JOIN album_has_imposto
			ON imposto.idImposto = album_has_imposto.idImposto
			JOIN tipo_imposto
			ON tipo_imposto.idTipo_Imposto = imposto.idTipo_Imposto
			WHERE imposto.excluido is null;
		");
		return $query->result();
    }


}