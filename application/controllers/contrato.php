<?php
	// by : Vitor Pontes
	class Contrato extends CI_controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('contrato_model');
			$this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION

			if (!($this->session->userdata('linguagem'))) {
				$this->session->set_userdata('linguagem', 'portugues');
			}
		
			$linguagem_usuario = $this->session->userdata('linguagem');
			$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		}
		public function cadastro(){
			$id_cliente = $this->session->userdata('id_cliente');
			$dados['entidades'] = $this->contrato_model->buscar_entidades($id_cliente);
			$dados['favorecidos'] = $this->contrato_model->buscar_favorecidos($id_cliente);
			$this->load->view('contrato/cadastro_contrato',$dados);
		}
		public function cadastrar_contrato(){
			$this->form_validation->set_message('required', $this->lang->line('form_error_required') );
			$this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
			$this->form_validation->set_message('is_int', $this->lang->line('form_error_is_int'));
			$this->form_validation->set_message('permissao_entidade', $this->lang->line('form_error_permissao_entidade'));
			$this->form_validation->set_message('permissao_favorecido', $this->lang->line('form_error_permissao_favorecido'));
			$this->form_validation->set_message('data_valida', $this->lang->line('form_error_data_valida'));
			$this->form_validation->set_message('depois_data_inicio', $this->lang->line('form_error_depois_data_inicio'));
			if($this->form_validation->run('contrato')){
				$nome = trim($this->input->post('nome'));
				$data_inicio = $this->input->post('data_inicio');
				$data_fim = $this->input->post('data_fim');
				$alerta = $this->input->post('alerta');
				$id_entidade = $this->input->post('entidade');
				$id_favorecido = $this->input->post('favorecido');
				$this->contrato_model->cadastrar($nome,$data_inicio,$data_fim,$alerta,$id);
				$mensagem = array(
								'mensagem'		=> $this->lang->line('cadastrado_sucesso'),
								'tipo_mensagem' => 'success'
							);
				redirect('contrato/listar');
			} else {
				$mensagem = array(
									'mensagem'		=> validation_errors() ,
									'tipo_mensagem' => 'error'
								);
				$this->session->set_userdata($mensagem);
				redirect('contrato/cadastro');
			}
		}
		/////// FORM VALIDATION
		public function data_valida($data){
			$padrao = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
			if(preg_match($padrao,$data)){
				return TRUE;
			} 
			else {
				return FALSE;
			}
		}
		public function permissao_entidade($id){
			$entidade = $this->contrato_model->buscar_entidade($id);
			if($entidade->idCliente == $this->session->userdata('id_cliente')){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		public function permissao_favorecido($id){
			$favorecido = $this->contrato_model->buscar_favorecido($id);
			if($favorecido->idCliente == $this->session->userdata('id_cliente')){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}