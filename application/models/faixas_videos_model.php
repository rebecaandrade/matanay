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

    public function buscar_entidades(){
        return $this->db->get('entidade_has_faixa_video')->result();
    }

    public function buscar_faixas($qtde=0, $inicio=0){
        if($qtde > 0) $this->db->limit($qtde, $inicio);
        $this->db->where('excluido =', NULL);
        return $this->db->get('faixa_video');
    }

    public function atualizar_faixa($dados){
        $this->db->where('idFaixa', $dados['idFaixa']);
        return $this->db->update('faixa_video', $dados);
    }

    public function buscar_dados($id){
        $this->db->where('idFaixa', $id);
        return $this->db->get('faixa_video')->row();
    }

    public function cadastrar_faixa($faixa, $artistas, $percentual_artistas){
        $this->db->trans_start();

        if(is_string($faixa['isrc'])){
            $faixa['isrc'] = str_replace ("-", "", $faixa['isrc']);
        }

        $this->db->insert('faixa_video', $faixa);
        $faixa_id = $this->db->insert_id();

        foreach($artistas as $artista->idEntidade){
            $artista_faixa = array(
                'idFaixa_Video' => $faixa_id,
                'idEntidade' => $artista->idEntidade
            );
            $this->db->insert('entidade_has_faixa_video', $artista_faixa);
            $percentual_artista[] = $this->db->insert_id();
        }

        $this->db->trans_complete();

        /*if(strlen($faixa['isrc']) != 12){
            $this->session->set_userdata('mensagem', 'O código ISRC deve conter 12 caracteres.');
            return FALSE;
        }

        if(($faixa['percentual_artista'] + $faixa['percentual_autor'] + $faixa['percentual_produtor']) != 100){
            $this->session->set_userdata('mensagem', 'A soma das porcentagens não dá 100%');
            return FALSE;
        }*/
    }
	
}