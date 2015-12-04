<?php
	// by : Vitor Pontes
	class Contrato extends CI_controller {
		public function __construct() {
			parent::__construct();
	        $this->load->model('Entidade_model');
	        $this->load->model('Favorecido_model');
			$this->load->model('Contrato_model');
			$this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION

			if (!($this->session->userdata('linguagem'))) {
				$this->session->set_userdata('linguagem', 'portugues');
			}
		
			$linguagem_usuario = $this->session->userdata('linguagem');
			$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		}

	    public function listar()
	    {
	        $id_cliente = $this->session->userdata('cliente_id');
	        $dados["dadoContrato"] = $this->Contrato_model->buscar_datas($id_cliente);
	        $dados["dadosFavorecido"] = $this->Favorecido_model->buscar_favorecido($id_cliente);
	        $dados["dadosEntidade"] = $this->Entidade_model->buscar_entidades($id_cliente);
	        $this->load->view("contrato/listagem_contrato", $dados);
	    }

		public function cadastro(){
			$id_cliente = $this->session->userdata('id_cliente');
			$dados['entidades'] = $this->Contrato_model->buscar_entidades($id_cliente);
			$dados['favorecidos'] = $this->Contrato_model->buscar_favorecidos($id_cliente);
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
				$data_inicio = date('Y-m-d', strtotime($this->input->post('data_inicio')));
				$data_fim = date('Y-m-d', strtotime($this->input->post('data_fim')));
				$alerta = $this->input->post('alerta');
				$id_entidade = $this->input->post('entidade');
				$id_favorecido = $this->input->post('favorecido');
				$idCliente = $this->session->userdata('cliente_id');
				$this->Contrato_model->cadastrar($nome,$data_inicio,$data_fim,$alerta,$id_entidade, $id_favorecido,$idCliente);
				$this->session->set_userdata('mensagem', '=)');
	            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
	            $this->session->set_userdata('tipo_mensagem', 'success');
				redirect('contrato/listar');
			} else {
				$mensagem = array(
									'mensagem'				=> $this->lang->line('campos_invalidos'),
									'subtitulo_mensagem'	=> validation_errors() ,
									'tipo_mensagem' => 'error'
								);
				$this->session->set_userdata($mensagem);
				redirect('contrato/cadastro');
			}
		}


		public function camposatualizacao($id_contrato = -1){
			if ($this->input->post('oneInput') != null) {
	            $id_contrato = $this->input->post('oneInput');
	        } else if ($id_contrato == -1)
            	redirect('contrato/listar');
            $id_cliente = $this->session->userdata('id_cliente');
			$dados['entidades'] = $this->Contrato_model->buscar_entidades($id_cliente);
			$dados['favorecidos'] = $this->Contrato_model->buscar_favorecidos($id_cliente);
			$dados['dadosContrato'] = $this->Contrato_model->buscar_contrato_especifico($id_contrato);
			
			$dados['dadosContrato']->data_inicio = $this->trasnformaData($dados['dadosContrato']->data_inicio);
			$dados['dadosContrato']->data_fim = $this->trasnformaData($dados['dadosContrato']->data_fim);
			
	        
	        $dados['dadosFavorecido'] = $this->Favorecido_model->buscar_favorecido_especifico($dados["dadosContrato"]->idFavorecido);
	        $dados['dadosEntidade'] = $this->Entidade_model->buscar_entidade_especifica($dados["dadosContrato"]->idEntidade);
	        $this->load->view('contrato/edicao_contrato',$dados);
		}

		public function atualizacao_contrato(){
			$this->form_validation->set_message('required', $this->lang->line('form_error_required') );
			$this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
			$this->form_validation->set_message('is_int', $this->lang->line('form_error_is_int'));
			$this->form_validation->set_message('permissao_entidade', $this->lang->line('form_error_permissao_entidade'));
			$this->form_validation->set_message('permissao_favorecido', $this->lang->line('form_error_permissao_favorecido'));
			$this->form_validation->set_message('data_valida', $this->lang->line('form_error_data_valida'));
			$this->form_validation->set_message('depois_data_inicio', $this->lang->line('form_error_depois_data_inicio'));
			if($this->form_validation->run('contrato')){
				$idContrato = $this->input->post('idContrato');
				$nome = trim($this->input->post('nome'));
				$data_inicio = date('Y-m-d', strtotime($this->input->post('data_inicio')));
				$data_fim = date('Y-m-d', strtotime($this->input->post('data_fim')));
				$alerta = $this->input->post('alerta');
				$id_entidade = $this->input->post('entidade');
				$id_favorecido = $this->input->post('favorecido');
				$idCliente = $this->session->userdata('cliente_id');
				$this->Contrato_model->atualizar($idContrato, $nome,$data_inicio,$data_fim,$alerta,$id_entidade, $id_favorecido,$idCliente);
				$this->session->set_userdata('mensagem', '=)');
	            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
	            $this->session->set_userdata('tipo_mensagem', 'success');
				redirect('contrato/listar');
			} else {
				$mensagem = array(
									'mensagem'				=> $this->lang->line('campos_invalidos'),
									'subtitulo_mensagem'	=> validation_errors() ,
									'tipo_mensagem' => 'error'
								);
				$this->session->set_userdata($mensagem);
				redirect('contrato/cadastro');
			}
		}


		//Coloca a data em um modo mais legivel
		public function trasnformaData($dadosData){
			$data = $dadosData;
			$mes[0] = $data[5];	
			$mes[1] = $data[6];
			$dia[0] = $data[8];
			$dia[1] = $data[9];
			$ano[0] = $data[0];
			$ano[1] = $data[1];
			$ano[2] = $data[2];
			$ano[3] = $data[3];
			
			$ano = implode("", $ano);
			$dia = implode("", $dia);
			$mes = implode("", $mes);
			$mesn = array_map('intval', explode(',', $mes)); //converte string para int

			$mes = date("F", mktime(0, 0, 0, $mesn[0], 10));
			$data = $dia . ' ' . $mes . ', ' . $ano;

			return $data;
		}

		/////// FORM VALIDATION
		public function data_valida($data){
			return TRUE;//Nao precisa por que o materialize nao permite outro formato de data

		}
		public function permissao_entidade($id){
			$entidade = $this->Contrato_model->buscar_entidade($id);
			if($entidade->idCliente == $this->session->userdata('id_cliente')){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		public function permissao_favorecido($id){
			$favorecido = $this->Contrato_model->buscar_favorecido($id);
			if($favorecido->idCliente == $this->session->userdata('id_cliente')){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function depois_data_inicio($fim){
			$inicio = $this->input->post('data_inicio');
			$inicio = date('d-m-Y', strtotime($inicio));
			$fim = date('d-m-Y', strtotime($fim));

			if($inicio>$fim){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}

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

		public function deletar($idCadastro)
	    {
	        $this->Contrato_model->deletar($idCadastro);
	        $this->session->set_userdata('mensagem', '=)');
	        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('excluido_sucesso'));
	        $this->session->set_userdata('tipo_mensagem', 'success');
	        $this->listar();
	    }

	}