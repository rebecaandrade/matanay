<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faixas_Videos extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('faixas_videos_model');
	}

	public function cadastra_faixa(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$dados['artistas'] = $this->faixas_videos_model->buscar_artistas();
		$dados['autores'] = $this->faixas_videos_model->buscar_autores();
		$dados['produtores'] = $this->faixas_videos_model->buscar_produtores();
		
		$this->load->view('faixas_videos/cadastro_faixa', $dados);
	}

	public function cadastrar_faixa(){
		$faixa = array(
            'nome' => $this->input->post('nome'),
            'isrc' => $this->input->post('isrc'),
            'percentual_artista' => $this->input->post('percentual_artista'),
            'percentual_autor' => $this->input->post('percentual_autor'),
            'percentual_produtor' => $this->input->post('percentual_produtor')
        );

        if($faixa['nome'] != NULL && $faixa['isrc'] != NULL){
            $this->faixas_videos_model->cadastrar_faixa($faixa);
            
            redirect('faixas_videos/cadastra_faixa');       
        }else{
            
            redirect('faixas_videos/cadastra_faixa');
        }

	}

	public function cadastra_video(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
		
		$this->load->view('faixas_videos/cadastro_video');
	}

}