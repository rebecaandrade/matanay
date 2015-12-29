<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('relatorio_model');
        $this->load->model('cliente_model');
        $this->load->model('modelo_relatorio_model');
        $this->load->model('vendas_model');
        $this->load->model('albuns_model');
        $this->load->model('faixas_videos_model');
        $this->load->model('entidade_model');
        $this->load->model('favorecido_model');
        $this->load->model('imposto_model');
        $this->load->library('excel');
        $this->load->helper('myDirectory');
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
    }

    public function gerar_vendas() {
        $id_cliente = $this->session->userdata('cliente_id');
        $relatorios = $this->relatorio_model->busca_relatorios($id_cliente);
        //$modelos = $this->getModelos($relatorios);
        //$dados['modelos'] = $this->relatorio_model->buscar_modelos($id_cliente);
        $dados['artistas'] = $this->relatorio_model->busca_artistas($id_cliente);
        $dados['produtores'] = $this->relatorio_model->busca_produtores($id_cliente);
        $dados['autores'] = $this->relatorio_model->busca_autores($id_cliente);
        $dados['faixas'] = $this->relatorio_model->busca_faixas($id_cliente);
        $dados['albuns'] = $this->relatorio_model->busca_albuns($id_cliente);
        //$dados['modelos'] = $this->gera_modelos(50);
        //$dados['lojas'] = $modelos['lojas'];
        //$dados['territorios'] = $modelos['territorios'];
        //$dados['sublojas'] = $modelos['sublojas'];

        $this->load->view('relatorio/vendas', $dados);
        return;
    }

    public function listar_relatorios() {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados['relatorios'] = $this->relatorio_model->busca_relatorios($id_cliente);
        /*var_dump(end(end($dados))->arquivo);
        die;*/
        $this->load->view('relatorio/lista_relatorios', $dados);
    }

    public function deletar($id) {
        $this->relatorio_model->deletar($id);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('excluido_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('relatorio/listar_relatorios');
    }

    public function opcoes_relatorio() {
        $id_cliente = $this->session->userdata('cliente_id');
        
        $relatorios = $this->relatorio_model->busca_relatorios($id_cliente);

        $lojas[] = NULL;
        $sublojas[] = NULL;
        $territorios[] = NULL;

        foreach ($relatorios as $relatorio) {
            $vendas = $this->vendas_model->buscar_vendas($relatorio->idRelatorio);
            foreach ($vendas as $venda) {
                $venda->artistasInfo = $this->faixas_videos_model->buscar_entidade_faixa($venda->idFaixa,1);
                foreach ($venda->artistasInfo as $artistaInfo) {
                    $venda->artista[] = $this->entidade_model->buscar_entidade($artistaInfo['idEntidade']);
                }
                $venda->autoresInfo = $this->faixas_videos_model->buscar_entidade_faixa($venda->idFaixa,2);
                foreach ($venda->autoresInfo as $autorInfo) {
                    $venda->autor[] = $this->entidade_model->buscar_entidade($autorInfo['idEntidade']);    
                }
                
                $venda->produtoresInfo = $this->faixas_videos_model->buscar_entidade_faixa($venda->idFaixa,3);
                foreach ($venda->produtoresInfo as $produtorInfo) {
                    $venda->produtor[] = $this->entidade_model->buscar_entidade($produtorInfo['idEntidade']);
                }

                $lojas[] = $venda->loja;
                $sublojas[] = $venda->subloja;
                $territorios[] = $venda->territorio;
                $venda->apuracao = $relatorio->periodo_apuracao;
                $venda->impostos = $this->albuns_model->buscar_impostos_album($venda->idAlbum);
                foreach ($venda->impostos as $imposto) {
                    $venda->imposto[] = $this->imposto_model->buscar_imposto($imposto->idImposto);
                }
                $venda->imposto = array_unique($venda->imposto);
                $venda->faixaInfo = $this->faixas_videos_model->buscar_dados($venda->idFaixa);
                $venda->faixa = $venda->faixaInfo->nome;
                if($venda->faixaInfo->codigo_video == '')
                    $venda->produto = "Faixa";
                else
                    $venda->produto = "Video";
                $venda->albumInfo = $this->albuns_model->buscar_dados($venda->idAlbum);
                $venda->catalogo = $venda->albumInfo->codigo_catalogo;
                $venda->isrc = $venda->faixaInfo->isrc;
                $venda->upc = $venda->albumInfo->upc_ean;
                $venda->percentual_aplicado = $this->_calcularPercentual($this->entidade_model->buscar_entidade_has_faixa_id($venda->idFaixa),$venda->tipo);
                $venda->valor_pagar = $this->_calcularValorPagar($venda->qnt_vendida,$venda->valor_recebido,$venda->percentual_aplicado,$venda->imposto);
                $venda->receita = $this->_calcularReceita($venda->qnt_vendida,$venda->valor_recebido,$venda->percentual_aplicado);
                $venda->relatorio = $relatorio;
                $venda->apuracao = $venda->relatorio->periodo_apuracao;
                $venda->descricao = "Ambos";
                $dados['vendas'][] = $venda;
            }

        }
        $lojas = array_unique($lojas);
        $sublojas = array_unique($sublojas);
        $territorios = array_unique($territorios);

        $editoras = $this->cliente_model->clientesNome();
        foreach ($editoras as $key => $value) {
            $editoras[$key] = $value->nome;
        }
        $albuns = $this->albuns_model->buscar_all_albuns();
        foreach ($albuns as $key => $value) {
            $albuns[$key] = $value->nome;
            $upcs[$key] = $value->upc_ean;
            $catalogos[$key] = $value->codigo_catalogo;
        }

        $faixas = $this->faixas_videos_model->buscar_all_faixas();
        foreach ($faixas as $key => $value) {
            $faixas[$key] = $value->nome;
            $isrcs[$key] = $value->isrc;
        }

        $artistas = $this->entidade_model->buscar_artistas();
        foreach ($artistas as $key => $value) {
            $artistas[$key] = $value->nome;
        }

        $produtores = $this->entidade_model->buscar_produtores();
        foreach ($produtores as $key => $value) {
            $produtores[$key] = $value->nome;
        }

        $dados['lojas'] = $lojas;
        $dados['sublojas'] = $sublojas;
        $dados['territorios'] = $territorios;
        $dados['artistas'] = $artistas;
        $dados['editoras'] = $editoras;
        $dados['produtores'] = $produtores;
        $dados['albuns'] = $albuns;
        $dados['faixas'] = $faixas;
        $dados['isrcs'] = $isrcs;
        $dados['upcs'] = $upcs;
        $dados['catalogos'] = $catalogos;

        $this->load->view('relatorio/opcoes_relatorio_view', $dados);
        return;
    }

    public function calculoPagamento($valorPagamento, $dadosMontante, $idEntidade, $idFaixa,$idAlbum){
        //valores apenas para exemplo jah que nao tenho os valores totais
        
        foreach ($dadosMontante['porcentagem_ganho'] as $montante) {
            if($montante->idEntidade == $idEntidade){
                $pagamentoIndividual[$idEntidade] = $valorPagamento * $montante->percentual / 100;
            }
        }
        foreach ($dadosMontante['impostos_faixas'] as $impostos_faixas) {
            if($impostos_faixas->idFaixa == $idFaixa){
                $impostoFaixa[$idFaixa] = $valorPagamento * $impostos_faixas->valor / 100;
            }
        }
        foreach ($dadosMontante['impostos_album'] as $impostos_album) {
            if($impostos_album->idAlbum == $idAlbum){
                $impostoAlbum[$idAlbum] = $valorPagamento * $impostos_album->valor / 100;
            }
        }

        return array(
                'pagamento' => $pagamentoIndividual,
                'impostoFaixa' => $impostoFaixa,
                'impostoAlbum' => $impostoAlbum
            );
    }

    public function getModelos() {
        $id_cliente = $this->session->userdata('cliente_id');
        $relatorios = $this->relatorio_model->busca_relatorios($id_cliente);
        //Partes da tabela album
        $nomeAlbum = array();
        $quantidadeAlbum = array();
        $upc_ean = array();
        $numFaixas = array();
        $ano =  array();
        $codCatalogo = array();
        $tipoAlbum = array();

        //Partes da tabela Artista
        $nomeArtista = array();
        $isrc = array();


        $nomeFaixa = array();
        $flag = 1;

        foreach ($relatorios as $relatorio) {
            try {
                if (is_readable($relatorio->arquivo)) {
                    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                    $objReader->setReadDataOnly(TRUE);
                    $objPHPExcel = $objReader->load($relatorio->arquivo); //TEMPO ABSURDO DE RESPOSTA
                    $arquivo = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $lines = $objPHPExcel->getActiveSheet()->getHighestRow();
                    if($flag == 1){
                        $flag = 0;
                        $linesAux = $lines;
                    }
                    //Parte da tabela de artista
                    $nomeArtistaCol = 'P';

                    //Parte da tabela de Faixa
                    $nomeFaixaCol = 'O';
                    $isrcCol = 'C';

                    //Parte da tabela album
                    $nomeAlbumCol = 'Q';
                    $quantidadeAlbumCol = 'D';
                    $upc_eanCol = 'A';
                    $numFaixasCol = 'W';
                    $anoCol = 'AB';
                    $codCatalogoCol = 'B';
                    $tipoAlbumCol = 'X';

                    //Importacao dos dados para a tabela album
                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$nomeAlbumCol] != NULL ) {
                            array_push($nomeAlbum, $arquivo[$line][$nomeAlbumCol]);
                        }
                    }

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$quantidadeAlbumCol] != NULL ) {
                            array_push($quantidadeAlbum, $arquivo[$line][$quantidadeAlbumCol]);
                        }
                    }

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$upc_eanCol] != NULL ) {
                            array_push($upc_ean, $arquivo[$line][$upc_eanCol]);
                        }
                    }

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$numFaixasCol] != NULL ) {
                            array_push($numFaixas, $arquivo[$line][$numFaixasCol]);
                        }
                    }

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$anoCol] != NULL ) {
                            array_push($ano, $arquivo[$line][$anoCol]);
                        }
                    }

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$codCatalogoCol] != NULL ) {
                            array_push($codCatalogo, $arquivo[$line][$codCatalogoCol]);
                        }
                    }

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$tipoAlbumCol] != NULL ) {
                            array_push($tipoAlbum, $arquivo[$line][$tipoAlbumCol]);
                        }
                    }

                    //Parte da importacao do artista
                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$nomeArtistaCol] != NULL ) {
                            array_push($nomeArtista, $arquivo[$line][$nomeArtistaCol]);
                        }
                    }


                    //Parte da importacao da Faixa
                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$nomeFaixaCol] != NULL 
                        ) {
                            array_push($nomeFaixa, $arquivo[$line][$nomeFaixaCol]);
                        }
                    } 

                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$isrcCol] != NULL 
                        ) {
                            array_push($isrc, $arquivo[$line][$isrcCol]);
                        }
                    }                                  
                }
            } catch
            (Exception $e) {
                continue;
            }
        }
        //Laco para cadastro dos dados adquiridos
        for ($i=0; $i < $linesAux ; $i++) { 
            
            //Cadastro de artista(entidade e favorecido)
            //Cadastro favorecido
            $favorecido = array(
                'nome' => $nomeArtista[$i],
                'cpf' => '01427611173',
                'cnpj' => NULL,
                'contato' => 'asfasdf',
                'email' => 'asdf@gmail.com',
                'banco' => 'brasuk',
                'agencia' => '34324',
                'conta' => '43434',
                'idCliente' => $this->session->userdata('id_cliente')

            );

            $idFavorecido = $this->favorecido_model->cadastrar_favorecido($favorecido);
            
            $fav = array(
                'idFavorecido' => $idFavorecido,
                'idTipo_Favorecido' => 1,
                'percentual_fisico' => 40,
                'percentual_digital' => 30
            );

            $this->favorecido_model->cadastra_fav_has_tipo_fav_unico($fav);
            //fim cadastro favorecido

            //Cadastro de entidade
            $entidade = array(
                'nome' => $nomeArtista[$i],
                'cpf' => '01427611173',
                'cnpj' => NULL,
                'contato' => 'asfasdf',
                'email' => 'asdf@gmail.com',
                'idFavorecido' => $idFavorecido,
                'idCliente' => $this->session->userdata('id_cliente')
            );

            $idEntidade = $this->entidade_model->cadastrar_entidade($entidade);

            $Ent = array(
                'idEntidade' => $idEntidade,
                'idTipo_Entidade' => 1,
                'percentual_fisico' => 40,
                'percentual_digital' => 30
            );

            $this->entidade_model->cadastra_ent_has_tipo_ent_unica($Ent);
            //fim cadastro entidade


            //cadastro de album
            //codigo para identificar o tipo de album
            $tipoAlbumAux = 1;
            if($tipoAlbum == "track")
                $tipoAlbumAux = 1;
            elseif($tipoAlbum == "live")
                    $tipoAlbumAux = 2;
                elseif ($tipoAlbum == "Colectionn") {
                    $tipoAlbumAux = 3;
                }
            $album = array(
                'nome' => $nomeAlbum[$i],
                'quantidade' => $quantidadeAlbum[$i],
                'upc_ean' => $upc_ean[$i],
                'ano' => $ano[$i],
                'faixa' => $numFaixas[$i],
                'codigo_catalogo' => 0,
                'idTipo_Album' => $tipoAlbumAux,
                'idCliente' => $this->session->userdata('id_cliente')
            );
            $id_album = $this->albuns_model->cadastrar_album_simples($album);

            $imposto_has_album = array(
                'idAlbum' => $id_album,
                'idImposto' => 1
            );
            $this->albuns_model->cadastrar_album_has_imposto($imposto_has_album);   

            //Fim cadastro album
            
            //Cadastro de Faixa
            $faixa = array(
                'nome' => $nomeFaixa[$i],
                'isrc' => $isrc[$i],
                'codigo_video' => NULL,
                'idCliente' => $this->session->userdata('id_cliente')
            );

            $id_faixa = $this->faixas_videos_model->cadastrar_faixa_simples($faixa);


            $album_has_faixa = array(
                'idAlbum' => $id_album,
                'idFaixa' => $id_faixa
            );
            $this->faixas_videos_model->cadastrar_album_has_faixa($album_has_faixa);

            $imposto_faixa = array(
                'idFaixa' => $id_faixa,
                'idImposto' => 2
            );

            $this->faixas_videos_model->cadastrar_faixa_has_imposto($imposto_faixa);            

            //Fim cadastro faixa

        }

    }

    public function gera_relatorio() {
        $info = $this->input->post();
        $dateStart = date_create($this->input->post('datainicio'));
        $dateStart = $dateStart->format('Y-m-d');
        $dateEnd = date_create($this->input->post('datainicio'));
        $dateEnd = $dateEnd->format('Y-m-d');
        $info['dataicicio'] = $dateStart;
        $info['datafim'] = $dateEnd;
        //die(var_dump($info));
        $this->gera_relatorio_excel($info);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('relatorio/listar_relatorios');
        //die(var_dump($date, $this->input->post()));
    }

    public function gera_relatorio_excel($info) {
        $titulo = 'report_' . date('y-m-d');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle($titulo);
        $col = "A";
        if (isset($info['tiporelatorios'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Tipo Relatorio');
            $cell = $col . ++$line;
                $this->excel->getActiveSheet()->setCellValue($cell, '');
                $line++;
                $cell = $col . $line;
            foreach ($info['tiporelatorios'] as $relType) {
                $this->excel->getActiveSheet()->setCellValue($cell, $relType);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['loja'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Loja');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['loja'] as $loja) {
                $this->excel->getActiveSheet()->setCellValue($cell, $loja);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['subloja'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Sub Loja');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['subloja'] as $subloja) {
                $this->excel->getActiveSheet()->setCellValue($cell, $subloja);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['territorio'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Territorio');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['territorio'] as $territorio) {
                $this->excel->getActiveSheet()->setCellValue($cell, $territorio);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['artista'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Artista');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['artista'] as $artista) {
                $this->excel->getActiveSheet()->setCellValue($cell, $artista);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['autor'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Autor');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['autor'] as $autor) {
                $this->excel->getActiveSheet()->setCellValue($cell, $autor);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['produtor'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Produtor');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['produtor'] as $produtor) {
                $this->excel->getActiveSheet()->setCellValue($cell, $produtor);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['faixa'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Faixa');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['faixa'] as $faixa) {
                $this->excel->getActiveSheet()->setCellValue($cell, $faixa);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['album'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Album');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['album'] as $album) {
                $this->excel->getActiveSheet()->setCellValue($cell, $album);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['catalogo'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Código de Catalogo');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['catalogo'] as $catalogo) {
                $this->excel->getActiveSheet()->setCellValue($cell, $catalogo);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['isrc'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'ISRC');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['isrc'] as $isrc) {
                $this->excel->getActiveSheet()->setCellValue($cell, $isrc);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['upc'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'UPC');
            $cell = $col . ++$line;
            $this->excel->getActiveSheet()->setCellValue($cell, '');
            $line++;
            $cell = $col . $line;
            foreach ($info['upc'] as $upc) {
                $this->excel->getActiveSheet()->setCellValue($cell, $upc);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['qnt_vendida'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Quantidade Vendida');
            $cell = $col . ++$line;
            foreach ($info['qnt_vendida'] as $qnt_vendida) {
                $this->excel->getActiveSheet()->setCellValue($cell, $qnt_vendida);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['valor_recebido'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Valor Recebido');
            $cell = $col . ++$line;
            foreach ($info['valor_recebido'] as $valor_recebido) {
                $this->excel->getActiveSheet()->setCellValue($cell, $valor_recebido);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['percentual_aplicado'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Percentual Aplicado');
            $cell = $col . ++$line;
            foreach ($info['percentual_aplicado'] as $percentual_aplicado) {
                $this->excel->getActiveSheet()->setCellValue($cell, $percentual_aplicado);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['valor_pagar'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Valor a Pagar');
            $cell = $col . ++$line;
            foreach ($info['valor_pagar'] as $valor_pagar) {
                $this->excel->getActiveSheet()->setCellValue($cell, $valor_pagar);
                $line++;
                $cell = $col . $line;
            }
            $col++;
        }
        if (isset($info['receita'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Receita');
            $cell = $col . ++$line;
            foreach ($info['receita'] as $receita) {
                $this->excel->getActiveSheet()->setCellValue($cell, $receita);
                $line++;
                $cell = $col . $line;
            }
        }
        $filename = $titulo . '.xls';
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        return;
    }

    public function gera_modelos($num) {
        $modelos = NULL;
        $loja = 'loja';
        $subLoja = 'subloja';
        $territorio = 'territorio';
        //die(var_dump(++$loja,++$subLoja,++$territorio));

        for ($i = 0; $i < $num; $i++) {
            $modelos[] = array(
                'loja' => $loja++,
                'subloja' => $subLoja++,
                'territorio' => $territorio++
            );
        }
        return $modelos;
    }

    public function importa_relatorio() {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados['modelos'] = $this->relatorio_model->modelos($id_cliente);

        $dados['tipo'] = $this->session->userdata('tipo');
        $this->load->view('relatorio/importa_relatorio', $dados);
    }

    public function importar() {
        $fileName = $this->gera_nome_arquivo();
        $fileConfig = getExcelUploadConfig($fileName);
        $this->load->library('upload', $fileConfig);
        $ok = $this->upload->do_upload('excelFile');
        //die(var_dump($_FILES, $fileName, $fileConfig, $ok, $fileData, $this->upload->display_errors()));
        if ($ok) {
            $relatorio = $this->gera_array_relatorio($fileName);
            $objPHPExcel = PHPExcel_IOFactory::load($relatorio['arquivo']);
            $modelo = $this->modelo_relatorio_model->buscar_modelo($relatorio['idModelo']);
            $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            for ($i = 2; $i <= $highestRow ; $i++) {
                
                $upc_ean = $objPHPExcel->getActiveSheet()->getCell($modelo->upc.$i)->getValue();

                if($upc_ean != NULL){
                    $existeAlbum = $this->albuns_model->existe_album_upc_ean($upc_ean);

                    if($existeAlbum){ 

                        $data['idAlbum'] = $this->albuns_model->procurar_album_upc_ean($upc_ean)->idAlbum;
                    }
                    else{
                        $this->session->set_userdata('mensagem', '=(');
                        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('album_nao_encontrado') . $upc_ean );
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('relatorio/cadastroAlbumRelatorio/'. $upc_ean); 
                    }
                }else{
                    $data['idAlbum'] = NULL;
                }

                $isrc = $objPHPExcel->getActiveSheet()->getCell($modelo->isrc.$i)->getValue();
                if($isrc != NULL){
                    $existefaixa = $this->faixas_videos_model->existe_faixa_isrc($isrc, $upc_ean);

                    if($existefaixa == 1){ 
                        $data['idFaixa'] = $this->faixas_videos_model->procurar_faixa_isrc($isrc, $upc_ean)->idFaixa;
                    }
                    else{
                        if($existefaixa == -1){
                            $this->session->set_userdata('mensagem', '=(');
                            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('faixa_nao_encontrado10') . $isrc . $this->lang->line('faixa_nao_encontrado11') . $upc_ean);
                            $this->session->set_userdata('tipo_mensagem', 'error');
                            redirect('albuns/camposatualizacao/'. $data['idAlbum']);
                        }
                        if($existefaixa == 0){
                            $this->session->set_userdata('mensagem', '=(');
                            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('faixa_nao_encontrado') . $isrc);
                            $this->session->set_userdata('tipo_mensagem', 'error');
                            redirect('relatorio/cadastra_faixa_relatorio/'. $isrc);
                        }
                    }
                }else{
                    $data['idFaixa'] = NULL;
                }

                if($i == 2)
                    $id = $this->relatorio_model->cadastrar_relatorio_importado($relatorio);
                
                $data['idRelatorio'] = $id;
                $data['qnt_vendida'] = $objPHPExcel->getActiveSheet()->getCell($modelo->qnt_vendida.$i)->getValue();
                $data['valor_recebido'] = $objPHPExcel->getActiveSheet()->getCell($modelo->valor_recebido.$i)->getValue();
                $data['loja'] = $objPHPExcel->getActiveSheet()->getCell($modelo->loja.$i)->getValue();
                $data['subloja'] = $objPHPExcel->getActiveSheet()->getCell($modelo->subloja.$i)->getValue();
                $data['territorio'] = $objPHPExcel->getActiveSheet()->getCell($modelo->territorio.$i)->getValue();
                $data['tipo'] = $this->input->post()['tipo'];


                if($data['idFaixa'] != NULL && $data['idAlbum'] != NULL)
                   $this->vendas_model->cadastar_venda($data);
            }

            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastro_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('relatorio/opcoes_relatorio');

        } else {
            $this->session->set_userdata('mensagem', '=`(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('tipo_arquivo_invalido'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('relatorio/importa_relatorio');
        }
    }

    public function cadastra_faixa_relatorio($isrc){
        $this->session->set_flashdata('redirect_url', current_url());

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

        $dados['isrc'] = $isrc;

        $dados['artistas'] = $this->faixas_videos_model->buscar_artistas($this->session->userdata('id_cliente'));
        $dados['autores'] = $this->faixas_videos_model->buscar_autores($this->session->userdata('id_cliente'));
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores($this->session->userdata('id_cliente'));
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos($this->session->userdata('id_cliente'));
        
        $this->load->view('faixas_videos/cadastro_faixa_relatorio', $dados);
    }

    public function cadastrar_faixa_relatorio(){
        $faixa = array(
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc')),
            'codigo_video' => $this->input->post('youtube'),
            'idCliente' => $this->session->userdata('id_cliente')
        );

        $artistas = $this->input->post('artistas[]');
        $autores = $this->input->post('autors[]');
        $produtores = $this->input->post('produtors[]');

        $perc_artistas = str_replace("%","",$this->input->post('percentualArtista[]'));
        $perc_autores = str_replace("%","",$this->input->post('percentualAutor[]'));
        $perc_produtores = str_replace("%","",$this->input->post('percentualProdutor[]'));

        $impostos = $this->input->post('impostos_faixa[]');

        if($faixa['nome'] != NULL && $artistas != NULL && $autores != NULL){
            $this->faixas_videos_model->cadastrar_faixa($faixa, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('relatorio/importa_relatorio');       
        }
        else{
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('faixas_videos/cadastra_faixa');
        }

    }

    public function cadastroAlbumRelatorio($upc_ean) {
        $this->session->set_flashdata('redirect_url', current_url());

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

        $dados['upc_ean'] = $upc_ean;

        $dados['tipos'] = $this->albuns_model->buscar_tipos();
        $dados['faixas'] = $this->albuns_model->buscar_faixas($this->session->userdata('id_cliente'));
        $dados['artistas'] = $this->albuns_model->buscar_artistas($this->session->userdata('id_cliente'));

        $this->load->model('faixas_videos_model');
        $dados['autores'] = $this->faixas_videos_model->buscar_autores($this->session->userdata('id_cliente'));
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores($this->session->userdata('id_cliente'));
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos($this->session->userdata('id_cliente'));
        
        $this->load->view('albuns/cadastro_album_relatorio', $dados);
    }

    public function cadastrarAlbumRelatorio() {

        $album = array(
            'nome' => $this->input->post('nome'),
            'quantidade' => $this->input->post('n_faixas'),
            'upc_ean' => $this->input->post('upc_ean'),
            'ano' => $this->input->post('ano'),
            'faixa' => 100/$this->input->post('n_faixas'),
            'codigo_catalogo' => $this->input->post('catalogo'),
            'idTipo_Album' => $this->input->post('tipo'),
            'idCliente' => $this->session->userdata('id_cliente')
        );

        $artista = $this->input->post('artista');

        $faixas = $this->input->post('faixas[]');

        $impostos = $this->input->post('impostos[]');

        if($album['nome'] != NULL && $album['quantidade'] != NULL && $album['upc_ean'] != NULL && $album['ano'] != NULL){
            $this->albuns_model->cadastrar_album($album, $artista, $faixas, $impostos);
            
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('relatorio/importa_relatorio');       
        }else{
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('albuns/cadastra_album');
        }
    }

    public function gera_array_relatorio($arquivo) {
        $modelo = $this->input->post('relModel');
        $filePath = getExcelDirectory() . $arquivo;
        return array(
            'idCliente' => $this->session->userdata('cliente_id'),
            'arquivo' => $filePath,
            'data_importacao' => date('y-m-d'),
            'idModelo' => $modelo,
            'periodo_apuracao' => $this->input->post('apuracao')
        );
    }

    public function gera_nome_arquivo() {
        $surname = md5(microtime());
        $surname = substr($surname, 0, 6) . "_";
        $fileName = $surname . $_FILES['excelFile']['name'];
        return $fileName;
    }

    public function testeDisplayDirs() {
        $this->load->view('_include/header');
        $current = getcwd();
        $myDirectory = getExcelDirectory();
        $teste = scandir(getcwd() . "/application");
        var_dump($current, $myDirectory, $teste);
        die();
    }

    public function testaExcel() {
        $this->load->helper('download');
        $myRelName = NULL;
        $id_cliente = $this->session->userdata('cliente_id');
        $dados = $this->relatorio_model->busca_relatorios($id_cliente);
        if ($dados != NULL) {
            $myRelName = $dados[0]->arquivo;
        }
        //$coisa = unlink($myRelName);
        /*$myRel = PHPExcel_IOFactory::load($myRelName);
        $sheetData = $myRel->getActiveSheet()->toArray(null,true,true,true);*/
        /*$data = file_get_contents($myRelName); // Read the file's contents
        $name = 'teste.xlsx';*/

        var_dump("cheguei aqui no force download");
        /*force_download($name,$data);
        redirect("relatorio/listar_relatorios");*/
        die();
    }

    private function _calcularPercentual($percentual_aplicados, $tipo){
            $percentual_aplicado = 0;
            foreach ($percentual_aplicados as $key => $percentual) {
                $entidade = $this->entidade_model->buscar_entidade($percentual->idEntidade);

                if($tipo == 'Digital')
                    $percentual_aplicado += $percentual->percentual * $entidade->percentual_digital;
                else
                    $percentual_aplicado += $percentual->percentual * $entidade->percentual_fisico;
            }
            return $percentual_aplicado/100;
    }

    private function _calcularValorPagar($qnt_vendida,$valor_recebido,$percentual_aplicado, $impostos){
        $valorP = $percentual_aplicado;
        foreach ($impostos as $imposto) {
            $valorP += $imposto->valor;
        }
        return $valorP*$valor_recebido/100;
    }

    private function _calcularReceita($qnt_vendida,$valor_recebido,$percentual_aplicado){
        return $valor_recebido - $valor_recebido*$percentual_aplicado/100;
    }
}