<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acesso extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('acesso_model');
   		$this->load->model('cliente_model');
   				$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
	}

	public function index(){
		if($this->session->userdata('id_usuario') != false){
			redirect('cliente/home');
		}
		else{
			redirect('acesso/login');
		}
	}

	public function login() {
		if (!($this->session->userdata('linguagem'))) {
			$this->session->set_userdata('linguagem', 'portugues');
		}
		
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$this->load->view('acesso/login');
	}

	public function logar() {
		$user = $this->input->post('usuario');
		$senha = md5($this->input->post('senha'));

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$usuario = $this->acesso_model->procurar_usuario($user, $senha);
		if($usuario->bloqueado){
			$mensagem = array(
							'mensagem' => $this->lang->line('usuario_bloqueado')
						);
			$this->session->set_userdata($mensagem);
			redirect('acesso/login');
		}
		if(!$usuario){
			$mensagem = array(
							'mensagem' => $this->lang->line('usuario_ou_senha_invalida')
						);
			$this->session->set_userdata($mensagem);
			redirect('acesso/login');
		}
		else{	
			$newdata = array(
				'id_usuario' => $usuario->idUsuario,
				'nome' => $usuario->nome,
				'login' => $usuario->login,
				'id_cliente' => $usuario->idCliente,
				'cliente_id' => $usuario->idCliente
			);
			$this->session->set_userdata($newdata);

			redirect('cliente/home');
		}
	}

	public function linguagem() {
		$this->session->set_userdata('linguagem', $this->input->post('lang'));
		
		$url = $this->session->flashdata('redirect_url');
   		redirect($url);
	}

	public function recuperar() {
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		
		$this->load->view('acesso/recuperar_senha');
	}

	public function recuperarSenha(){

		$info = $this->input->post();

		$usuario = $this->acesso_model->procurar_usuarioSemSenha($info['usuario']);
		if(!$usuario){
			$mensagem = array(
							'mensagem' => $this->lang->line('usuario_invalido')
						);
			$this->session->set_userdata($mensagem);
			redirect('acesso/recuperar');
		}
		$email = $this->cliente_model->buscarEmail($info['usuario'])->email;
		$this->enviar_email_recuperacao($email, $info['usuario']);
	}


	public function enviar_email_recuperacao($email, $login){
		$this->load->library('email');
		$codigo_email = md5($email . 'matanay');

		$this->email->set_mailtype('html');
		$this->email->from($this->config->item('bot_email'), 'Matanay');
		$this->email->to($email);
		$this->email->subject($this->lang->line('resetSuaSenha'));

		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
					"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><hltm>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
					</head><body>';

		$message .= '<p>' . $login . '</p>';
		$message .= '<p>' . $this->lang->line('resetSuaSenhaLink') . '</p>';
		$message .= '<p><strong><a href="' . base_url() . 'asseso/reset_senha_form/' . $email . '/'. $codigo_email . '">link</a></strong></p>';
		$message .= '</body></html>';

		$this->email->message($message);
		$this->email->send();

	}

	public function reset_senha_form($email, $codigo_email){
		if(md5($email . 'matanay') == $email_code){
			$dados['perfil'] = $this->acesso_model->pegarDadosPorEmail($email);
			$this->load->view('acesso/novaSenha');
		}
		else{
			$mensagem = array(
							'mensagem' => 'Error'
						);
			$this->session->set_userdata($mensagem);
			redirect('acesso/login');			
		}
	}

	public function cadastrarNovaSenha(){

		$info = $this->input->post();

		$data = array(
				'senha' => md5($info["senha"]),
			 );

		if($this->acesso_model->atualizar_senha($info["id_usuario"], $data)){
			$this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            $id_cliente = $this->session->userdata('cliente_id');
            $this->login();
        } else {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('login_existente'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            $this->login();
            return;
        }
	}

	public function deslogar() {
		$this->session->sess_destroy();
		redirect('acesso/login');
	}

}