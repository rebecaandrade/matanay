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
            'isrc' => $this->input->post('isrc')
        );

        $dados['artistas'] = $this->input->post('artistas[]');
        $autores = $this->input->post('autores[]');
        $produtores = $this->input->post('produtores[]');
        $dados['percentual_artista'] = $this->input->post('percentual_artista[]');
        $dados['percentual_autor'] = $this->input->post('percentual_autor[]');
        $dados['percentual_produtor'] = $this->input->post('percentual_produtor[]');

        if($faixa['nome'] != NULL && $faixa['isrc'] != NULL){
            $this->faixas_videos_model->cadastrar_faixa($faixa, $artistas, $autores, $produtores, $dados);
            
            redirect('faixas_videos/cadastra_faixa');       
        }else{
            
            redirect('cliente/home');
        }

	}

	public function listar(){
		$this->load->library('pagination');
        $config['base_url'] = base_url('index.php/faixas_videos/listar');
        $config['total_rows'] = $this->faixas_videos_model->buscar_faixas()->num_rows();
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);

        $dados = array(
            'faixas' => $this->faixas_videos_model->buscar_faixas($qtde, $inicio)->result(),
            'paginas' => $this->pagination->create_links()
        );

		$this->load->view('faixas_videos/lista_faixas', $dados);
	}

    public function editar($id){
        $dados['faixa'] = $this->faixas_videos_model->buscar_dados($id);
        $dados['artistas'] = $this->faixas_videos_model->buscar_artistas();
        $dados['autores'] = $this->faixas_videos_model->buscar_autores();
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores();

        $this->load->view('faixas_videos/edita_faixa', $dados);
    }

    public function atualizar(){
        $dados = array(
            'idFaixa' => $this->input->post('idFaixa'),
            'nome' => $this->input->post('nome'),
            'isrc' => $this->input->post('isrc'),
            'percentual_artista' => $this->input->post('percentual_artista'),
            'percentual_autor' => $this->input->post('percentual_autor'),
            'percentual_produtor' => $this->input->post('percentual_produtor')
        );

        if($dados['nome'] != NULL && $dados['isrc'] != NULL){
            $this->faixas_videos_model->atualizar_faixa($dados);
            
            redirect('faixas_videos/listar');       
        }else{
            $id = $this->input->post('idFaixa');
            redirect('faixas_videos/editar', $id);
        }
    }

}