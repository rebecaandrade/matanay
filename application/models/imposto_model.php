<?php  /*FEITO POR MIM JADIEL*/
	
class Imposto_model extends CI_Model{

	public function buscar_imposto(){
		$query=$this->db->query("SELECT * FROM imposto");
        return $query->result();
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