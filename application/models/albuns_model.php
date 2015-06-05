<?php

class Albuns_model extends CI_Model {

	public function buscar_tipos(){
        $this->db->order_by('descricao', 'desc');
        return $this->db->get('tipo_album')->result();
    }

    public function buscar_faixas(){
        $this->db->order_by('nome', 'asc');
        return $this->db->get('faixa_video')->result();
    }

    public function buscar_artistas(){
        $this->db->where('idTipo_Entidade', 1);
        $this->db->order_by('nome', 'asc');
        return $this->db->get('entidade')->result();
    }

    public function buscar_albuns($qtde=0, $inicio=0){
        if($qtde > 0) $this->db->limit($qtde, $inicio);
        $this->db->where('excluido =', NULL);
        return $this->db->get('album');
    }

    public function buscar_dados($id){
        $this->db->where('idAlbum', $id);
        return $this->db->get('album')->row();
    }

    public function buscar_artista_album($id){
        $this->db->where('idAlbum', $id);
        return $this->db->get('entidade_has_album')->row();
    }

    public function buscar_entidades(){
        return $this->db->get('entidade_has_album')->result();
    }

    public function buscar_tracklist($id){
        $this->db->where('idAlbum', $id);
        return $this->db->get('album_has_faixa')->result();
    }

    public function cadastrar_album($album, $artista, $faixas){
    	$this->db->trans_start();
		$this->db->insert('album', $album);
		$album_id = $this->db->insert_id();

		$artista_album = array(
			'idAlbum' => $album_id,
			'idEntidade' => $artista
		);
		$this->db->insert('entidade_has_album', $artista_album);

		foreach($faixas as $faixa->idFaixa){
			$tracklist = array(
				'idAlbum' => $album_id,
				'idFaixa' => $faixa->idFaixa
			);
			$this->db->insert('album_has_faixa', $tracklist);
		}

		$this->db->trans_complete();
	}

    public function atualizar_album($dados, $artista){
        $this->db->trans_start();

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->update('album', $dados);

        $this->db->where('idAlbum', $artista['idAlbum']);
        $this->db->update('entidade_has_album', $artista);

        $this->db->trans_complete();
    }

    public function deletar($dados){
        $this->db->trans_start();

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->update('album', $dados);

        $this->db->trans_complete();
    }
}