<?php

class Faixas_Videos_model extends CI_Model {

	public function buscar_artistas($idCliente){
        $this->db->select('*')->where('idCliente', $idCliente)->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 1');
        $this->db->where(array('ent.excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_autores($idCliente){
        $this->db->select('*')->where('idCliente', $idCliente)->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 2');
        $this->db->where(array('ent.excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_produtores($idCliente){
        $this->db->select('*')->where('idCliente', $idCliente)->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te','te.idTipo_Entidade = eht.idTipo_Entidade AND te.idTipo_Entidade = 3');
        $this->db->where(array('ent.excluido' => NULL));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_entidades($tipo){
        $this->db->where('tipoEntidade', $tipo);
        return $this->db->get('entidade_has_faixa_video')->result();
    }

    public function buscar_faixas($idCliente){
        $this->db->where('idCliente', $idCliente);
        $this->db->where('excluido =', NULL);
        return $this->db->get('faixa_video')->result();
    }

    public function buscar_entidade_faixa($id, $tipo){
        $this->db->where('idFaixa', $id);
        $entidades_faixa = $this->db->get('entidade_has_faixa_video')->result();

        $result = array();

        foreach($entidades_faixa as $entidade){
            if($entidade->tipoEntidade == $tipo) {
                $this->db->where('idEntidade', $entidade->idEntidade);
                $dados = $this->db->get('entidade_has_tipo_entidade')->row();

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
                'tipoEntidade' => 1,
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
                'tipoEntidade' => 2,
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
                'tipoEntidade' => 3,
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

    public function buscar_impostos($idCliente){
        $this->db->where('idCliente', $idCliente);
        return $this->db->get('imposto')->result();
    }

    public function buscar_impostos_faixa($id){
        $this->db->where('idFaixa', $id);
        return $this->db->get('faixa_video_has_imposto')->result();
    }

    public function cadastrar_faixa($faixa, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores){
        $this->db->trans_start();

        $this->db->insert('faixa_video', $faixa);
        $faixa_id = $this->db->insert_id();

        foreach($impostos as $imposto->idImposto){
            $imposto_faixa = array(
                'idFaixa' => $faixa_id,
                'idImposto' => $imposto->idImposto
            );
            $this->db->insert('faixa_video_has_imposto', $imposto_faixa);
        }

        $i = 0;
        foreach($artistas as $artista->idEntidade){
            $artista_faixa = array(
                'idFaixa' => $faixa_id,
                'idEntidade' => $artista->idEntidade,
                'tipoEntidade' => 1,
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
                'tipoEntidade' => 2,
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
                    'tipoEntidade' => 3,
                    'percentual' => $perc_produtores[$i]
                );
                $this->db->insert('entidade_has_faixa_video', $produtor_faixa);
                $i++;
            }
        }

        $this->db->trans_complete();
    }

    public function deletar($id){
        $this->db->where('idFaixa', $id);
        $dados['excluido'] = 1;
        $this->db->update('faixa_video', $dados);
    }
	
    public function procurar_faixa($busca){
        $this->db->where('excluido =', NULL);
        $this->db->like("nome", $busca);
        $this->db->or_like("isrc", $busca);

        return $this->db->get("faixa_video")->result();
    }
}