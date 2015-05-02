<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faixas_Videos extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('faixas_videos_model');
	}

	public function cadastra_faixa(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		
		$this->load->view('faixas_videos/cadastro_faixa');
	}

	public function cadastrar_faixa(){
		
	}

	public function cadastra_video(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		
		$this->load->view('faixas_videos/cadastro_video');
	}

}