<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// by : Vitor Pontes
class Cliente extends CI_Controller {
	public function __construct() {
   			parent::__construct();
   			$this->load->model('cliente_model');
		}

	public function home(){
		$this->session->set_userdata('sub_menu', 1);
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$this->load->view('cliente/home'); 
	}

	public function cadastro_cliente(){
		$this->load->view('cliente/cadastrar_cliente');
	}
	public function cadastro_perfil($id_cliente){
		if(isset($id_cliente)){
			$dados['id_cliente'] = $id_cliente;
			$dados['funcionalidades'] = $this->cliente_model->funcionalidades(); 
			$this->load->view('cliente/cadastrar_perfil',$dados);
		} else {
			//mensagem de erro
			redirect('cliente/cadastro_cliente');
		}
	}
	public function cadastrar_cliente(){
		$nome = trim($this->input->post('nome'));
		if( !$this->cliente_model->cliente_existe($nome)){
			$this->cliente_model->cadastrar_cliente($nome);
			//mensagem de sucesso
			redirect('cliente/cadastro_cliente');
		}
		else{
			//mensagem de erro
			redirect('cliente/cadastro_cliente');
		}
	}
	public function cadastrar_perfil(){
		$id_cliente = $this->input->post('id');
		$nome  = trim($this->input->post('nome'));
		$login = trim($this->input->post('login'));
		$senha = trim($this->input->post('senha'));
		$confirmar_senha = trim($this->input->post('confirmar_senha'));
		$funcs = $this->input->post('func');
		if(!$this->cliente_model->login_existe($login)){
			if($senha == $confirmar_senha ){	
				if(strlen($nome) != 0 && strlen($login) != 0 && strlen($senha) !=0){
					$this->db->trans_start();
					$perfil_id = $this->cliente_model->cadastrar_perfil($nome,$login,md5($senha),$id_cliente);
					if(isset($funcs)){
						$this->cliente_model->cadastrar_funcionalidades($funcs,$perfil_id);
					}
					$this->db->trans_complete();
					if($this->db->trans_status() == TRUE){
						// setar 'usuario cadastrado com sucesso'
						redirect('cliente/lista_perfis/'.$id_cliente);
					}
					else{
						// mensagem de erro
						redirect('cliente/cadastro_perfil/'.$id_cliente);
					}
				}
				else{
					//setar 'preencha todos os campos'
					redirect('cliente/cadastro_perfil/'.$id_cliente);
				}
			}
			else{
				// setar mensagem de senhas não batem
				redirect('cliente/cliente/cadastro_perfil/'.$id_cliente);
			}
		}
		else{
			// setar 'login já cadastrado'
			redirect('cliente/cliente/cadastro_perfil/'.$id_cliente);
		}
	}
	public function lista_clientes(){
		$dados['clientes'] = $this->cliente_model->clientes(); 
		$this->load->view('cliente/lista_clientes',$dados);
	}
	public function lista_perfis($id_cliente){
		if(isset($id_cliente)){
			$this->session->set_flashdata('id_cliente', $id_cliente);
			$dados['id'] = $id_cliente;
			$dados['perfis'] = $this->cliente_model->perfis($id_cliente);
			$this->load->view('cliente/lista_perfis',$dados);
		}
		else{

			redirect('cliente/home');
		}
	}
	public function excluir_cliente($id_cliente){
		$this->cliente_model->excluir_cliente($id_cliente);
		redirect('cliente/lista_clientes');
	}
	public function excluir_perfil($id_perfil){ 	
		$this->cliente_model->excluir_perfil($id_perfil);
		$this->session->set_userdata('mensagem','excluido com sucesso');
		redirect('cliente/lista_clientes');
	}
}