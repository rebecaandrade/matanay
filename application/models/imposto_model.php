<?php  /*FEITO POR MIM JADIEL*/
	
class Imposto_model extends CI_Model{

	public function buscar_imposto(){
		$query=$this->db->query("SELECT * FROM imposto");
        return $query->result();
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
	

	function deletar($id){
        $this->db->where('idImposto', $id);
        return $this->db->delete('imposto');
    }
}