<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albuns extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('albuns_model');
	}

	public function cadastra_album(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$dados['tipos'] = $this->albuns_model->buscar_tipos();
		$dados['faixas'] = $this->albuns_model->buscar_faixas();
		$dados['artistas'] = $this->albuns_model->buscar_artistas();
		
		$this->load->view('albuns/cadastro_album', $dados);
	}

}