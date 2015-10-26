<?php

class Vendas_model extends CI_Model {
	public function cadastar_venda($data){
		return $this->db->insert('vendas',$data);
	}

	public function buscar_vendas($idRelatorio){
		$this->db->select("*");
		$this->db->from('vendas');
		$this->db->where('idRelatorio',$idRelatorio);
		return $this->db->get()->result();
	}
}