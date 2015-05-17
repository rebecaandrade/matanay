<?php  /*FEITO POR MIM JADIEL*/
	
class Imposto_model extends CI_Model{



	public function cadastrar_imposto($imposto){
		$this->db->insert('imposto',$imposto);
		return  $this->db->insert_id();
	}
}