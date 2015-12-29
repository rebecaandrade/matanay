<?php  /*FEITO POR MIM JADIEL*/
	
class Imposto_model extends CI_Model{

	public function buscar_impostos(){
        return $this->db->get('imposto')->result();

	}

	public function buscar_imposto($idImposto){
        $this->db->where('idImposto', $idImposto);
        $this->db->where('excluido', null);
        return $this->db->get('imposto')->row();

	}

	public function tipo_imposto($idImposto){
        $this->db->select('descricao')->from('Imposto');
        $this->db->where('imposto.idImposto', $idImposto);
        $this->db->join('Tipo_Imposto', ' Tipo_Imposto.idTipo_Imposto = imposto.idTipo_Imposto');
        return $this->db->get()->row();
    }

	public function cadastrar_imposto($imposto){
		$this->db->insert('Imposto',$imposto);
		return  $this->db->insert_id();
	}
	

	public function deletar($id){
        $this->db->where('idImposto', $id);
        return $this->db->delete('Imposto');
    }

    public function pegar_impostos_faixa(){
    	$query = $this->db->query(
    		"SELECT imposto.nome, imposto.valor, imposto.idCliente, tipo_imposto.descricao, faixa_video_has_imposto.idFaixa
			FROM imposto
			JOIN Faixa_Video_has_Imposto
			ON imposto.idImposto = faixa_video_has_imposto.idImposto
			JOIN Tipo_Tmposto
			ON tipo_imposto.idTipo_Imposto = imposto.idTipo_Imposto
			WHERE imposto.excluido is null;
		");
		return $query->result();
    }

    public function pegar_impostos_album(){
    	$query = $this->db->query(
    		"SELECT imposto.nome, imposto.valor, imposto.idCliente, tipo_imposto.descricao, album_has_imposto.idAlbum
			FROM Imposto
			JOIN Album_has_Imposto
			ON imposto.idImposto = album_has_imposto.idImposto
			JOIN Tipo_Imposto
			ON tipo_imposto.idTipo_Imposto = imposto.idTipo_Imposto
			WHERE imposto.excluido is null;
		");
		return $query->result();
    }


}