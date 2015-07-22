<?php

class Relatorio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('relatorio_model');
        $this->load->library('excel');
    }

    public function opcoes_relatorio()
    {
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        $id_cliente = $this->session->userdata('cliente_id');
        //$dados['modelos'] = $this->relatorio_model->buscar_modelos($id_cliente);
        $dados['artistas'] = $this->relatorio_model->busca_artistas($id_cliente);
        $dados['produtores'] = $this->relatorio_model->busca_produtores($id_cliente);
        $dados['autores'] = $this->relatorio_model->busca_autores($id_cliente);
        $dados['faixas'] = $this->relatorio_model->busca_faixas($id_cliente);
        $dados['albuns'] = $this->relatorio_model->busca_albuns($id_cliente);
        $dados['modelos'] = $this->gera_modelos(50);
        //die(var_dump($dados));

        $this->load->view('relatorio/opcoes_relatorio_view', $dados);
        return;
    }

    public function gera_relatorio()
    {
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
        redirect('acesso/index');
        //die(var_dump($date, $this->input->post()));
    }

    public function gera_relatorio_excel($info)
    {
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

    public function gera_modelos($num)
    {
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

    public function testaCriarExcel()
    {
        $this->excel->setActiveSheetIndex(0);
//name the worksheet
        $this->excel->getActiveSheet()->setTitle('test worksheet');
//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $filename = 'just_some_random_name.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        die(var_dump("cheguei aqui nessa porra"));
    }
}