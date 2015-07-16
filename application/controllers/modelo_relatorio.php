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
		public function cadastro_modelo(){
			$dados['tipos'] = $this->modelo_relatorio_model->buscar_tipos_modelo();
			$dados['colunas'] = $this->colunas(100);
			$this->load->view('modelo_relatorio/cadastrar_modelo',$dados);
		}
		public function cadastrar_modelo(){
			$this->form_validation->set_message('required', $this->lang->line('form_error_required') );
			$this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
			$this->form_validation->set_message('tipo_modelo_valido', $this->lang->line('form_error_tipo_modelo_valido'));
			$this->form_validation->set_message('alpha', $this->lang->line('form_error_modelo_relatorio_alpha'));
			if($this->form_validation->run('modelo_relatorio')){
				$post = $this->input->post();
				$id_tipo = $post['tipo'];
				unset($post['tipo']);
				$post['idTipo_Modelo'] = $id_tipo;
				$query = $this->modelo_relatorio_model->cadastrar_modelo($post);
				if($query){
					$mensagem = array(
										'mensagem'				=> $this->lang->line('cadastro_sucesso'),
										'tipo_mensagem' 		=> 'success'
									);
					$this->session->set_userdata($mensagem);
					redirect('modelo_relatorio/listar_modelos');
				} else {
					$mensagem = array(
										'mensagem'				=> $this->lang->line('erro'),
										'tipo_mensagem' 		=> 'error'
									);
					$this->session->set_userdata($mensagem);
					redirect('cadastro_modelo');
				}
			}
			else{
				$mensagem = array(
									'mensagem'				=> $this->lang->line('campos_invalidos'),
									'subtitulo_mensagem'	=> validation_errors() ,
									'tipo_mensagem' 		=> 'error'
								);
				$this->session->set_userdata($mensagem);
				$dados['tipos'] = $this->modelo_relatorio_model->buscar_tipos_modelo();
				$dados['colunas'] = $this->colunas(100);
				$this->load->view('modelo_relatorio/cadastrar_modelo',$dados);
			}

		}
		///// helper
		// by: Vitor Pontes
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
		////// FORM VALIDATION
		// by: Vitor Pontes
		public function tipo_modelo_valido($id_tipo){
			$query = $this->modelo_relatorio_model->buscar_tipo_modelo($id_tipo);
			if($query->num_rows() > 0){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}