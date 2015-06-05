<?php /*FEITO POR MIM JADIEL*/

class Favorecido extends CI_Controller
{

    function __construct()
    {//carregar os models que sao de onde carrega as paradas do banco
        parent:: __construct();
        $this->load->model('Entidade_model');
        $this->load->model('Favorecido_model');
    }

    public function index()
    {

        $this->listar();

        //$this->mostrar_cadastro($sucesso);

    }

    public function validar_telefone($telefone)
    {
        if (!preg_match('|\(?\d{2}\)? ?\d{4}\-?\d{4}|', $telefone)) {
            return false;
        }

    }

    public function procurar()
    {
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);

        $this->load->library('pagination');
        $config['base_url'] = base_url('index.php/entidade/listar');
        $config['total_rows'] = $this->Favorecido_model->buscar_favorecidos()->num_rows();
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);
        $dados = array(
            'dadoentidade' => $this->Favorecido_model->buscar_favorecidos($qtde, $inicio)->result(),
            'paginas' => $this->pagination->create_links()
        );

        //pequeno teste para que na hora da busca ele interprete os identificadores como numeros no banco.

        if ($this->input->post('procurar') == $this->lang->line('artista_min'))
            $busca = 1;
        else if ($this->input->post('procurar') == $this->lang->line('autor_min'))
            $busca = 2;
        else if ($this->input->post('procurar') == $this->lang->line('produtor_min'))
            $busca = 3;
        else
            $busca = $this->input->post('procurar');
        $dados["busca"] = $this->Favorecido_model->procurar_favorecido($busca);
        $dados["dadofavorecido"] = $this->Favorecido_model->buscar_favorecido();
        $this->load->view("Favorecido/listar_favorecido_view", $dados);
    }


    public function validar_cpf($cpf)
    {
        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return FALSE;
        } else { // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    public function validar_cpnj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }


    public function mostrar_cadastro()
    {
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        $this->load->view("Favorecido/cadastro_favorecido_view");
    }

    public function cadastrar()
    {
        //TESTE DOS CAMPOS, Sim, estupido para caralho, deve ter outro jeito para fazer isso, mais estou sem tempo
        if (($this->input->post('nomeentidade') == null) || ($this->input->post('cpf_cnpj') == null) || ($this->input->post('cpf/cnpj') == null) || ($this->input->post('contato') == null) || ($this->input->post('email') == null) || ($this->input->post('porcentagemganhodigital') == null) || ($this->input->post('porcentagemganhofisico') == null) || ($this->input->post('identificacao') == null) || ($this->input->post('telefone1') == null) || ($this->input->post('telefone2') == null)) {
            $this->session->set_flashdata('aviso', 'campo_vazio');
            redirect('favorecido/mostrar_cadastro');
        }
        if ($this->input->post('cpf/cnpj') == "cpf") {
            $validade_cpf = $this->validar_cpf($this->input->post('cpf_cnpj'));
            if ($validade_cpf == FALSE) {
                $this->session->set_flashdata('aviso', 'cpf_invalido');
                redirect('favorecido/mostrar_cadastro');
            }
        }
        if ($this->input->post('cpf/cnpj') == "cpnj") {
            $validade_cnpj = $this->validar_cpnj($this->input->post('cpf_cnpj'));
            if ($validade_cnpj == FALSE) {
                $this->session->set_flashdata('aviso', 'cnpj_invalido');
                redirect('favorecido/mostrar_cadastro');

            }
        }

        /*$validade_telefone1=$this->validar_telefone($this->input->post('telefone1'));
        if ($validade_telefone1==false){
            $erro["message"]="Telefone 1 imválido!!";  
            $erro["heading"] ="ERRO!!";
            $this->load->view('errors/html/error_general', $erro);///EU SEI QUE NAO ROLA DE DEIXAR ISSO DESSA FORMA
        }
        $validade_telefone2=$this->validar_telefone($this->input->post('telefone2'));
        if ($validade_telefone2==false){
            $erro["message"]="Telefone 2 imválido!!";  
            $erro["heading"] ="ERRO!!";
            $this->load->view('errors/html/error_general', $erro);///EU SEI QUE NAO ROLA DE DEIXAR ISSO DESSA FORMA
        }*/
        if ($this->input->post('cpf/cnpj') == 'cpf') {//testa se for cpf ou cnpj e coloca null no que nao for.
            $cpf = $this->input->post('cpf_cnpj');
            $cnpj = null;
        } else {
            $cnpj = $this->input->post('cpf_cnpj');
            $cpf = null;
        }
        $favorecido = array(
            'nome' => $this->input->post('nomeentidade'),
            'cpf' => $cpf,
            'cnpj' => $cnpj,
            'contato' => $this->input->post('contato'),
            'email' => $this->input->post('email'),
            'percentual_digital' => $this->input->post('porcentagemganhodigital'),
            'percentual_fisico' => $this->input->post('porcentagemganhofisico'),
            'idTipo_Favorecido' => $this->input->post('identificacao'),
            'banco' => $this->input->post('banco'),
            'agencia' => $this->input->post('agencia'),
            'conta' => $this->input->post('contacorrente')
        );
        $id_favorecido = $this->Favorecido_model->cadastrar_favorecido($favorecido);//coloca os telefones
        $telefone = array(
            'idFavorecido' => $id_favorecido,
            'numero' => $this->input->post('telefone1')
        );
        $this->Favorecido_model->cadastrar_telefone($telefone);//coloca os telefones
        $telefone = array(
            'idFavorecido' => $id_favorecido,
            'numero' => $this->input->post('telefone2')
        );
        $this->Favorecido_model->cadastrar_telefone($telefone);
        $this->session->set_flashdata('sucesso', 'cadastro_realizado');
        redirect('Favorecido/mostrar_cadastro');
    }

    public function listar()
    {
        $dados["dadofavorecido"] = $this->Favorecido_model->buscar_favorecido();
        $this->load->view("Favorecido/listar_favorecido_view", $dados);
    }

    public function camposatualizacao()
    {
        if ($this->session->flashdata('id') != null) {
            $id = $this->session->flashdata('id');
        } else
            $id = $this->input->get('id');
        if ($id == null)
            redirect('Favorecido/listar');
        $dados_auxiliar = $dados['dadosfavorecido'] = $this->Favorecido_model->buscar_favorecido_especifica($id);
        $rowtelefone = 0;
        $dados['telefone1'] = $this->Favorecido_model->buscar_telefone_especifico($id, $rowtelefone);
        $rowtelefone = 1;
        $dados['telefone2'] = $this->Favorecido_model->buscar_telefone_especifico($id, $rowtelefone);
        $dados['dadosidentificacao'] = $this->Favorecido_model->buscar_identificacao_especifica($dados_auxiliar->idTipo_Favorecido);
        $this->load->view('Favorecido/editar_favorecido_view', $dados);
    }

    public function atualizar()
    {
        //TESTE DOS CAMPOS, Sim, estupido para caralho, deve ter outro jeito para fazer isso, mais estou sem tempo
        if (($this->input->post('nome') == null) || ($this->input->post('contato') == null) || ($this->input->post('email') == null) || ($this->input->post('percentual_digital') == null) || ($this->input->post('percentual_fisico') == null) || ($this->input->post('identificacao') == null) || ($this->input->post('telefone1') == null) || ($this->input->post('telefone2') == null)) {
            $this->session->set_flashdata('aviso', 'campo_vazio');
            $this->session->set_flashdata('id', $this->input->post('idFavorecido'));
            redirect('Favorecido/camposatualizacao');
        }

        if ($this->input->post('cpf/cnpj') == "cpf") {

            $validade_cpf = $this->validar_cpf($this->input->post('cpf_cnpj'));
            if ($validade_cpf == FALSE) {
                $this->session->set_flashdata('aviso', 'cpf_invalido');
                $this->session->set_flashdata('id', $this->input->post('idFavorecido'));
                redirect('Favorecido/camposatualizacao');
            }
        }
        if ($this->input->post('cpf/cnpj') == "cpnj") {
            $validade_cnpj = $this->validar_cpnj($this->input->post('cpf_cnpj'));
            if ($validade_cnpj == FALSE) {
                $this->session->set_flashdata('aviso', 'cnpj_invalido');
                $this->session->set_flashdata('id', $this->input->post('idFavorecido'));
                redirect('Favorecido/camposatualizacao');

            }
        }
        $favorecido = array(
            'idFavorecido' => $this->input->post('idFavorecido'),
            'nome' => $this->input->post('nome'),
            'cpf' => $this->input->post('cpf'),
            'cnpj' => $this->input->post('cnpj'),
            'contato' => $this->input->post('contato'),
            'email' => $this->input->post('email'),
            'percentual_digital' => $this->input->post('percentual_digital'),
            'percentual_fisico' => $this->input->post('percentual_fisico'),
            'idTipo_Favorecido' => $this->input->post('identificacao'),
            'banco' => $this->input->post('banco'),
            'agencia' => $this->input->post('agencia'),
            'conta' => $this->input->post('conta')
        );
        $this->Favorecido_model->atualizar_favorecido($favorecido);

        $id_favorecido = $this->input->post('idFavorecido');//coloca os telefones

        $telefone1 = array(
            'idTelefone_Favorecido' => $this->input->post('idtelefone1'),
            'idFavorecido' => $id_favorecido,
            'numero' => $this->input->post('telefone1')
        );
        $this->Favorecido_model->atualizar_telefone($telefone1);//coloca os telefones
        $telefone2 = array(
            'idTelefone_Favorecido' => $this->input->post('idtelefone2'),
            'idfavorecido' => $id_favorecido,
            'numero' => $this->input->post('telefone2')
        );
        $this->Favorecido_model->atualizar_telefone($telefone2);
        $this->session->set_flashdata('sucesso', 'Atualizacao realizado com sucesso!!');
        redirect('Favorecido/listar');

    }


}