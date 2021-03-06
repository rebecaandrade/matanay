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
        return $this->db->get('Entidade_has_Faixa_Video')->result();
    }
    public function buscar_faixas($idCliente){
        $this->db->where('idCliente', $idCliente);
        $this->db->where('excluido =', NULL);
        return $this->db->get('Faixa_Video')->result();
    }

    public function buscar_all_faixas(){
        $this->db->where("idCliente", $this->session->userdata('id_cliente'));
        $this->db->where('excluido =', NULL);
        return $this->db->get('Faixa_Video')->result();
    }
    
    public function buscar_entidade_faixa($id, $tipo){
        $this->db->where('idFaixa', $id);
        $entidades_faixa = $this->db->get('Entidade_has_Faixa_Video')->result();
        $result = array();
        foreach($entidades_faixa as $entidade){
            if($entidade->tipoEntidade == $tipo) {
                $this->db->where('idEntidade', $entidade->idEntidade);
                $dados = $this->db->get('Entidade_has_Tipo_Entidade')->row();
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
        $albuns = $this->db->get('Album_has_Faixa')->result();
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
    public function atualizar_faixa($dados, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores){
        $this->db->trans_start();
        $this->db->where('idFaixa', $dados['idFaixa']);
        $this->db->update('Faixa_Video', $dados);
        $this->db->where('idFaixa', $dados['idFaixa']);
        $this->db->delete('Faixa_Video_has_Imposto');
        foreach($impostos as $imposto){
            $imposto_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idImposto' => $imposto
            );
            $this->db->insert('Faixa_Video_has_Imposto', $imposto_faixa);
        }
        $this->db->where('idFaixa', $dados['idFaixa']);
        $this->db->delete('Entidade_has_Faixa_Video');
        $i = 0;
        foreach($artistas as $artista){
            $artista_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idEntidade' => $artista,
                'tipoEntidade' => 1,
                'percentual' => $perc_artistas[$i]
            );
            $this->db->insert('Entidade_has_Faixa_Video', $artista_faixa);
            $i++;
        }
        $i = 0;
        foreach($autores as $autor){
            $autor_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idEntidade' => $autor,
                'tipoEntidade' => 2,
                'percentual' => $perc_autores[$i]
            );
            $this->db->insert('Entidade_has_Faixa_Video', $autor_faixa);
            $i++;
        }
        $i = 0;
        foreach($produtores as $produtor){
            $produtor_faixa = array(
                'idFaixa' => $dados['idFaixa'],
                'idEntidade' => $produtor,
                'tipoEntidade' => 3,
                'percentual' => $perc_produtores[$i]
            );
            $this->db->insert('Entidade_has_Faixa_Video', $produtor_faixa);
            $i++;
        }
        $this->db->trans_complete();
    }
    public function buscar_dados($id){
        $this->db->where('idFaixa', $id);
        return $this->db->get('Faixa_Video')->row();
    }
    public function buscar_impostos($idCliente){
        $this->db->where('idCliente', $idCliente);
        return $this->db->get('Imposto')->result();
    }
    public function buscar_impostos_faixa($id){
        $this->db->where('idFaixa', $id);
        return $this->db->get('Faixa_Video_has_Imposto')->result();
    }
    public function buscar_faixas_has_imposto(){
        return $this->db->get('Faixa_Video_has_Imposto')->result();
    }
    public function cadastrar_faixa($faixa, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores){
        $this->db->trans_start();
        $this->db->insert('Faixa_Video', $faixa);
        $faixa_id = $this->db->insert_id();
        foreach($impostos as $imposto){
            $imposto_faixa = array(
                'idFaixa' => $faixa_id,
                'idImposto' => $imposto
            );
            $this->db->insert('Faixa_Video_has_Imposto', $imposto_faixa);
        }
        $i = 0;
        foreach($artistas as $artista){
            $artista_faixa = array(
                'idFaixa' => $faixa_id,
                'idEntidade' => $artista,
                'tipoEntidade' => 1,
                'percentual' => $perc_artistas[$i]
            );
            $this->db->insert('Entidade_has_Faixa_Video', $artista_faixa);
            $i++;
        }
        $i = 0;
        foreach($autores as $autor){
            $autor_faixa = array(
                'idFaixa' => $faixa_id,
                'idEntidade' => $autor,
                'tipoEntidade' => 2,
                'percentual' => $perc_autores[$i]
            );
            $this->db->insert('Entidade_has_Faixa_Video', $autor_faixa);
            $i++;
        }
        $i = 0;
        foreach($produtores as $produtor){
            if($produtor != NULL){
                $produtor_faixa = array(
                    'idFaixa' => $faixa_id,
                    'idEntidade' => $produtor,
                    'tipoEntidade' => 3,
                    'percentual' => $perc_produtores[$i]
                );
                $this->db->insert('Entidade_has_Faixa_Video', $produtor_faixa);
                $i++;
            }
        }
        $this->db->trans_complete();
        return $faixa_id;
    }
    public function deletar($id){
        $this->db->where('idFaixa', $id);
        $dados['excluido'] = 1;
        $this->db->update('Faixa_Video', $dados);
    }
    
    public function procurar_faixa_isrc($busca){
        if($busca != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("isrc", $busca);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));
            return $this->db->get("Faixa_Video")->result()[0];
        } else {
            return NULL;
        }
    }

    public function existe_faixa_isrc($busca, $upc_ean){
        if($busca != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("isrc", $busca);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));
            $info = $this->db->get("Faixa_Video")->result()[0];
            if($info == NULL)
                return 0;
            else{
                $idFaixa = $info->idFaixa;
                
                $this->db->where('excluido =', NULL);
                $this->db->where("upc_ean", $upc_ean);
                $this->db->where("idCliente", $this->session->userdata('id_cliente'));
                $idAlbum = $this->db->get("Album")->result()[0]->idAlbum;


                $this->db->where('idFaixa', $idFaixa);
                $this->db->where('idAlbum', $idAlbum);
                $coneccao = $this->db->get('Album_has_Faixa')->result();

                if($coneccao == NULL){
                    return -1;
                }
                else
                    return 1;
            }
        } else {
            return NULL;
        }
    }

    public function existe_faixa_isrc_cadastro($isrc, $id){
        if($isrc != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("isrc", $isrc);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));

            $dados = $this->db->get("Faixa_Video")->result();

            $this->db->where('idFaixa', $id);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));
            $this->db->where('excluido =', NULL);
            $dadosAtual = $this->db->get('Faixa_Video')->result()[0];

            if ( $dados == NULL || $dadosAtual->isrc == $isrc)
                return 0;
            else
                return 1;

        } else{
            return NULL;
        }
    }

    public function cadastrar_faixa_simples($faixa){
        $this->db->insert('Faixa_Video', $faixa);
        return $this->db->insert_id();
    }
    public function cadastrar_album_has_faixa($tracklist){
        $this->db->insert('Album_has_Faixa', $tracklist);
        return $this->db->insert_id();
    }
    public function cadastrar_faixa_has_imposto($imposto_faixa){
        $this->db->insert('Faixa_Video_has_Imposto', $imposto_faixa);
    }
}