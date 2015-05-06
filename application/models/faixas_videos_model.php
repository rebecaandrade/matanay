<?php

class Faixas_Videos_model extends CI_Model {

	public function buscar_artistas(){
        $this->db->where('idTipo_Entidade', 1);
        $this->db->order_by('nome', 'asc');
        return $this->db->get('entidade')->result();
    }

    public function buscar_autores(){
        $this->db->where('idTipo_Entidade', 2);
        $this->db->order_by('nome', 'asc');
        return $this->db->get('entidade')->result();
    }

    public function buscar_produtores(){
        $this->db->where('idTipo_Entidade', 3);
        $this->db->order_by('nome', 'asc');
        return $this->db->get('entidade')->result();
    }

    public function cadastrar_faixa($faixa){
        return $this->db->insert('faixa', $faixa);
    }
	
}