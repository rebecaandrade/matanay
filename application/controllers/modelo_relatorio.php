<?php
	class Modelo_relatorio extends CI_controller {
		// by: Vitor Pontes
		public function __construct() {
			parent::__construct();
			$this->load->model('modelo_relatorio_model');
			$this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION
			if (!($this->session->userdata('linguagem'))) {
				$this->session->set_userdata('linguagem', 'portugues');
			}
			$linguagem_usuario = $this->session->userdata('linguagem');
			$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		}
		public function cadastro_modelo($id_cliente){
			$dados['tipos'] = $this->modelo_relatorio_model->buscar_tipos_modelo();
			$dados['colunas'] = $this->colunas(100);
			$this->load->view('modelo_relatorio/cadastrar_modelo',$dados);
		}
		///// helper
		public function colunas($quant){
			$colunas 	= array();
			$coluna 	='a';
			array_push($colunas, $coluna);
			for ($i=1; $i <$quant ; $i++) { 
				$coluna = ++$coluna;
				array_push($colunas, $coluna);
			}
			return $colunas;
		}
	}