<?php
// by: Vitor Pontes
	class Moeda extends CI_controller {
		public function __construct() {
   			parent::__construct();
   			$this->load->model('moeda_model');
   			$this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION
		
			$this->load->model('cliente_model');
			if (!($this->session->userdata('linguagem'))) {
				$this->session->set_userdata('linguagem', 'portugues');
			}
		
			$linguagem_usuario = $this->session->userdata('linguagem');
			$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		}
		public function cadastrar(){
			$this->load->view('moeda/cadastro_moeda');
		}
		public function cadastrar_moeda(){
			$this->form_validation->set_message('required', $this->lang->line('form_error_required') );
			$this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
			$this->form_validation->set_message('decimal_num', $this->lang->line('form_error_decimal_num'));
			if( $this->form_validation->run('moeda')){ //verificando se os campos foram preenchidos corretamente
				// obtendo valores
				$nome = $this->input->post('nome');
				$sigla = $this->input->post('sigla');
				$cambio = $this->input->post('cambio');
				$id_cliente = $this->session->userdata('cliente_id');
				$this->moeda_model->cadastrar($nome,$sigla,$cambio,$id_cliente);
				$mensagem = array(
									'mensagem'				=> $this->lang->line('cadastro_sucesso'),
									'tipo_mensagem' 		=> 'success'
								);
				$this->session->set_userdata($mensagem);
				redirect('moeda/listar');
			}
			else{
				$mensagem = array(
									'mensagem'				=> $this->lang->line('campos_invalidos'),
									'subtitulo_mensagem'	=> validation_errors() ,
									'tipo_mensagem' 		=> 'error'
								);
				$this->session->set_userdata($mensagem);
				$this->load->view('moeda/cadastro_moeda');
			}
		}
		public function listar(){
			$dados['moedas'] = $this->moeda_model->buscar_moedas($this->session->userdata('cliente_id'));
			$this->load->view('moeda/listar_moedas',$dados);
		}
		public function deletar(){
			$id = $this->input->get("param");
			if((string)(int)$id == $id){ //verifica se o ID é valido
				$id = (int) $id;
				$this->moeda_model->deletar_moeda($id);
			}
			redirect('moeda/listar');
		}
		public function editar(){
			$id = $this->input->get('param');
			if((string)(int)$id == $id){ // verifica se o ID é valido
				$dados['moeda'] = $this->moeda_model->buscar_moeda($id);
				if($dados['moeda']->idCliente == $this->session->userdata('cliente_id')){
					$this->load->view('moeda/editar_moeda',$dados);
				}
				else{
					$mensagem = array(
							'mensagem'				=> $this->lang->line('permissao_insuficiente'),
							'tipo_mensagem' 		=> 'error'
							);
					$this->session->set_userdata($mensagem);
					redirect('moeda/listar');
				}
			}
			else{
				$mensagem = array(
									'mensagem'				=> $this->lang->line('acesso_negado'),
									'tipo_mensagem' 		=> 'error'
								);
				$this->session->set_userdata($mensagem);
				redirect('moeda/listar');
			}
		}
		public function editar_moeda(){
			$id_cliente = $this->input->post('cliente_id');
			if($id_cliente == $this->session->userdata('cliente_id')){ //checa se o id não foi manipulado
				$this->form_validation->set_message('required', $this->lang->line('form_error_required') );
				$this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
				$this->form_validation->set_message('decimal_num', $this->lang->line('form_error_decimal_num'));
				$id = $this->input->post('id');
				if( $this->form_validation->run('moeda') ){ //verificando se campos foram preenchidos
					$nome = $this->input->post('nome');
					$sigla = $this->input->post('sigla');
					$cambio = $this->input->post('cambio');
					$this->moeda_model->editar_moeda($nome,$sigla,$cambio,$id_cliente,$id);
					$mensagem = array(
									'mensagem'				=> $this->lang->line('cadastro_sucesso'),
									'tipo_mensagem' 		=> 'success'
								);
					$this->session->set_userdata($mensagem);	
					redirect('moeda/listar');
				}
				else{
				$mensagem = array(
									'mensagem'				=> $this->lang->line('campos_invalidos'),
									'subtitulo_mensagem'	=> validation_errors() ,
									'tipo_mensagem' 		=> 'error'
								);
				$this->session->set_userdata($mensagem);
				$dados['moeda'] = $this->moeda_model->buscar_moeda($id);
				$this->load->view('moeda/editar_moeda',$dados);
				}
			}
			else{
				$mensagem = array(
							'mensagem'				=> $this->lang->line('permissao_insuficiente'),
							'tipo_mensagem' 		=> 'error'
							);
				$this->session->set_userdata($mensagem);
				redirect('moeda/listar');
			}
		}

		/////// FORM VALIDATION

		public function decimal_num($valor){
			$valor = str_replace (',','.',$valor); //substitui virgulas por pontos para fazer o type casting
			if((string)(float)$valor == $valor){ //verifica se é um numero
				$valor = (float) $valor; // type casting de string para número
				return $valor;
			}
			else{
				return FALSE;
			}
			
		}
	} 