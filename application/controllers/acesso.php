<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acesso extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('acesso_model');
	}

	public function login(){
		if (!($this->session->userdata('linguagem'))) {
			$this->session->set_userdata('linguagem', 'portugues');
		}
		
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$this->load->view('acesso/login');
	}

	public function logar(){
		$user = $this->input->post('usuario');
		$senha = md5($this->input->post('senha'));

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$usuario = $this->acesso_model->procurar_usuario($user, $senha);
		if(!$usuario){
			$mensagem = array(
							'mensagem' =>'Usuário ou senha inválidos.'
						);
			$this->session->set_userdata($mensagem);
			redirect('acesso/login');
		}
		else{	
			$newdata = array(
				'nome' => $usuario->nome,
				'login' => $usuario->login
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

	public function recuperar(){
		$this->load->view('acesso/recuperar_senha');
	}

	public function deslogar(){
		$this->session->sess_destroy();
		redirect('acesso/login');
	}

}