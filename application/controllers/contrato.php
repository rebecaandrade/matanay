<?php
	// by : Vitor Pontes
	class Contrato extends CI_controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('contrato_model');
		}
		public function cadastro(){
			$id_cliente = $this->session->userdata('id_cliente');
			$dados['entidades'] = $this->contrato_model->buscar_entidades($id_cliente);
			$dados['favorecidos'] = $this->contrato_model->buscar_favorecidos($id_cliente);
			$this->load->view('contrato/cadastro_contrato',$dados);
		}
		public function cadastrar_contrato(){
			$nome = trim($this->input->post('nome'));
			$data_inicio = $this->input->post('data_inicio');
			$data_fim = $this->input->post('data_fim');
			$alerta = $this->input->post('alerta');
			$id = $this->input->post('id_entidade');
			if($nome != NULL && $data_inicio != NULL && $data_fim != NULL && $alerta != NULL && $id != NULL){
				$padrao = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
				if( preg_match($padrao,$data_inicio) && preg_match($padrao,$data_fim) ){
					if((int)$alerta > 0 && (int)$alerta <= 12){ 
						$this->contrato_model->cadastrar($nome,$data_inicio,$data_fim,$alerta,$id);
						redirect('contrato/listar');
						// mensagem de sucesso
					} else {
						redirect('contrato/cadastro/'.$id);
						//mensagem de erro
					}
				} else {
					redirect('contrato/cadastro/'.$id);
					//mensagem de erro
				}
			} else {
				redirect('contrato/cadastro/'.$id);
				//mensagem de erro
			}
		}
	}