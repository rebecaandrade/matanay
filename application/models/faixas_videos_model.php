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

    public function buscar_faixas($qtde=0, $inicio=0){
        if($qtde > 0) $this->db->limit($qtde, $inicio);
        return $this->db->get('faixa');
    }

    public function cadastrar_faixa($faixa){

        if(is_string($faixa['isrc'])){
            $faixa['isrc'] = str_replace ("-", "", $faixa['isrc']);
        }

        if(strlen($faixa['isrc']) != 12){
            $this->session->set_userdata('mensagem', 'O código ISRC deve conter 12 caracteres.');
            return FALSE;
        }

        if(($faixa['percentual_artista'] + $faixa['percentual_autor'] + $faixa['percentual_produtor']) != 100){
            $this->session->set_userdata('mensagem', 'A soma das porcentagens não dá 100%');
            return FALSE;
        }

        return $this->db->insert('faixa', $faixa);
    }
	
}