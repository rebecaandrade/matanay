<?php

class Faixas_Videos_model extends CI_Model {

	public function buscar_artistas(){
        $this->db->select('*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 1');
        $this->db->where(array('excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_autores(){
        $this->db->select('*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 2');
        $this->db->where(array('excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_produtores(){
        $this->db->select('*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 3');
        $this->db->where(array('excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_entidades(){
        return $this->db->get('entidade_has_faixa_video')->result();
    }

    public function buscar_faixas($qtde=0, $inicio=0){
        if($qtde > 0) $this->db->limit($qtde, $inicio);
        $this->db->where('excluido =', NULL);
        return $this->db->get('faixa_video');
    }

    public function buscar_entidade_faixa($id, $tipo){
        $this->db->where('idFaixa', $id);
        $entidades_faixa = $this->db->get('entidade_has_faixa_video')->result();

        $result = array();

        foreach($entidades_faixa as $entidade){
                $this->db->where('idEntidade', $entidade->idEntidade);
                $dados = $this->db->get('entidade')->row();

                if($dados->idTipo_Entidade == $tipo) {
                    $entidade_faixa = array(
                        'idEntidade' => $entidade->idEntidade,
                        'idTipo_Entidade' => $dados->idTipo_Entidade,
                        'percentual' => $entidade->percentual
                    );
                    array_push($result, $entidade_faixa);
                }
        }
        return $result;
    }

    public function buscar_album_faixa($id){
        $this->db->where('idFaixa', $id);
        $albuns = $this->db->get('album_has_faixa')->result();

        $result = array();

        foreach($albuns as $album){
                $this->db->where('idAlbum', $album->idAlbum);
                $dados = $this->db->get('album')->row();
                $album_faixa = array(
                        'idAlbum' => $album->idAlbum,
                        'idFaixa' => $album->idFaixa,
                        'nome' => $dados->nome
                    );
                array_push($result, $album_faixa);
        }
        return $result;
    }

    public function atualizar_faixa($dados, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores){
        $this->db->trans_start();

        $this->db->where('idFaixa', $dados['idFaixa']);
        $this->db->update('faixa_video', $dados);

        $this->db->where('idFaixa', $dados['idFaixa']);
        $this->db->delete('entidade_has_faixa_video');

        $i = 0;
        foreach($artistas as $artista->idEntidade){
            $artista_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idEntidade' => $artista->idEntidade,
                'percentual' => $perc_artistas[$i]
            );
            $this->db->insert('entidade_has_faixa_video', $artista_faixa);
            $i++;
        }

        $i = 0;
        foreach($autores as $autor->idEntidade){
            $autor_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idEntidade' => $autor->idEntidade,
                'percentual' => $perc_autores[$i]
            );
            $this->db->insert('entidade_has_faixa_video', $autor_faixa);
            $i++;
        }

        $i = 0;
        foreach($produtores as $produtor->idEntidade){
            $produtor_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idEntidade' => $produtor->idEntidade,
                'percentual' => $perc_produtores[$i]
            );
            $this->db->insert('entidade_has_faixa_video', $produtor_faixa);
            $i++;
        }

        $this->db->trans_complete();
    }

    public function buscar_dados($id){
        $this->db->where('idFaixa', $id);
        return $this->db->get('faixa_video')->row();
    }

    public function cadastrar_faixa($faixa, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores){
        $this->db->trans_start();

        $this->db->insert('faixa_video', $faixa);
        $faixa_id = $this->db->insert_id();

        $i = 0;
        foreach($artistas as $artista->idEntidade){
            $artista_faixa = array(
                'idFaixa' => $faixa_id,
                'idEntidade' => $artista->idEntidade,
                'percentual' => $perc_artistas[$i]
            );
            $this->db->insert('entidade_has_faixa_video', $artista_faixa);
            $i++;
        }

        $i = 0;
        foreach($autores as $autor->idEntidade){
            $autor_faixa = array(
                'idFaixa' => $faixa_id,
                'idEntidade' => $autor->idEntidade,
                'percentual' => $perc_autores[$i]
            );
            $this->db->insert('entidade_has_faixa_video', $autor_faixa);
            $i++;
        }

        $i = 0;
        foreach($produtores as $produtor->idEntidade){
            if($produtor->idEntidade != NULL){
                $produtor_faixa = array(
                    'idFaixa' => $faixa_id,
                    'idEntidade' => $produtor->idEntidade,
                    'percentual' => $perc_produtores[$i]
                );
                $this->db->insert('entidade_has_faixa_video', $produtor_faixa);
                $i++;
            }
        }

        $this->db->trans_complete();
    }

    public function deletar($dados){
        $this->db->trans_start();

        $this->db->where('idFaixa', $dados['idFaixa']);
        $this->db->update('faixa_video', $dados);

        $this->db->trans_complete();
        return TRUE;
    }
	
    public function procurar_faixa($busca){
        $this->db->where('excluido =', NULL);
        $this->db->like("nome", $busca);
        $this->db->or_like("isrc", $busca);

        return $this->db->get("faixa_video")->result();
    }
}