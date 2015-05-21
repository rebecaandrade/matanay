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

    public function buscar_artistas(){
        $this->db->where('idTipo_Entidade', 1);
        $this->db->order_by('nome', 'asc');
        return $this->db->get('entidade')->result();
    }

    public function buscar_albuns($qtde=0, $inicio=0){
        if($qtde > 0) $this->db->limit($qtde, $inicio);
        return $this->db->get('album');
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
			$this->db->insert('faixa_has_album', $tracklist);
		}

		$this->db->trans_complete();
	}
}