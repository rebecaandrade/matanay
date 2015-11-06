<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('relatorio_model');
        $this->load->model('modelo_relatorio_model');
        $this->load->model('vendas_model');
        $this->load->model('albuns_model');
        $this->load->model('faixas_videos_model');
        $this->load->model('entidade_model');
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

    public function opcoes_relatorio() {
        $id_cliente = $this->session->userdata('cliente_id');
        $relatorios = $this->relatorio_model->busca_relatorios($id_cliente);
        foreach ($relatorios as $relatorio) {
            $venda = $this->vendas_model->buscar_vendas($relatorio->idRelatorio)[0];
            $venda->tipo = $this->albuns_model->buscar_impostos_album($venda->idAlbum);
            foreach ($venda->tipo as $imposto) {
                $venda->imposto[] = $this->imposto_model->tipo_imposto($imposto->idImposto)[0]->descricao;
            }
            $venda->imposto = array_unique($venda->imposto);
            $venda->artistaInfo = $this->faixas_videos_model->buscar_entidade_faixa($venda->idFaixa,1)[0];
            $venda->artista = $this->entidade_model->buscar_entidade_especifica($venda->artistaInfo['idEntidade'])->nome;
            $venda->autorInfo = $this->faixas_videos_model->buscar_entidade_faixa($venda->idFaixa,2)[0];
            $venda->autor = $this->entidade_model->buscar_entidade_especifica($venda->autorInfo['idEntidade'])->nome;
            $venda->produtorInfo = $this->faixas_videos_model->buscar_entidade_faixa($venda->idFaixa,3)[0];
            $venda->produtor = $this->entidade_model->buscar_entidade_especifica($venda->produtorInfo['idEntidade'])->nome;
            $venda->faixaInfo = $this->faixas_videos_model->buscar_dados($venda->idFaixa);
            $venda->faixa = $venda->faixaInfo->nome;
            if($venda->faixaInfo->codigo_video == '')
                $venda->produto = "Faixa";
            else
                $venda->produto = "Video";
            $venda->albumIndo = $this->albuns_model->buscar_dados($venda->idAlbum);
            $venda->catalogo = $venda->albumIndo->codigo_catalogo;
            $venda->isrc = $venda->faixaInfo->isrc;
            $venda->upc = $venda->albumIndo->upc_ean;
            $venda->percentual_aplicado = calcularPercentual();
            $venda->valor_pagar = calcularValorPagar();
            $venda->receita = calcularReceita();
            $venda->relatorio = $relatorio;
            $venda->apuracao = $venda->relatorio->periodo_apuracao;
            $venda->descricao = "Ambos";
            //die(var_dump($venda));

            //Envio das informacoes do calculo do valor para cada entidade
            $dadosMontante['porcentagem_ganho'] = $this->entidade_model->buscar_entidade_has_faixa();
            $dadosMontante['impostos_faixas'] = $this->imposto_model->pegar_impostos_faixa();
            $dadosMontante['impostos_album'] = $this->imposto_model->pegar_impostos_album();

            $dados["montante"] = $this->calculoPagamento($dadosMontante,$idEntidade = 7, $idFaixa = 9);

            $dados['vendas'][] = $venda;
        }

        $this->load->view('relatorio/opcoes_relatorio_view', $dados);
        return;
    }

    public function calculoPagamento($dadosMontante, $idEntidade, $idFaixa){
        //valores apenas para exemplo
        $valorPagamento = 100;



        foreach ($dadosMontante['porcentagem_ganho'] as $montante) {
            if($montante->idEntidade == $idEntidade){
                $pagamentoIndividual[$idEntidade] = $valorPagamento * $montante->percentual / 100;
            }
        }
        var_dump($dadosMontante);
        foreach ($dadosMontante['impostos_faixas'] as $impostos_faixas) {
            if($impostos_faixas->idFaixa == $idFaixa){
                $impostoFaixa[$idFaixa] = $valorPagamento * $impostos_faixas->valor / 100;
            }
        }
        die(var_dump($impostoFaixa));



    }

    /*public function getModelos($relatorios) {
        $lojas = array();
        $subLojas = array();
        $territorios = array();
        foreach ($relatorios as $relatorio) {
            try {
                if (is_readable($relatorio->arquivo)) {
                    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                    $objReader->setReadDataOnly(TRUE);
                    $objPHPExcel = $objReader->load($relatorio->arquivo);
                    $arquivo = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $lines = $objPHPExcel->getActiveSheet()->getHighestRow();
                    $loja = $relatorio->loja;
                    $subLoja = $relatorio->subloja;
                    $territorio = $relatorio->territorio;
                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$loja] != NULL && !in_array($arquivo[$line][$loja], $lojas)) {
                            array_push($lojas, $arquivo[$line][$loja]);
                        }
                    }
                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$subLoja] != NULL && !in_array($arquivo[$line][$subLoja], $subLojas)) {
                            array_push($subLojas, $arquivo[$line][$subLoja]);
                        }
                    }
                    for ($line = 2; $line < $lines; $line++) {
                        if ($arquivo[$line][$territorio] != NULL && !in_array($arquivo[$line][$territorio],
                                $territorios)
                        ) {
                            array_push($territorios, $arquivo[$line][$territorio]);
                        }
                    }
                }
            } catch
            (Exception $e) {
                continue;
            }
            return array(
                'lojas' => $lojas,
                'sublojas' => $subLojas,
                'territorios' => $territorios
            );
        }
    }*/

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
        if (isset($info['tiporelatorio'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Tipo Relatorio');
            $cell = $col . ++$line;
            foreach ($info['tiporelatorio'] as $relType) {
                $this->excel->getActiveSheet()->setCellValue($cell, $relType);
                $line++;
                $cell = $col . $line;
            }
            $col++;
            $col++;
        }
        if (isset($info['loja'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Loja');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['loja']);
            $col++;
            $col++;
        }
        if (isset($info['subloja'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Sub Loja');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['subloja']);
            $col++;
            $col++;
        }
        if (isset($info['territorio'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Territorio');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['territorio']);
            $col++;
            $col++;
        }
        if (isset($info['artista'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Artista');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['artista']);
            $col++;
            $col++;
        }
        if (isset($info['autor'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Autor');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['autor']);
            $col++;
            $col++;
        }
        if (isset($info['produtor'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Produtor');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['produtor']);
            $col++;
            $col++;
        }
        if (isset($info['album'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'album');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['album']);
            $col++;
            $col++;
        }
        if (isset($info['faixa'])) {
            $line = 1;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, 'Faixa');
            $line++;
            $cell = $col . $line;
            $this->excel->getActiveSheet()->setCellValue($cell, $info['faixa']);
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
            $id = $this->relatorio_model->cadastrar_relatorio_importado($relatorio);
            $objPHPExcel = PHPExcel_IOFactory::load($relatorio['arquivo']);
            $modelo = $this->modelo_relatorio_model->buscar_modelo($relatorio['idModelo']);
            $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            for ($i = 2; $i <= $highestRow ; $i++) {
                $isrc = $objPHPExcel->getActiveSheet()->getCell($modelo->isrc.$i)->getValue();
                if($isrc != NULL)
                    $data['idFaixa'] = $this->faixas_videos_model->procurar_faixa_isrc($isrc)->idFaixa;
                else
                    $data['idFaixa'] = NULL;
                
                $upc_ean = $objPHPExcel->getActiveSheet()->getCell($modelo->upc.$i)->getValue();
                if($upc_ean != NULL)
                    $data['idAlbum'] = $this->albuns_model->procurar_album_upc_ean($upc_ean)->idAlbum;
                else
                    $data['idAlbum'] = NULL;

                $data['idRelatorio'] = $id;
                $data['qnt_vendida'] = $objPHPExcel->getActiveSheet()->getCell($modelo->qnt_vendida.$i)->getValue();
                $data['valor_recebido'] = $objPHPExcel->getActiveSheet()->getCell($modelo->valor_recebido.$i)->getValue();
                $data['loja'] = $objPHPExcel->getActiveSheet()->getCell($modelo->loja.$i)->getValue();
                $data['subloja'] = $objPHPExcel->getActiveSheet()->getCell($modelo->subloja.$i)->getValue();
                $data['territorio'] = $objPHPExcel->getActiveSheet()->getCell($modelo->territorio.$i)->getValue();

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
}

function calcularPercentual(){
    return 0;
}

function calcularValorPagar(){
    return 0;
}

function calcularReceita(){
    return 0;
}