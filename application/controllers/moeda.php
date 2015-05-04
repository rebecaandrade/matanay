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
			
			$this->moeda_model->cadastrar($nome,$sigla,$cambio);
			redirect('moeda/cadastrar');
		}
		public function listar(){
			// $this->session->set_flashdata('redirect_url', current_url());

			// $linguagem_usuario = $this->session->userdata('linguagem');
			// $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
			
			$dados['moedas'] = $this->moeda_model->buscar_moedas();
			$this->load->view('moeda/listar_moedas',$dados);
		}
	} 