<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albuns extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('albuns_model');
	}

	public function cadastra_album(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$dados['tipos'] = $this->albuns_model->buscar_tipos();
		$dados['faixas'] = $this->albuns_model->buscar_faixas();
		$dados['artistas'] = $this->albuns_model->buscar_artistas();
		
		$this->load->view('albuns/cadastro_album', $dados);
	}

	public function cadastrar(){
		$album = array(
            'nome' => $this->input->post('nome'),
            'quantidade' => $this->input->post('n_faixas'),
            'upc_ean' => $this->input->post('upc_ean'),
            'faixa' => 100/$this->input->post('n_faixas'),
            'codigo_catalogo' => $this->input->post('catalogo'),
            'idTipo_Album' => $this->input->post('tipo')
        );

		$n = $this->input->post('n_faixas');

		for($i = 0; $i <= $n; $i++){
	        $faixas = array(
	        	'idFaixa'+$i => $this->input->post('faixa'+$i)
	        );
	    }

        if($album['nome'] != NULL){
 			$this->albuns_model->cadastrar_album($album, $faixas, $n);

            redirect('albuns/cadastra_album');       
        }else{
            
            redirect('cliente/home');
        }

	}

}