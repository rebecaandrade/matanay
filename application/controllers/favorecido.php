<?php /*FEITO POR MIM JADIEL*/

class Favorecido extends CI_Controller
{

    function __construct()
    {//carregar os models que sao de onde carrega as paradas do banco
        parent:: __construct();
        $this->load->model('Entidade_model');
        $this->load->model('Favorecido_model');
        $this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION
        
        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
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

    public function validar_cpf($cpf)
    {
        // Verifiva se o número digitado contém todos os digitos
        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);

        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
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
        // passa a validacao do formulario, caso esteja tudo OK ele entra no IF
        if (($info = $this->valida_cadastro_favorecido()) != NULL) {
            $favorecido = $this->gera_favorecido($info);
            //insere o favorecido no banco
            $id_favorecido = $this->Favorecido_model->cadastrar_favorecido($favorecido);//coloca os telefones
            $telefone = $this->gera_telefone($id_favorecido, $info['telefone1']);
            $this->Favorecido_model->cadastrar_telefone($telefone);//coloca os telefones
            $telefone = $telefone = $this->gera_telefone($id_favorecido, $info['telefone2']);
            $this->Favorecido_model->cadastrar_telefone($telefone);
            //coloca mensagem de sucesso na session
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('favorecido/listar');
        } else {
            // caso haja algum problema inesperado, é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', '=`(');
            $this->session->set_userdata('subtitulo_mensagem', 'Problemas inesperados com o formulario');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('favorecido/mostrar_cadastro');
        }
    }

    public function gera_favorecido($info)
    {
        return array(
            'nome' => $info['nomefavorecido'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'idFavorecido' => $info['favorecido_relacionado'],
            'percentual_digital' => $info['porcentagemganhodigital'],
            'percentual_fisico' => $info['porcentagemganhofisico'],
            'banco' => $info['banco'],
            'agencia' => $info['agencia'],
            'conta' => $info['contacorrente']
        );
    }

    public function gera_favorecido_atualizacao($info)
    {
        return array(
            'idFavorecido' => $info['idFavorecido'],
            'nome' => $info['nome'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'percentual_digital' => $info['percentual_digital'],
            'percentual_fisico' => $info['percentual_fisico'],
            'idTipo_Favorecido' => $info['identificacao'],
            'banco' => $info['banco'],
            'agencia' => $info['agencia'],
            'conta' => $info['conta']
        );
    }

    public function gera_telefone($id, $numero)
    {
        return array(
            'idTelefone' => $id,
            'numero' => $numero,
        );
    }
    public function gera_atualizacao_telefone($id,$numero){
        return array(
            'idTelefone_Favorecido' => $id,
            'numero' => $numero,
        );
    }

    public function valida_cadastro_favorecido()
    {
        $this->form_validation->set_message('required', $this->lang->line('form_error_required') );
        $this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
        $this->form_validation->set_message('decimal_num', $this->lang->line('form_error_decimal_num'));

        //define as regras de validacao do formulario
        $this->form_validation->set_rules('nomefavorecido', 'nomefavorecido', 'required|max_length[45]');
        $this->form_validation->set_rules('cpf_cnpj', $this->lang->line('cpf_cnpj'), 'required');
        $this->form_validation->set_rules('contato', $this->lang->line('contato'), 'required|max_length[45]');
        $this->form_validation->set_rules('banco', $this->lang->line('banco'), 'required|max_length[45]');
        $this->form_validation->set_rules('agencia', $this->lang->line('agencia'), 'required|max_length[45]');
        $this->form_validation->set_rules('contacorrente', $this->lang->line('contacorrente'), 'required|max_length[45]');
        $this->form_validation->set_rules('identificacao', $this->lang->line('identificacao'), 'required|max_length[45]');
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'required|max_length[45]|valid_email');
        $this->form_validation->set_rules('porcentagemganhodigital', $this->lang->line('porcentagemganhodigital'), 'required|max_length[45]');
        $this->form_validation->set_rules('porcentagemganhofisico', $this->lang->line('porcentagemganhofisico'), 'required|max_length[45]');
        $this->form_validation->set_rules('telefone1', $this->lang->line('telefone1'), 'required|max_length[45]');
        $this->form_validation->set_rules('telefone2', $this->lang->line('telefone2'), 'required|max_length[45]');
        // passa a validacao dos campos e caso esteja tudo OK ele entra no IF
        if ($this->form_validation->run()) {
            $info = $this->input->post();
            switch ($info['cpf/cnpj']) {
                case 'cpf':
                    // faz a validacao do CPF
                    if ($this->validar_cpf($info['cpf_cnpj']) == FALSE) {
                        //caso nao seja um cpf valido, é gerada uma mensagem de erro na tela
                        $this->session->set_userdata('mensagem', 'Problemas no Formulário');
                        $this->session->set_userdata('subtitulo_mensagem', 'CPF Inválido');
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Favorecido/mostrar_cadastro');
                    } else {
                        $info['cpf'] = $info['cpf_cnpj'];
                        $info['cnpj'] = NULL;
                    }
                    break;
                case 'cpnj':
                    //faz a validacao do CNPJ
                    if ($this->validar_cpnj($info['cpf_cnpj']) == FALSE) {
                        $this->session->set_userdata('mensagem', 'Problemas no Formulário');
                        $this->session->set_userdata('subtitulo_mensagem', 'CNPJ Inválido');
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Favorecido/mostrar_cadastro');
                    } else {
                        $info['cpf'] = NULL;
                        $info['cnpj'] = $info['cpf_cnpj'];
                    }
                    break;
            }
            return $info;
        } else {
            //caso haja problema com o formulario é mostrada uma mensagem de erro
            $mensagem = array(
                'mensagem'              => $this->lang->line('campos_invalidos'),
                'subtitulo_mensagem'    => validation_errors() ,
                'tipo_mensagem'         => 'error'
            );
            $this->session->set_userdata($mensagem);
            redirect('Favorecido/mostrar_cadastro');
        }
    }

    public function valida_atualizacao_favorecido()
    {
       // die(var_dump($this->input->post()));
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[45]');
        $this->form_validation->set_rules('cpf_cnpj', 'cpf_cnpj', 'required|max_length[18]|min_length[11]');
        $this->form_validation->set_rules('telefone1', 'telefone1', 'required|max_length[45]');
        $this->form_validation->set_rules('telefone2', 'telefone2', 'required|max_length[45]');
        $this->form_validation->set_rules('contato', 'contato', 'required|max_length[45]');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email');
        $this->form_validation->set_rules('percentual_fisico', 'percentual_fisico', 'required|max_length[45]');
        $this->form_validation->set_rules('percentual_digital', 'percentual_digital', 'required|max_length[45]');
        $info = $this->input->post();

        if ($this->form_validation->run()) {
            if (isset($info['cpf'])) {
                // faz a validacao do CPF
                if ($this->validar_cpf($info['cpf_cnpj']) == FALSE) {
                    //caso nao seja um cpf valido, é gerada uma mensagem de erro na tela
                    $this->session->set_userdata('mensagem', 'Problemas no Formulário');
                    $this->session->set_userdata('subtitulo_mensagem', 'CPF Inválido');
                    $this->session->set_userdata('tipo_mensagem', 'error');
                    redirect('Favorecido/mostrar_cadastro');
                } else {
                    $info['cpf'] = $info['cpf_cnpj'];
                    $info['cnpj'] = NULL;
                }

            } else {
                //faz a validacao do CNPJ
                if ($this->validar_cpnj($info['cpf_cnpj']) == FALSE) {
                    $this->session->set_userdata('mensagem', 'Problemas no Formulário');
                    $this->session->set_userdata('subtitulo_mensagem', 'CNPJ Inválido');
                    $this->session->set_userdata('tipo_mensagem', 'error');
                    redirect('Favorecido/mostrar_cadastro');
                } else {
                    $info['cpf'] = NULL;
                    $info['cnpj'] = $info['cpf_cnpj'];
                }
            }
            return $info;
        } else {
            //caso haja problema com o formulario é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', 'Problemas no Formulário');
            $this->session->set_userdata('subtitulo_mensagem', 'Alguns campos foram preenchidos incorretamente');
            $this->session->set_userdata('tipo_mensagem', 'error');
            //$this->camposatualizacao($info['i'])
            die;
        }
    }

    public function listar()
    {
        $dados["favorecidos"] = $this->Favorecido_model->buscar_favorecido();
        $this->load->view("Favorecido/listar_favorecido_view", $dados);
    }

    public function camposatualizacao($id = -1)
    {
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else if ($id == -1)
            redirect('favorecido/listar');
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
        //die(var_dump($this->input->post()));
        //TODO verificar erros
        if (($info = $this->valida_atualizacao_favorecido()) != NULL) {
            $favorecido = $this->gera_favorecido_atualizacao($info);
            //atualiza o favorecido no banco
            $this->Favorecido_model->atualizar_favorecido($favorecido);
            $telefone = $this->gera_atualizacao_telefone($info['idtelefone1'], $info['telefone1']);
            $this->Favorecido_model->atualizar_telefone($telefone);//atualiza os telefones
            $telefone = $telefone = $this->gera_atualizacao_telefone($info['idtelefone2'], $info['telefone2']);
            $this->Favorecido_model->atualizar_telefone($telefone);
            //atualiza mensagem de sucesso na session
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('favorecido/listar');
        } else {
            // caso haja algum problema inesperado, é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', '=`(');
            $this->session->set_userdata('subtitulo_mensagem', 'Problemas inesperados com o formulario');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('Favorecido/camposatualizacao');
        }
    }

    public function deletar($id)
    {
        $this->Favorecido_model->mudar_favorecido_para_excluidos($id);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', 'Favorecido excluido com succeso');
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('favorecido/listar');
        die(var_dump("cheguei no excluir favorecido", $id));
    }
}