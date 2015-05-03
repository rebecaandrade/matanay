<?php

	class Moeda extends CI_controller {
		public function __construct() {
   			parent::__construct();
   			$this->load->model('moeda_model');
		}
		public function cadastrar(){
			if (!($this->session->userdata('linguagem'))) {
				$this->session->set_userdata('linguagem', 'portugues');
			}
			
			$this->session->set_flashdata('redirect_url', current_url());

			$linguagem_usuario = $this->session->userdata('linguagem');
			$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
			
			$this->load->view('moeda/cadastro_moeda');
		}
		public function cadastrar_moeda(){
			$nome = $this->input->post('nome');
			$sigla = $this->input->post('sigla');
			$cambio = $this->input->post('cambio');

			$cambio = str_replace (',','.',$cambio); //substitui virgulas por pontos para fazer o type casting
			$cambio = (float) $cambio; // type casting de string para número
			
			if($this->moeda_model->cadastrar($nome,$sigla,$cambio)){
				$this->session->set_userdata('mensagem','Moeda cadastrada com sucesso.');
			} 
			else {
				$this->session->set_userdata('mensagem','Moeda já cadastrada.');
			}
			redirect('moeda/cadastrar');
		}
	} 