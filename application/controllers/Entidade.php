<?php /*FEITO POR MIM JADIEL*/

class Entidade extends CI_Controller
{

    function __construct() {//carregar os models que sao de onde carrega as paradas do banco
        parent:: __construct();
        $this->load->model('Entidade_model');
        $this->load->model('Favorecido_model');
        $this->load->model('albuns_model');
        $this->load->model('cliente_model');
        $this->load->library('pagination');

        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
    }

    public function index() {
        $this->listar();
        //$this->mostrar_cadastro($sucesso);

    }

    public function validar_telefone($telefone) {
        if (!preg_match('|\(?\d{2}\)? ?\d{4}\-?\d{4}|', $telefone)) {
            return false;
        }
    }

    public function validar_cpnj($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }


    public function mostrar_cadastro() {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados["dadofavorecido"] = $this->Favorecido_model->buscar_favorecido($id_cliente);
        $dados["dadoentidade"] = $this->Entidade_model->buscar_entidades();
        //esse envio ocorre para que se saiba os favorecidos cadastrados dentro da view de cadastro de entidades alem de saber o idioma
        $this->load->view("Entidade/cadastro_entidade_view", $dados);
    }

    public function cadastrar() {
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        // passa a validacao do formulario, caso esteja tudo OK ele entra no IF
        if (($info = $this->valida_cadastro_entidade()) != NULL) {
            //se for favorecido coloca no banco o que eh pego no form sobre favorecido
            if ($info['favorecido']) {
                if(isset($info['cpf']))
                    $existe_favorecido = $this->Favorecido_model->existe_favorecido($info['cpf']);
                else
                    $existe_favorecido = $this->Favorecido_model->existe_favorecido($info['cnpj']);
                if($existe_favorecido){
                    $this->session->set_userdata('mensagem', '=`(');
                    $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cpf_cnpj_repetido'));
                    $this->session->set_userdata('tipo_mensagem', 'error');
                    redirect('Entidade/mostrar_cadastro');
                }
                $favorecido = $this->gera_favorecido($info);
                //insere o favorecido no banco
                $id_favorecido = $this->Favorecido_model->cadastrar_favorecido($favorecido);//coloca os telefones
                $telefone = $this->gera_telefone1($id_favorecido, $info['telefone1']);
                $this->Favorecido_model->cadastrar_telefone($telefone);//coloca os telefones
                $telefone = $telefone = $this->gera_telefone1($id_favorecido, $info['telefone2']);
                $this->Favorecido_model->cadastrar_telefone($telefone);
                $has_tipo_favorecido = $this->gera_favorecido_has_tipo_favorecido($info, $id_favorecido);
                $this->Favorecido_model->cadastra_fav_has_tipo_fav($has_tipo_favorecido);

                $info['favorecido_relacionado'] = $id_favorecido;

                $entidade = $this->gera_entidade($info);
                //insere a entidade no banco
                $id_entidade = $this->Entidade_model->cadastrar_entidade($entidade);
                //coloca os telefones
                $telefone = $telefone = $telefone = $this->gera_telefone($id_entidade, $info['telefone1']);
                $this->Entidade_model->cadastrar_telefone($telefone);
                //coloca os telefones
                $telefone = $telefone = $telefone = $this->gera_telefone($id_entidade, $info['telefone2']);
                $this->Entidade_model->cadastrar_telefone($telefone);
                //coloca mensagem de sucesso na session
                $has_tipo_entidade = $this->gera_entidade_has_tipo_entidade($info, $id_entidade);
                $this->Entidade_model->cadastra_ent_has_tipo_ent($has_tipo_entidade);
                //coloca mensagem de sucesso na session
                $this->session->set_userdata('mensagem', '=)');
                $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('Favorecido/listar');
            } //se nao for favorecido segue o codigo
            else {
                if(isset($info['cpf']))
                    $existe_entidade = $this->Entidade_model->existe_entidade_cpf($info['cpf'], $info['idEntidade']);
                else
                    $existe_entidade = $this->Entidade_model->existe_entidade_cpf($info['cnpj'], $info['idEntidade']);
                if($existe_entidade){
                    $this->session->set_userdata('mensagem', '=`(');
                    $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cpf_cnpj_repetido'));
                    $this->session->set_userdata('tipo_mensagem', 'error');
                    redirect('Entidade/mostrar_cadastro');
                }
                $entidade = $this->gera_entidade($info);
                //insere a entidade no banco
                $id_entidade = $this->Entidade_model->cadastrar_entidade($entidade);
                //coloca os telefones
                $telefone = $telefone = $telefone = $this->gera_telefone($id_entidade, $info['telefone1']);
                $this->Entidade_model->cadastrar_telefone($telefone);
                //coloca os telefones
                $telefone = $telefone = $telefone = $this->gera_telefone($id_entidade, $info['telefone2']);
                $this->Entidade_model->cadastrar_telefone($telefone);
                //coloca mensagem de sucesso na session
                $has_tipo_entidade = $this->gera_entidade_has_tipo_entidade($info, $id_entidade);
                $this->Entidade_model->cadastra_ent_has_tipo_ent($has_tipo_entidade);
                $this->session->set_userdata('mensagem', '=)');
                $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('Entidade/listar');
            }
        } else {
            // caso haja algum problema inesperado, é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', '=`(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('Entidade/mostrar_cadastro');
        }
    }

    public function gera_favorecido($info) {
        return array(
            'nome' => $info['nomeentidade'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'banco' => $info['banco'],
            'agencia' => $info['agencia'],
            'conta' => $info['contacorrente']
        );
    }

    public function gera_entidade($info) {
        return array(
            'nome' => $info['nomeentidade'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'idFavorecido' => $info['favorecido_relacionado'],
            'idCliente' => $this->session->userdata('id_cliente')
        );
    }

    public function gera_entidade_has_tipo_entidade($info, $id_ent) {
        if (isset($info['porcentagemganhodigital'])) {
            $porDig = str_replace(",", ".", $info['porcentagemganhodigital']);
        } else {
            $porDig = 0;
        }
        if (isset($info['porcentagemganhofisico'])) {
            $porcFis = str_replace(",", ".", $info['porcentagemganhofisico']);
        }
        $arr = NULL;
        foreach ($info['identificacao'] as $id) {
            $arr[] = array(
                'idEntidade' => $id_ent,
                'idTipo_Entidade' => $id,
                'percentual_fisico' => floatval(preg_replace("/[^-0-9\.]/", "", $porcFis)),
                'percentual_digital' => floatval(preg_replace("/[^-0-9\.]/", "", $porDig))
            );
        }
        //die(var_dump($arr));
        return $arr;
    }

    public function gera_favorecido_has_tipo_favorecido($info, $id_fav) {
        $porcFis = str_replace(",", ".", $info['porcentagemganhofisico']);
        $porDig = str_replace(",", ".", $info['porcentagemganhodigital']);
        $arr = NULL;
        foreach ($info['identificacao'] as $id) {
            $arr[] = array(
                'idFavorecido' => $id_fav,
                'idTipo_Favorecido' => $id,
                'percentual_fisico' => floatval(preg_replace("/[^-0-9\.]/", "", $porcFis)),
                'percentual_digital' => floatval(preg_replace("/[^-0-9\.]/", "", $porDig))
            );
        }
        //die(var_dump($arr));
        return $arr;
    }

    public function gera_telefone1($id, $telefone) {
        return array(
            'idFavorecido' => $id,
            'numero' => $telefone
        );
    }

    public function gera_telefone($id, $telefone) {
        return array(
            'idEntidade' => $id,
            'numero' => $telefone
        );
    }

    public function valida_cadastro_entidade() {
        //define as regras de validacao do formulario
        $this->form_validation->set_rules('nomeentidade', 'nomeentidade', 'required|max_length[45]');
        $this->form_validation->set_rules('cpf_cnpj', 'cpf_cnpj', 'required|max_length[18]|min_length[11]');
        $this->form_validation->set_rules('contato', 'contato', 'required|max_length[45]');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email');
        $this->form_validation->set_rules('favorecido', 'favorecido', 'required|max_length[45]');
        //$this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[45]');
        $this->form_validation->set_rules('telefone1', 'telefone1', 'required|max_length[45]');
        $this->form_validation->set_rules('telefone2', 'telefone2', 'required|max_length[45]');
        // passa a validacao dos campos e caso esteja tudo OK ele entra no IF
        if ($this->form_validation->run()) {
            $info = $this->input->post();
            switch ($info['cpf/cnpj']) {
                case 'cpf':
                    // faz a validacao do CPF
                    if ($this->validar_cpf($info['cpf_cnpj']) == FALSE) {
                        //caso nao seja um cpf valido, é gerada uma mensagem de erro na tela
                        $this->session->set_userdata('mensagem', $this->lang->line('problemas_formulario'));
                        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cpf/cnpj_invalido'));
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Entidade/mostrar_cadastro');
                    } else {
                        $info['cpf'] = $info['cpf_cnpj'];
                        $info['cnpj'] = NULL;
                    }
                    break;
                case 'cpnj':
                    //faz a validacao do CNPJ
                    if ($this->validar_cpnj($info['cpf_cnpj']) == FALSE) {
                        $this->session->set_userdata('mensagem', $this->lang->line('problemas_formulario'));
                        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cpf/cnpj_invalido'));
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Entidade/mostrar_cadastro');
                    } else {
                        $info['cpf'] = NULL;
                        $info['cnpj'] = $info['cpf_cnpj'];
                    }
                    break;
            }
            return $info;
        } else return NULL;
    }

    public function listar() {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados['entidades'] = $this->Entidade_model->buscar_entidades($id_cliente);
        //die(var_dump($dados));
        $this->load->view("Entidade/listar_entidades_view", $dados);
    }

    public function deletar($idEntidade) {
        $this->Entidade_model->mudar_entidade_pra_excluidos($idEntidade);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('excluido_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('Entidade/listar');
    }

    public function camposatualizacao($id = -1) {
        $id_cliente = $this->session->userdata('cliente_id');
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        //die(var_dump($this->input->post()));
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else {
            if ($id == -1) {
                redirect('entidade/listar');
            }
        }
        $dados["dadosentidade"] = $this->Entidade_model->buscar_entidade_especifica($id);
        $dados["dadospercentual"] = $this->Entidade_model->buscar_entidade_has_tipo_especifico($id);
        $dados["dadosfavorecido"] = $this->Favorecido_model->buscar_favorecido($id_cliente);
        $rowtelefone = 0;
        $dados['telefone1'] = $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $rowtelefone = 1;
        $dados['telefone2'] = $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $dados_auxiliar = $this->Entidade_model->buscar_entidade_especifica($id);//utilizado para passar o idTipo_entidade para a busca de identificacao na tabela tipo_entidade
        $dados['dadosidentificacao'] = $this->Entidade_model->buscar_identificacao_especifica($id);
        //die(var_dump($dados));
        $this->load->view('Entidade/editar_entidade_view', $dados);

    }

    public function valida_atualizacao_entidade() {
        //define as regras de validacao do formulario
        $this->form_validation->set_rules('nome', 'nomeentidade', 'required|max_length[45]');
        $this->form_validation->set_rules('contato', 'contato', 'required|max_length[45]');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email');
        $this->form_validation->set_rules('percentual_digital', 'porcentagemganhodigital', 'required|max_length[45]');
        $this->form_validation->set_rules('percentual_fisico', 'porcentagemganhofisico', 'required|max_length[45]');
        //$this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[45]');
        $this->form_validation->set_rules('telefone1', 'telefone1', 'required|max_length[45]');
        $this->form_validation->set_rules('telefone2', 'telefone2', 'required|max_length[45]');
        // passa a validacao dos campos e caso esteja tudo OK ele entra no IF
        if ($this->form_validation->run()) {
            $info = $this->input->post();

            switch ($info['isCpf']) {
                case '1':
                    // faz a validacao do CPF
                    if ($this->validar_cpf($info['cpf']) == FALSE) {
                        //caso nao seja um cpf valido, é gerada uma mensagem de erro na tela
                        $this->session->set_userdata('mensagem', $this->lang->line('problemas_formulario'));
                        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cpf_invalido'));
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Entidade/listar');
                    } else {
                        $info['cnpj'] = NULL;
                    }
                    $info['cnpj'] = NULL;
                    break;
                case '0':
                    //faz a validacao do CNPJ
                    if ($this->validar_cpnj($info['cnpj']) == FALSE) {
                        $this->session->set_userdata('mensagem', $this->lang->line('problemas_formulario'));
                        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cnpj_invalido'));
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Entidade/listar');
                    } else {
                        $info['cpf'] = NULL;
                    }
                    $info['cpf'] = NULL;
                    break;
                default:
                    var_dump("nao entrei em validacoes");
                    return NULL;
                    break;
            }
            return $info;
        } else {
            return NULL;
        }
    }

    public function atualizar() {
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        //die(var_dump($this->input->post()));
        if (($info = $this->valida_atualizacao_entidade()) != NULL) {
            if(isset($info['cpf']))
                $existe_entidade = $this->Entidade_model->existe_entidade_cpf($info['cpf'], $info['idEntidade']);
            else
                $existe_entidade = $this->Entidade_model->existe_entidade_cpf($info['cnpj'], $info['idEntidade']);
            if($existe_entidade){
                $this->session->set_userdata('mensagem', '=`(');
                $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cpf_cnpj_repetido'));
                $this->session->set_userdata('tipo_mensagem', 'error');
                redirect('Entidade/listar');
            }
            if ($info['idCliente'] == "") {
                $info['idCliente'] = null;
            }
            $entidade = $this->gera_atualizacao_entidade($info);
            $tipoentidade = $this->gera_atualizacao_entidade_has_tipo($info);
            $idTipo_EntidadeAntigo = $info["idTipo_Entidade"];
            $this->Entidade_model->atualizar_entidade($entidade);
            $this->Entidade_model->atualizar_entidade_has_tipo($tipoentidade, $idTipo_EntidadeAntigo);
            $telefone1 = $this->gera_atualizacao_telefone($info['idtelefone1'], $info['telefone1']);
            $this->Entidade_model->atualizar_telefone($telefone1);//coloca os telefones
            $telefone2 = $this->gera_atualizacao_telefone($info['idtelefone2'], $info['telefone2']);
            $this->Entidade_model->atualizar_telefone($telefone2);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect("Entidade/listar");
        } else {
            // caso haja algum problema inesperado, é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', '=`(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('Entidade/listar');
        }
    }

    public function gera_atualizacao_entidade($info) {
        return array(
            'idEntidade' => $info['idEntidade'],
            'nome' => $info['nome'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'idFavorecido' => $info['relacao_favorecido'],
            'excluido' => null,
            'idCliente' => $info['idCliente']
        );
    }

    public function gera_atualizacao_entidade_has_tipo($info) {
        return array(
            'idEntidade' => $info['idEntidade'],
            'idTipo_Entidade' => $info['identificacao'][0],
            'percentual_fisico' => $info['percentual_fisico'],
            'percentual_digital' => $info['percentual_digital'],
            'excluido' => null,
        );
    }

    public function gera_atualizacao_telefone($id, $numero) {
        return array(
            'idTelefone' => $id,
            'numero' => $numero,
        );
    }

    public function validar_cpf($cpf) {
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
    /******************** alerta de textao - explicacao do processo de validacao do CPF *****/

    /**
     * CPF é composto por onze algarismos, onde
     * os dois últimos são chamados de dígitos verificadores,
     * ou seja, os dois últimos dígitos são criados
     * a partir dos nove primeiros. O cálculo é feito em
     * duas etapas utilizando o módulo de divisão 11.
     *
     * Para exemplificar melhor, iremos calcular os dígitos
     * verificadores de um CPF imaginário, por exemplo, 222.333.666-XX.
     *
     * Fazendo o cálculo do primeiro dígito
     * verificador
     * O primeiro dígito é calculado com
     * a distribuição dos dígitos colocando-se os
     * valores 10, 9, 8, 7, 6, 5, 4, 3, 2 conforme a representação
     * abaixo:
     *
     * Números do CPF      2   2   3   3   3   6   6   6
     * Valores definidos
     * para o calculo      10  9   8   7   6   5   4   3   2
     * Na seqüência multiplicaremos os valores
     * de cada coluna, confira:
     * Números do
     * CPF                 2   2   2   3   3   3   6   6   6
     * Valores definidos
     * para o calculo      10  9   8   7   6   5   4   3   2
     * Total               20  18  16  21  18  15  24  18  12
     * Em seguida efetuaremos o somatório dos resultados
     * (20+18+…+18+12), o resultado obtido (162) será divido
     * por 11. Considere como quociente apenas o valor inteiro, o resto
     * da divisão será responsável pelo cálculo
     * do primeiro dígito verificador.
     * Vamos acompanhar: 162 dividido por 11 obtemos 14
     * de quociente e 8 de resto da divisão. Caso o resto da divisão
     * seja menor que 2, o nosso primeiro dígito verificador se
     * torna 0 (zero), caso contrário subtrai-se o valor obtido
     * de 11, que é nosso caso, sendo assim nosso dígito
     * verificador é 11-8, ou seja, 3 (três), já
     * temos parte do CPF, confira: 222.333.666-3X.
     * Fazendo o cálculo do segundo dígito
     * verificador
     * Para o cálculo do segundo dígito
     * será usado o primeiro dígito verificador já
     * calculado. Montaremos uma tabela semelhante à anterior,
     * só que desta vez usaremos na segunda linha os valores 11,
     * 10, 9, 8, 7, 6, 5, 4, 3, 2, já que estamos incorporando
     * mais um algarismo para esse cálculo. Veja:
     * Números do
     * CPF                 2   2   2   3   3   3   6   6   6   3
     * Valores definidos
     * para o calculo      11  10  9   8   7   6   5   4   3   2
     * Na próxima etapa faremos como na situação
     * do cálculo do primeiro dígito verificador. Multiplicaremos
     * os valores de cada coluna e efetuaremos o somatório dos
     * resultados obtidos: 22+20+18+24+21+18+30+24+18+4=201.
     * Números do
     * CPF                 2   2   2   3   3   3   6   6   6   3
     * Valores definidos
     * para o calculo      11  10  9   8   7   6   5   4   3   2
     * Total               22  20  18  24  21  18  30  24  18  6
     * Agora pegamos esse valor e dividimos por 11. Considere
     * novamente apenas o valor inteiro do quociente, e com o resto da
     * divisão, no nosso caso 3, usaremos para o cálculo
     * do segundo dígito verificador, assim como na primeira parte.
     * Caso o valor do resto da divisão seja menor
     * que 2, esse valor passa automaticamente a ser zero, que é
     * o nosso caso, caso contrário é necessário
     * subtrair o valor obtido de 11 para se obter o dígito verificador.
     * Neste caso chegamos ao final dos cálculos
     * e descobrimos que os dígitos verificadores do nosso CPF
     * hipotético são os números 3 e 8, portanto
     * o CPF ficaria assim: 222.333.666-38.
     */

    /******************** fucao de teste ************/
    public function testeEntidad($id_cliente = 0) {
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);

        $this->load->view('relatorio/opcoes_relatorio_view');
    }

    public function testeEntidadeForm() {
        die(var_dump($this->input->post()));
    }

    public function verifica_login($login) {
        return sizeof($this->cliente_model->buscar_login($login)) == 0;
    }

    public function gera_form_perfil_antigo() {
        $arr = array(
            'nome' => $this->input->post('nome'),
            'func' => $this->input->post('func')
        );
        return $arr;
    }
}