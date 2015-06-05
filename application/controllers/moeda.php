<?php
// by: Vitor Pontes
	class Moeda extends CI_controller {
		public function __construct() {
   			parent::__construct();
   			$this->load->model('moeda_model');
		}
		public function cadastrar(){		
			$this->load->view('moeda/cadastro_moeda');
		}
		public function cadastrar_moeda(){
			// obtendo valores e removendo espaços em branco indesejaveis
			$nome = trim($this->input->post('nome'));
			$sigla = trim($this->input->post('sigla'));
			$cambio = trim($this->input->post('cambio'));
			$id = $this->session->userdata('id_usuario'); // consertar

			if(strlen($nome) != 0 && strlen($sigla) != 0 && strlen($cambio) != 0){ //verificando se os campos foram preenchidos
				$this->moeda_model->cadastrar($nome,$sigla,$cambio,$id);
			}
			else{
				//setar mensagem de campos vazios
			}
			redirect('moeda/cadastrar');
		}
		public function listar(){
			$dados['moedas'] = $this->moeda_model->buscar_moedas();
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
				//setar mensagem de sucesso
				$dados['moeda'] = $this->moeda_model->buscar_moeda($id);
				$this->load->view('moeda/editar_moeda',$dados);
			}
			else{
				// seta mensagem de parametro invalido
				redirect('moeda/listar');
			}
		}
		public function editar_moeda(){
			// obtendo valores e removendo espaços em branco indesejaveis
			$id = trim($this->input->post('id'));
			$nome = trim($this->input->post('nome'));
			$sigla = trim($this->input->post('sigla'));
			$cambio = trim($this->input->post('cambio'));
			if(strlen($nome) != 0 && strlen($sigla) != 0 && strlen($cambio) != 0){ //verificando se campos foram preenchidos

				if($this->moeda_model->editar_moeda($id,$nome,$sigla,$cambio)){
				//seta mensagem de sucesso	
				redirect('moeda/listar');
				}
				else{
				//recarrega pagina de carregamento
				$dados['moeda'] = $this->moeda_model->buscar_moeda($id);
				
				//setar mensagem de taxa de cambio invalida
				$this->load->view('moeda/editar_moeda',$dados);
			}
			}
			else{
				//recarrega pagina de carregamento
				$dados['moeda'] = $this->moeda_model->buscar_moeda($id);
				
				//setar mensagem de campos não preenchidos
				$this->load->view('moeda/editar_moeda',$dados);
			}

		}
	} 