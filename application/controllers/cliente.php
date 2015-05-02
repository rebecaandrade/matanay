<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

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
	
}