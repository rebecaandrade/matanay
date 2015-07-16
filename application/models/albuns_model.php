<?php

class Albuns_model extends CI_Model {

	public function buscar_tipos(){
        $this->db->order_by('descricao', 'desc');
        return $this->db->get('tipo_album')->result();
    }

    public function buscar_faixas(){
        $this->db->order_by('nome', 'asc');
        $this->db->where('excluido =', NULL);
        return $this->db->get('faixa_video')->result();
    }

    public function buscar_artistas(){
        $this->db->select('*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 1');
        $this->db->where(array('ent.excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
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
			'idEntidade' => $artista,
            'idAlbum' => $album_id
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
        return TRUE;
	}

    public function atualizar_album($dados, $novo_artista, $prev_artista){
        $this->db->trans_start();

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->update('album', $dados);

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->where('idEntidade', $prev_artista);
        $this->db->delete('entidade_has_album');

        $this->db->insert('entidade_has_album', $novo_artista);

        $this->db->trans_complete();
        return TRUE;
    }

    public function atualizar_faixas($album, $faixas){
        $this->db->trans_start();

        $this->db->where('idAlbum', $album['idAlbum']);
        $this->db->update('album', $album);

        $this->db->where('idAlbum', $album['idAlbum']);
        $this->db->delete('album_has_faixa');

        foreach($faixas as $faixa->idFaixa){
            $tracklist = array(
                'idAlbum' => $album['idAlbum'],
                'idFaixa' => $faixa->idFaixa
            );
            $this->db->insert('album_has_faixa', $tracklist);
        }

        $this->db->trans_complete();
        return TRUE;
    }

    public function deletar($dados){
        $this->db->trans_start();

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->update('album', $dados);

        $this->db->trans_complete();
        return TRUE;
    }

    public function procurar_album($busca){
        $this->db->where('excluido =', NULL);
        $this->db->like("nome", $busca);
        $this->db->or_like("upc_ean", $busca);
        $this->db->or_like("codigo_catalogo", $busca);

        return $this->db->get("album")->result();
    }
}