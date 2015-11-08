<?php

class Vendas_model extends CI_Model {
	public function cadastar_venda($data){
		return $this->db->insert('Vendas',$data);
	}

	public function buscar_vendas($idRelatorio){
		$this->db->select("*");
		$this->db->from('Vendas');
		$this->db->where('idRelatorio',$idRelatorio);
		return $this->db->get()->result();
	}
}