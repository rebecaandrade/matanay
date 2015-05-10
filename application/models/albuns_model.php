<?php

class Albuns_model extends CI_Model {

	public function buscar_tipos(){
        $this->db->order_by('descricao', 'desc');
        return $this->db->get('tipo_album')->result();
    }

    public function buscar_faixas(){
        $this->db->order_by('nome', 'asc');
        return $this->db->get('faixa')->result();
    }
}