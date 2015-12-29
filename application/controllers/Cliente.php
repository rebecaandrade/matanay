<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// by : Vitor Pontes
class Cliente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('', ''); // remove tags HTML das mensagem de erro de FORM VALIDATION
        $this->load->model('cliente_model');
        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        $this->load->model('Contrato_model');
        $this->load->model('Entidade_model');
        $this->load->model('Favorecido_model');
    }

    public function home()
    {
        $dados["notificacao"] = $this->existeNotificacao();
        $id_cliente = $this->session->userdata('cliente_id');
        $dados["dadoNotificacao"] = $this->Contrato_model->buscar_datas($id_cliente);
        $dados["dadosFavorecido"] = $this->Favorecido_model->buscar_favorecido($id_cliente);
        $dados["dadosEntidade"] = $this->Entidade_model->buscar_entidades($id_cliente);
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        $this->load->view('cliente/home', $dados);
    }

    public function existeNotificacao(){
        $id_cliente = $this->session->userdata('cliente_id');
        $dadoNotificacao = $this->Contrato_model->buscar_datas($id_cliente);
        $flag=0;
        foreach ($dadoNotificacao as $notificacao) { 
            /*verificao das datas atuais e convercoes para unix*/
            $unix =  mysql_to_unix($notificacao->data_fim);
            $now = now();
            $tempo = timespan($now,$unix  );
            /*verificacao do numero de meses*/
            $meses=0;
            if($tempo[2] == "Y"){
                $meses = $tempo[0] * 12 + $tempo[8];
            }
            else
                if($tempo[2] == "M"){
                    $meses = $tempo[0] + $tempo[10] / 4 ;
                }
            if ((($meses <= $notificacao->alerta)&&($meses != 0))||(($meses <= $notificacao->alerta)&&($tempo != '1 Second'))){      
                $flag = 1;
            }else
                $flag = 0;
            if ($flag == 1) {
                return true;
            }
        }
        return false;
    }

    public function cadastros()
    {
        $this->load->view('cliente/home_cadastros');
    }

    public function cadastro_cliente()
    {
        $funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
        foreach ($funcionalidades as $funcionalidade){
            if ( $funcionalidade->nome == "func_manter_cliente"){
                $this->load->view('cliente/cadastrar_cliente');
                break;
            }
            else{
                $this->home();
                break;
            }
        }
    }

    public function cadastrar_cliente()
    {
        if ($this->form_validation->run('cliente')) {
            $nome = $this->input->post('nome');
            $this->cliente_model->cadastrar_cliente($nome);
            $this->session->set_userdata('mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('cliente/lista_clientes');
        } else {
            $mensagem = array(
                'mensagem' => validation_errors(),
                'tipo_mensagem' => 'error'
            );
            $this->session->set_userdata($mensagem);
            redirect('cliente/cadastro_cliente');
        }
    }

    public function atualiza_cliente($id)
    {
        $funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
        foreach ($funcionalidades as $funcionalidade){
            if ( $funcionalidade->nome == "func_manter_cliente"){
                $dados['cliente'] = $this->cliente_model->buscar_cliente($id);
                $this->load->view('cliente/atualizar_cliente', $dados);
                break;
            }
            else{
                $this->home();
                break;
            }
        }
    }

    public function atualizar_cliente($id)
    {
        $nome = $this->input->post('nome');
        if ($this->form_validation->run('cliente')) {
            $this->cliente_model->atualizar_cliente($id, $nome);
            $mensagem = array(
                'mensagem' => $this->lang->line('atualizado_sucesso'),
                'tipo_mensagem' => 'success'
            );
            $this->session->set_userdata($mensagem);
            redirect('cliente/lista_clientes');
        } else {
            $mensagem = array(
                'mensagem' => $this->lang->line('campos_invalidos'),
                'subtitulo_mensagem' => validation_errors(),
                'tipo_mensagem' => 'error'
            );
            $this->session->set_userdata($mensagem);
            redirect('cliente/atualiza_cliente/' . $id);
        }
    }

    public function lista_clientes()
    {
        $funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
        foreach ($funcionalidades as $funcionalidade){
            if ( $funcionalidade->nome == "func_manter_cliente"){
                $dados['clientes'] = $this->cliente_model->clientes();
                $this->load->view('cliente/lista_clientes', $dados);
                break;
            }
            else{
                $this->home();
                break;
            }
        }
    }

    public function excluir_cliente($id_cliente)
    {
        $funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
        foreach ($funcionalidades as $funcionalidade){
            if ( $funcionalidade->nome == "func_manter_cliente"){
                $this->cliente_model->excluir_cliente($id_cliente);
                $this->session->set_userdata('mensagem', $this->lang->line('excluido_sucesso'));
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('cliente/lista_clientes');
                break;
            }
            else{
                $this->home();
                break;
            }
        }
    }

    public function bloquear_cliente($id_cliente)
    {
        $idClienteAtual = $this->session->userdata('cliente_id');
        if($id_cliente == $idClienteAtual){
            $this->session->set_userdata('mensagem', $this->lang->line('impossivel_bloquear'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('cliente/lista_clientes');
        }
        $funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
        foreach ($funcionalidades as $funcionalidade){
            if ( $funcionalidade->nome == "func_manter_cliente"){
                $this->cliente_model->bloquear_cliente($id_cliente);
                $this->session->set_userdata('mensagem', $this->lang->line('bloqueado_sucesso'));
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('cliente/lista_clientes');
                break;
            }
            else{
                $this->home();
                break;
            }
        }
    }

    public function desbloquear_cliente($id_cliente)
    {
        $funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
        foreach ($funcionalidades as $funcionalidade){
            if ( $funcionalidade->nome == "func_manter_cliente"){
                $this->cliente_model->desbloquear_cliente($id_cliente);
                $this->session->set_userdata('mensagem', $this->lang->line('desbloqueado_sucesso'));
                $this->session->set_userdata('tipo_mensagem', 'success');
                redirect('cliente/lista_clientes');
                break;
            }
            else{
                $this->home();
                break;
            }
        }
    }

    public function lista_perfis($id_cliente)
    {
        if (isset($id_cliente)) {
            $this->session->set_flashdata('id_cliente', $id_cliente);
            $dados['id'] = $id_cliente;
            $dados['perfis'] = $this->cliente_model->perfis($id_cliente);
            $this->load->view('cliente/lista_perfis', $dados);
        } else {
            redirect('cliente/home');
        }
    }

    public function cadastro_perfil($id_cliente)
    {
        if ($id_cliente) {
            $dados['id_cliente'] = $id_cliente;
            $dados['funcionalidades'] = $this->cliente_model->funcionalidades();
            $dados['antigos'] = $this->gera_form_perfil_antigo();
            $this->load->view('cliente/cadastrar_perfil', $dados);
        } else {
            //mensagem de erro
            redirect('cliente/lista_perfis');
        }
    }

    public function gera_form_perfil_antigo()
    {
        $arr = array(
            'nome' => $this->input->post('nome'),
            'func' => $this->input->post('func')
        );
        return $arr;
    }

    public function cadastrar_perfil()
    {
        //die(var_dump($this->verifica_login('ComoEuSouGordo')));
        $info = $this->input->post();
        //die(var_dump($info));

        if (($this->verifica_login_cadastro($info))&&($this->verifica_login_email_cadastro($info)))  {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('login_existente'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            $this->cadastro_perfil($this->session->userdata('cliente_id'));
            return;
        } else {
            $perfil = $this->gera_perfil($info);
            $id_perfil = $this->cliente_model->cadastrar_perfil($perfil);
            $this->cliente_model->cadastrar_funcionalidades($info['func'], $id_perfil);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            $id_cliente = $this->session->userdata('cliente_id');
            $this->lista_perfis($id_cliente);
        }
    }

    public function gera_perfil($info)
    {
        return array(
            'nome' => $info['nome'],
            'email' => $info['email'],
            'login' => $info['login'],
            'senha' => md5($info['senha']),
            'idCliente' => $info['id']
        );
    }

    public function verifica_login($info)
    {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados = $this->cliente_model->buscar_perfil($id_cliente, $info['id_usuario']);
        if (sizeof($this->cliente_model->buscar_login($info['login'])) == 0)
            return FALSE;
        else
            if ($dados->login == $info['login'])
                return FALSE;
            else
                return TRUE;
    }

    public function verifica_login_email($info)
    {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados = $this->cliente_model->buscar_perfil($id_cliente, $info['id_usuario']);
        if (sizeof($this->cliente_model->buscar_email($info['email'])) == 0)
            return FALSE;
        else
            if ($dados->email == $info['email'])
                return FALSE;
            else
                return TRUE;
    }

    public function verifica_login_cadastro($info)
    {
        if (sizeof($this->cliente_model->buscar_login($info['login'])) == 0)
            return FALSE;
        else 
            return TRUE;

    }

    public function verifica_login_email_cadastro($info)
    {
        if (sizeof($this->cliente_model->buscar_email($info['email'])) == 0)
            return FALSE;
        else
            return TRUE;    

    }

    public function atualiza_perfil_admin($id_cliente, $id_perfil)
    {
        $dados['perfil'] = $this->cliente_model->buscar_perfil($id_cliente, $id_perfil);
        $dados['funcionalidades'] = $this->cliente_model->funcionalidades();
        $minhasfuncionalidades = $this->cliente_model->minhas_funcionalidades($id_perfil);
        $myresult = NULL;
        foreach ($dados['funcionalidades'] as $key => $func) {
            if (in_array($func, $minhasfuncionalidades)) {
                $myresult[] = $func;
                $dados['funcionalidades'][$key]->checked = TRUE;
            } else {
                $dados['funcionalidades'][$key]->checked = FALSE;
            }
        }
        //die(var_dump($myresult,$dados['funcionalidades']));
        $this->load->view('cliente/atualizar_perfil', $dados);
    }

    public function atualizar_perfil_admin()
    {
        //die(var_dump("falhou o teste"));
        $info = $this->input->post();
        //die(var_dump($info,$this->session->userdata()));
        if ((!$this->verifica_login($info))&&(!$this->verifica_login_email($info))) {
            $myfunc = $this->cliente_model->minhas_funcionalidades($info['id_usuario']);
            foreach ($myfunc as $key => $dado) {
                $myfunc[$key] = $dado->idFuncionalidades;
            }
            $newfunc = $info['func'];
            $intersect = array_intersect($myfunc, $newfunc);
            $deletefunc = array_diff($myfunc, $intersect);
            $createfunc = array_diff($newfunc, $intersect);
            $perfil = $this->gera_perfil_atualizacao($info);
            $this->cliente_model->atualizar_peril($perfil, $createfunc, $deletefunc);

            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            $id_cliente = $this->session->userdata('cliente_id');
            $this->lista_perfis($id_cliente);
        } else {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('login_existente'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            $this->atualiza_perfil_admin($info['id_cliente'], $info['id_usuario']);
            return;
        }
    }

    public function gera_perfil_atualizacao($info)
    {
        return array(
            'nome' => $info['nome'],
            'email' => $info['email'],
            'login' => $info['login'],
            'idUsuario' => $info['id_usuario']
        );
    }

    public function excluir_perfil($id_perfil,$id_cliente)
    {
        $this->cliente_model->excluir_perfil($id_perfil);
        $this->session->set_userdata('mensagem', $this->lang->line('excluido_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('cliente/lista_perfis/' . $id_cliente);
    }

    public function bloquear_perfil($id_perfil,$id_cliente)
    {
        $idPerfilAtual = $this->session->userdata('id_usuario');
        if($id_perfil == $idPerfilAtual){
            $this->session->set_userdata('mensagem', $this->lang->line('impossivel_bloquear'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('cliente/lista_perfis/' . $id_cliente);
        }
        $this->cliente_model->bloquear_perfil($id_perfil);
        $this->session->set_userdata('mensagem', $this->lang->line('bloqueado_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('cliente/lista_perfis/' . $id_cliente);
    }

    public function desbloquear_perfil($id_perfil,$id_cliente)
    {
        $this->cliente_model->desbloquear_perfil($id_perfil);
        $this->session->set_userdata('mensagem', $this->lang->line('desbloqueado_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('cliente/lista_perfis/' . $id_cliente);
    }

    /////// FORM VALIDATION
    public function nome_disponivel($nome)
    {
        if ($this->cliente_model->cliente_existe($nome)) {
            $this->form_validation->set_message('nome_disponivel', $this->lang->line('form_error_nome_disponivel'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function login_disponivel($login)
    {
        $usuario = $this->cliente_model->buscar_login($login);
        $id_usuario = $this->input->post('id_usuario');
        if (!$usuario || (isset($id_usuario)) && $usuario->idUsuario == $this->input->post('id_usuario')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}