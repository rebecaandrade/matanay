<?php  /*FEITO POR MIM JADIEL*/
	
class Imposto_model extends CI_Model{

	public function buscar_impostos(){
        return $this->db->get('Imposto')->result();

	}

	public function buscar_imposto($idImposto){
        $this->db->where('idImposto', $idImposto);
        $this->db->where('excluido', null);
        return $this->db->get('Imposto')->row();

	}

	public function tipo_imposto($idImposto){
        $this->db->select('descricao')->from('Imposto');
        $this->db->where('Imposto.idImposto', $idImposto);
        $this->db->join('Tipo_Imposto', ' Tipo_Imposto.idTipo_Imposto = Imposto.idTipo_Imposto');
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
    		"SELECT Imposto.nome, Imposto.valor, Imposto.idCliente, Tipo_Imposto.descricao, Faixa_Video_has_Imposto.idFaixa
			FROM Imposto
			JOIN Faixa_Video_has_Imposto
			ON Imposto.idImposto = Faixa_Video_has_Imposto.idImposto
			JOIN Tipo_Tmposto
			ON tipo_Imposto.idTipo_Imposto = Imposto.idTipo_Imposto
			WHERE imposto.excluido is null;
		");
		return $query->result();
    }

    public function pegar_impostos_album(){
    	$query = $this->db->query(
    		"SELECT Imposto.nome, Imposto.valor, Imposto.idCliente, Tipo_Imposto.descricao, Album_has_Imposto.idAlbum
			FROM Imposto
			JOIN Album_has_Imposto
			ON Imposto.idImposto = Album_has_Imposto.idImposto
			JOIN Tipo_Imposto
			ON tipo_Imposto.idTipo_Imposto = Imposto.idTipo_Imposto
			WHERE Imposto.excluido is null;
		");
		return $query->result();
    }


}