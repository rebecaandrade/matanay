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
            'ano' => $this->input->post('ano'),
            'faixa' => 100/$this->input->post('n_faixas'),
            'codigo_catalogo' => $this->input->post('catalogo'),
            'idTipo_Album' => $this->input->post('tipo')
        );

        $artista = $this->input->post('artista');

		$faixas = $this->input->post('faixas[]');

        if($album['nome'] != NULL){
 			$this->albuns_model->cadastrar_album($album, $artista, $faixas);

            redirect('albuns/cadastra_album');       
        }else{
            
            redirect('cliente/home');
        }
	}

	public function listar(){
		$this->load->library('pagination');
        $config['base_url'] = base_url('index.php/albuns/listar');
        $config['total_rows'] = $this->albuns_model->buscar_albuns()->num_rows();
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);

        $dados = array(
            'albuns' => $this->albuns_model->buscar_albuns($qtde, $inicio)->result(),
            'paginas' => $this->pagination->create_links()
        );

		$this->load->view('albuns/lista_albuns', $dados);
	}

}