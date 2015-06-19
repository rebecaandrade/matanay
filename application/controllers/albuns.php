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

        if($album['nome'] != NULL && $album['quantidade'] != NULL && $album['upc_ean'] != NULL && $album['ano'] != NULL && $album['idTipo_Album'] != NULL){
 			$this->albuns_model->cadastrar_album($album, $artista, $faixas);
            
            $this->session->set_userdata('mensagem', $this->lang->line('cadastrado_sucesso'));
            redirect('albuns/listar');       
        }else{
            $this->session->set_userdata('mensagem', 'Houve algum problema no cadastro');
            redirect('albuns/cadastra_album');
        }
	}

	public function listar(){
        $dados = array(
            'albuns' => $this->albuns_model->buscar_albuns()->result(),
            'artistas' => $this->albuns_model->buscar_artistas(),
            'entidades' => $this->albuns_model->buscar_entidades(),
            'tipos' => $this->albuns_model->buscar_tipos()
        );

		$this->load->view('albuns/lista_albuns', $dados);
	}

    public function camposatualizacao($id = -1){
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else if ($id == -1)
            redirect('albuns/listar');

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
        
        $dados['album'] = $this->albuns_model->buscar_dados($id);
        $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
        $dados['artistas'] = $this->albuns_model->buscar_artistas();
        $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
        $dados['tipos'] = $this->albuns_model->buscar_tipos();

        $this->load->view('albuns/edita_album', $dados);
    }

    public function faixas_atualizacao($id = -1){
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else if ($id == -1)
            redirect('albuns/listar');

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
        
        $dados['album'] = $this->albuns_model->buscar_dados($id);
        $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
        $dados['artistas'] = $this->albuns_model->buscar_artistas();
        $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
        $dados['tipos'] = $this->albuns_model->buscar_tipos();

        $this->load->view('albuns/edita_faixas', $dados);
    }

    public function atualizar(){
        $dados = array(
            'idAlbum' => $this->input->post('idAlbum'),
            'nome' => $this->input->post('nome'),
            'upc_ean' => $this->input->post('upc_ean'),
            'ano' => $this->input->post('ano'),
            'codigo_catalogo' => $this->input->post('catalogo'),
            'idTipo_Album' => $this->input->post('tipo')
        );

        $artista = array(
            'idAlbum' => $this->input->post('idAlbum'),
            'idEntidade' => $this->input->post('artista')
        );

        if($dados['nome'] != NULL && $dados['ano'] != NULL){
            $this->albuns_model->atualizar_album($dados, $artista);
            $this->session->set_userdata('mensagem', $this->lang->line('atualizado_sucesso'));
            redirect('albuns/listar');       
        }else{
            $id = $this->input->post('idAlbum');
            
            $dados['album'] = $this->albuns_model->buscar_dados($id);
            $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
            $dados['artistas'] = $this->albuns_model->buscar_artistas();
            $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
            $dados['tipos'] = $this->albuns_model->buscar_tipos();

            $this->session->set_userdata('mensagem', 'Houve algum problema na atualização.');
            $this->load->view('albuns/edita_album', $dados);
        }
    }

    public function deletar(){
        $dados = array(
            'idAlbum' => $this->input->get('id'),
            'excluido' => 1
        );

        if($this->albuns_model->deletar($dados)){
            $this->session->set_userdata('mensagem', $this->lang->line('excluido_sucesso'));
            redirect('albuns/listar');
        }else{
            $this->session->set_userdata('mensagem', 'Houve algum problema para deletar.');
            redirect('albuns/listar');
        }
    }

    public function detalhar($id){
        $this->session->set_flashdata('redirect_url', current_url());

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

        $dados['album'] = $this->albuns_model->buscar_dados($id);
        $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
        $dados['artistas'] = $this->albuns_model->buscar_artistas();
        $dados['faixas'] = $this->albuns_model->buscar_faixas();
        $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
        $dados['tipos'] = $this->albuns_model->buscar_tipos();

        $this->load->view('albuns/perfil_album', $dados);
    }

}