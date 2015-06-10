<?php /*FEITO POR MIM JADIEL*/

class Entidade extends CI_Controller
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
        $config['total_rows'] = $this->Entidade_model->buscar_entidades()->num_rows();
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);
        $dados = array(
            'dadoentidade' => $this->Entidade_model->buscar_entidades($qtde, $inicio)->result(),
            'paginas' => $this->pagination->create_links()
        );

        //pequeno teste para que na hora da busca ele interprete autor como 2 no banco.
        if (($this->input->post('procurar') == $this->lang->line('artista_min')) || ($this->input->post('procurar') == $this->lang->line('artista')))
            $busca = 1;
        else if (($this->input->post('procurar') == $this->lang->line('autor_min')) || ($this->input->post('procurar') == $this->lang->line('autor')))
            $busca = 2;
        else if (($this->input->post('procurar') == $this->lang->line('produtor_min')) || ($this->input->post('procurar') == $this->lang->line('produtor')))
            $busca = 3;
        else
            $busca = $this->input->post('procurar');
        $dados["busca"] = $this->Entidade_model->procurar_entidade($busca);
        $dados["dadoentidade"] = $this->Entidade_model->buscar_entidades();
        $this->load->view("Entidade/listar_entidades_view", $dados);
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
        $dados["dadofavorecido"] = $this->Favorecido_model->buscar_favorecido();
        $dados["dadoentidade"] = $this->Entidade_model->buscar_entidades();
        //esse envio ocorre para que se saiba os favorecidos cadastrados dentro da view de cadastro de entidades alem de saber o idioma
        $this->load->view("Entidade/cadastro_entidade_view", $dados);
    }

    public function cadastrar()
    {
        // passa a validacao do formulario, caso esteja tudo OK ele entra no IF
        if (($info = $this->valida_cadastro_entidade()) != NULL) {
            //se for favorecido coloca no banco o que eh pego no form sobre favorecido
            if ($info['favorecido']) {
                $favorecido = $this->gera_facorecido($info);
                //insere o favorecido no banco
                $id_entidade = $this->Favorecido_model->cadastrar_favorecido($favorecido);//coloca os telefones
                $telefone = $this->gera_telefone($id_entidade, $info['telefone1']);
                $this->Favorecido_model->cadastrar_telefone($telefone);//coloca os telefones
                $telefone = $telefone = $this->gera_telefone($id_entidade, $info['telefone2']);
                $this->Favorecido_model->cadastrar_telefone($telefone);
                //coloca mensagem de sucesso na session
                $this->session->set_userdata('mensagem', '=)');
                $this->session->set_userdata('subtitulo_mensagem', 'Cadastro Realizado com succeso');
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('Entidade/listar');
            } //se nao for favorecido segue o codigo
            else {
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
                $this->session->set_userdata('mensagem', '=)');
                $this->session->set_userdata('subtitulo_mensagem', 'Cadastro Realizado com succeso');
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('Entidade/listar');
            }
        } else {
            // caso haja algum problema inesperado, é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', '=`(');
            $this->session->set_userdata('subtitulo_mensagem', 'Problemas inesperados com o formulario');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('Entidade/mostrar_cadastro');
        }
    }

    public function gera_facorecido($info)
    {
        return array(
            'nome' => $info['nomeentidade'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'idFavorecido' => $info['favorecido_relacionado'],
            'percentual_digital' => $info['porcentagemganhodigital'],
            'percentual_fisico' => $info['porcentagemganhofisico'],
            'idTipo_Entidade' => $info['identificacao']
        );
    }

    public function gera_entidade($info)
    {
        return array(
            'nome' => $info['nomeentidade'],
            'cpf' => $info['cpf'],
            'cnpj' => $info['cnpj'],
            'contato' => $info['contato'],
            'email' => $info['email'],
            'idFavorecido' => $info['favorecido_relacionado'],
            'percentual_digital' => $info['porcentagemganhodigital'],
            'percentual_fisico' => $info['porcentagemganhofisico'],
            'idTipo_Entidade' => $info['identificacao']
        );
    }

    public function gera_telefone($id, $telefone)
    {
        return array(
            'idEntidade' => $id,
            'numero' => $telefone
        );
    }

    public function valida_cadastro_entidade()
    {
        //define as regras de validacao do formulario
        $this->form_validation->set_rules('nomeentidade', 'nomeentidade', 'required|max_length[45]');
        $this->form_validation->set_rules('cpf_cnpj', 'cpf_cnpj', 'required|max_length[18]|min_length[11]');
        $this->form_validation->set_rules('contato', 'contato', 'required|max_length[45]');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email');
        $this->form_validation->set_rules('porcentagemganhodigital', 'porcentagemganhodigital', 'required|max_length[45]');
        $this->form_validation->set_rules('porcentagemganhofisico', 'porcentagemganhofisico', 'required|max_length[45]');
        $this->form_validation->set_rules('favorecido', 'favorecido', 'required|max_length[45]');
        $this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[45]');
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
                        $this->session->set_userdata('mensagem', 'Problemas no Formulário');
                        $this->session->set_userdata('subtitulo_mensagem', 'CPF Inválido');
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
                        $this->session->set_userdata('mensagem', 'Problemas no Formulário');
                        $this->session->set_userdata('subtitulo_mensagem', 'CNPJ Inválido');
                        $this->session->set_userdata('tipo_mensagem', 'error');
                        redirect('Entidade/mostrar_cadastro');
                    } else {
                        $info['cpf'] = NULL;
                        $info['cnpj'] = $info['cpf_cnpj'];
                    }
                    break;
            }
            return $info;
        } else {
            //caso haja problema com o formulario é mostrada uma mensagem de erro
            $this->session->set_userdata('mensagem', 'Problemas no Formulário');
            $this->session->set_userdata('subtitulo_mensagem', 'Alguns campos foram preenchidos incorretaente');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('Entidade/mostrar_cadastro');
        }
    }

    public function listar()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url('index.php/entidade/listar');
        $config['total_rows'] = $this->Entidade_model->buscar_entidades()->num_rows();
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);

        $dados = array(
            'dadoentidade' => $this->Entidade_model->buscar_entidades($qtde, $inicio)->result(),
            'paginas' => $this->pagination->create_links()
        );

        $this->load->view("Entidade/listar_entidades_view", $dados);
    }

    public function deletar($idEntidade)
    {
        $this->Entidade_model->mudar_entidade_pra_excluidos($idEntidade);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', 'Entidade excluida com succeso');
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('Entidade/listar');
    }

    public function camposatualizacao()
    {
        if ($this->session->flashdata('id') != null) {
            $id = $this->session->flashdata('id');
        } else
            $id = $this->input->get('id');
        if ($id == null)
            redirect('entidade/listar');
        $dados['dadosentidade'] = $this->Entidade_model->buscar_entidade_especifica($id);
        $dados["dadosfavorecido"] = $this->Favorecido_model->buscar_favorecido();
        $rowtelefone = 0;
        $dados['telefone1'] = $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $rowtelefone = 1;
        $dados['telefone2'] = $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $dados_auxiliar = $this->Entidade_model->buscar_entidade_especifica($id);//utilizado para passar o idTipo_entidade para a busca de identificacao na tabela tipo_entidade
        $dados['dadosidentificacao'] = $this->Entidade_model->buscar_identificacao_especifica($dados_auxiliar->idTipo_Entidade);
        $this->load->view('Entidade/editar_entidade_view', $dados);

    }

    public function atualizar()
    {
        //TESTE DOS CAMPOS, Sim, estupido para caralho, deve ter outro jeito para fazer isso, mais estou sem tempo
        if (($this->input->post('nome') == null) || ($this->input->post('contato') == null) || ($this->input->post('email') == null) || ($this->input->post('percentual_digital') == null) || ($this->input->post('percentual_fisico') == null) || ($this->input->post('identificacao') == null) || ($this->input->post('telefone1') == null) || ($this->input->post('telefone2') == null)) {
            $this->session->set_flashdata('aviso', 'campo_vazio');
            $this->session->set_flashdata('id', $this->input->post('idEntidade'));
            redirect('Entidade/listar');
        }

        if ($this->input->post('cpf/cnpj') == "cpf") {

            $validade_cpf = $this->validar_cpf($this->input->post('cpf_cnpj'));
            if ($validade_cpf == FALSE) {
                $this->session->set_flashdata('aviso', 'cpf_invalido');
                $this->session->set_flashdata('id', $this->input->post('idEntidade'));
                redirect('Entidade/listar');
            }
        }
        if ($this->input->post('cpf/cnpj') == "cpnj") {
            $validade_cnpj = $this->validar_cpnj($this->input->post('cpf_cnpj'));
            if ($validade_cnpj == FALSE) {
                $this->session->set_flashdata('aviso', 'cnpj_invalido');
                $this->session->set_flashdata('id', $this->input->post('idEntidade'));
                redirect('Entidade/listar');

            }
        }

        $entidade = array(//recebe do form as informacoes da entidade
            'idEntidade' => $this->input->post('idEntidade'),
            'nome' => $this->input->post('nome'),
            'cpf' => $this->input->post('cpf'),
            'cnpj' => $this->input->post('cnpj'),
            'contato' => $this->input->post('contato'),
            'email' => $this->input->post('email'),
            'percentual_digital' => $this->input->post('percentual_digital'),
            'percentual_fisico' => $this->input->post('percentual_fisico'),
            'idTipo_Entidade' => $this->input->post('identificacao'),
            'idFavorecido' => $this->input->post('relacao_favorecido')
        );
        $id_entidade = $this->input->post('idEntidade');//coloca os telefones
        $this->Entidade_model->atualizar_entidade($entidade);
        $telefone1 = array(
            'idTelefone' => $this->input->post('idtelefone1'),
            'idEntidade' => $id_entidade,
            'numero' => $this->input->post('telefone1')
        );
        $this->Entidade_model->atualizar_telefone($telefone1);//coloca os telefones
        $telefone2 = array(
            'idTelefone' => $this->input->post('idtelefone2'),
            'idEntidade' => $id_entidade,
            'numero' => $this->input->post('telefone2')
        );
        $this->Entidade_model->atualizar_telefone($telefone2);
        $sucesso = "Atualizacao realizado com sucesso!!";
        $this->listar();
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
    public function testeEntidade()
    {
        $dados['totalResult'] = $this->Entidade_model->buscar_entidades()->num_rows();
        $dados['perPage'] = 5;
        $dados['totalpages'] = ceil(($dados['totalResult'] / $dados['perPage']));
        $dados['entidades'] = $this->Entidade_model->buscar_entidades()->result();
        //die(var_dump($dados));
        $this->load->view('viewTeste',$dados);
    }
    public function testeEntidadeForm(){
        die(var_dump($this->input->post()));
    }
}