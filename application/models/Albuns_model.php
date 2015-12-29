<?php

class Albuns_model extends CI_Model {

	public function buscar_tipos(){
        $this->db->order_by('descricao', 'desc');
        return $this->db->get('Tipo_Album')->result();
    }

    public function buscar_faixas($idCliente){
        $this->db->order_by('nome', 'asc');
        $this->db->where('idCliente',$idCliente);
        $this->db->where('excluido =', NULL);
        return $this->db->get('Faixa_Video')->result();
    }

    public function buscar_artistas($idCliente){
        $this->db->select('*')->where('idCliente',$idCliente)->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 1');
        $this->db->where(array('ent.excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_albuns($idCliente){
        $this->db->where('idCliente',$idCliente);
        $this->db->where('excluido =', NULL);
        return $this->db->get('Album')->result();
    }

    public function buscar_all_albuns(){
        $this->db->where('excluido =', NULL);
        return $this->db->get('Album')->result();
    }

    public function buscar_dados($id){
        $this->db->where('idAlbum', $id);
        return $this->db->get('Album')->row();
    }

    public function buscar_artista_album($id){
        $this->db->where('idAlbum', $id);
        return $this->db->get('Entidade_has_Album')->row();
    }

    public function buscar_entidades(){
        return $this->db->get('Entidade_has_Album')->result();
    }

    public function buscar_tracklist($id){
        $this->db->where('idAlbum', $id);
        return $this->db->get('Album_has_Faixa')->result();
    }

    public function buscar_impostos($idCliente){
        $this->db->where('idCliente', $idCliente);
        return $this->db->get('Imposto')->result();
    }

    public function buscar_impostos_album($id){
        $this->db->select('*')->from('Album_has_Imposto');
        $this->db->where('idAlbum', $id);
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function cadastrar_album($album, $artista, $faixas, $impostos){
    	$this->db->trans_start();
		$this->db->insert('Album', $album);
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
			$this->db->insert('Album_has_Faixa', $tracklist);
		}

        foreach($impostos as $imposto->idImposto){
            $imposto_album = array(
                'idAlbum' => $album_id,
                'idImposto' => $imposto->idImposto
            );
            $this->db->insert('Album_has_Imposto', $imposto_album);
        }

		$this->db->trans_complete();
        return TRUE;
	}

    public function cadastrar_album_simples($album){
        $this->db->insert('Album', $album);
        return $this->db->insert_id();

    }

    public function atualizar_album($dados, $impostos, $novo_artista, $prev_artista){
        $this->db->trans_start();

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->update('Album', $dados);

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->delete('Album_has_Imposto');

        foreach($impostos as $imposto->idImposto){
            $imposto_album = array(
                'idAlbum' => $dados['idAlbum'],
                'idImposto' => $imposto->idImposto
            );
            $this->db->insert('Album_has_Imposto', $imposto_album);
        }

        $this->db->where('idAlbum', $dados['idAlbum']);
        $this->db->where('idEntidade', $prev_artista);
        $this->db->delete('Entidade_has_Album');

        $this->db->insert('Entidade_has_Album', $novo_artista);

        $this->db->trans_complete();
        return TRUE;
    }

    public function atualizar_faixas($album, $faixas){
        $this->db->trans_start();

        $this->db->where('idAlbum', $album['idAlbum']);
        $this->db->update('Album', $album);

        $this->db->where('idAlbum', $album['idAlbum']);
        $this->db->delete('Album_has_Faixa');

        foreach($faixas as $faixa->idFaixa){
            $tracklist = array(
                'idAlbum' => $album['idAlbum'],
                'idFaixa' => $faixa->idFaixa
            );
            $this->db->insert('Album_has_Faixa', $tracklist);
        }

        $this->db->trans_complete();
        return TRUE;
    }

    public function deletar($id){
        $this->db->where('idAlbum', $id);
        $dados['excluido'] = 1;
        $this->db->update('Album', $dados);
    }

    public function procurar_album($busca){
        $this->db->where('excluido =', NULL);
        $this->db->like("nome", $busca);
        $this->db->or_like("upc_ean", $busca);
        $this->db->or_like("codigo_catalogo", $busca);

        return $this->db->get("Album")->result();
    }

    public function procurar_album_upc_ean($busca){
        if($busca != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("upc_ean", $busca);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));

            return $this->db->get("Album")->result()[0];
        } else{
            return NULL;
        }
    }

    public function existe_album_upc_ean($busca){
        if($busca != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("upc_ean", $busca);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));


            if ( $this->db->get("Album")->result() == NULL)
                return 0;
            else
                return 1;

        } else{
            return NULL;
        }
    }

    public function existe_album_upc_ean_cadastro($upc_ean, $id){
        if($upc_ean != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("upc_ean", $upc_ean);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));

            $dados = $this->db->get("Album")->result();

            $this->db->where('idAlbum', $id);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));
            $this->db->where('excluido =', NULL);
            $dadosAtual = $this->db->get('Album')->result()[0];

            if ( $dados == NULL || $dadosAtual->upc_ean == $upc_ean)
                return 0;
            else
                return 1;

        } else{
            return NULL;
        }
    }

    public function cadastrar_album_has_imposto($imposto_album){
        $this->db->insert('Album_has_Imposto', $imposto_album);
        return $this->db->insert_id();
    }

}