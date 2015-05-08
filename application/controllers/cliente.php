<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {
	public function __construct() {
   			parent::__construct();
   			$this->load->model('cliente_model');
		}
	public function index(){
		if($this->session->userdata('id_usuario') != false){
			redirect('cliente/home');
		}
		else{
			redirect('acesso/login');
		}
	}

	public function home(){
		$this->session->set_userdata('sub_menu', 1);
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$this->load->view('cliente/home'); 
	}

	public function menu_cadastrar(){
		$this->session->set_userdata('sub_menu', 2);
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		
		$this->load->view('cliente/cadastrar');	
	}
	public function cadastrar_perfil(){
		$dados['funcionalidades'] = $this->cliente_model->funcionalidades(); 
		$this->load->view('cliente/cadastra_cliente',$dados);
	}
	public function cadastrar(){
		$nome  = trim($this->input->post('nome'));
		$login = trim($this->input->post('login'));
		$senha = trim($this->input->post('senha'));
		$confirmar_senha = trim($this->input->post('confirmar_senha'));
		$funcs = $this->input->post('func');
		if(!$this->cliente_model->login_existe($login)){
			if($senha == $confirmar_senha ){	
				if(strlen($nome) != 0 && strlen($login) != 0 && strlen($senha) !=0){
					$perfil_id = $this->cliente_model->cadastrar_perfil($nome,$login,md5($senha));
					$this->cliente_model->cadastrar_cliente($perfil_id);
					if(isset($funcs)){
						$this->cliente_model->cadastrar_funcionalidades($funcs,$perfil_id);
					}
					// setar 'usuario cadastrado com sucesso'
					redirect('cliente/cadastrar_perfil');
				}
				else{
					//setar 'preencha todos os campos'
					redirect('cliente/cadastrar_perfil');
				}
			}
			else{
				// setar mensagem de senhas não batem
				redirect('cliente/cadastrar_perfil');
			}
		}
		else{
			// setar 'login já cadastrado'
			redirect('cliente/cadastrar_perfil');
		}
	}
	public function listar(){
		$dados['perfis'] = $this->cliente_model->perfis();
		$this->load->view('cliente/listar_perfis',$dados);
	}
}