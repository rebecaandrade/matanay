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

    public function cadastrar_album($album, $faixas, $n){
    	
		
		return $this->db->insert('album', $album);
		$album_id = $this->db->insert_id();

		for($i = 0; $i <= $n; $i++){
			$tracklist = array(
				'idAlbum' => $album_id,
				'idFaixa' => $faixas['idFaixa'+$i]
			);
			$this->db->insert('faixa_has_album', $tracklist);
		}

		
	}
}