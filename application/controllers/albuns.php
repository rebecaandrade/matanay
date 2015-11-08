<?php 
// controller: Albuns
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albuns extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('albuns_model');
        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
	}

	public function cadastra_album() {
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$dados['tipos'] = $this->albuns_model->buscar_tipos();
		$dados['faixas'] = $this->albuns_model->buscar_faixas($this->session->userdata('id_cliente'));
		$dados['artistas'] = $this->albuns_model->buscar_artistas($this->session->userdata('id_cliente'));

        $this->load->model('faixas_videos_model');
        $dados['autores'] = $this->faixas_videos_model->buscar_autores($this->session->userdata('id_cliente'));
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores($this->session->userdata('id_cliente'));
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos($this->session->userdata('id_cliente'));
		
		$this->load->view('albuns/cadastro_album', $dados);
	}

	public function cadastrar() {
		$album = array(
            'nome' => $this->input->post('nome'),
            'quantidade' => $this->input->post('n_faixas'),
            'upc_ean' => $this->input->post('upc_ean'),
            'ano' => $this->input->post('ano'),
            'faixa' => 100/$this->input->post('n_faixas'),
            'codigo_catalogo' => $this->input->post('catalogo'),
            'idTipo_Album' => $this->input->post('tipo'),
            'idCliente' => $this->session->userdata('id_cliente')
        );

        $artista = $this->input->post('artista');

		$faixas = $this->input->post('faixas[]');

        $impostos = $this->input->post('impostos[]');

        if($album['nome'] != NULL && $album['quantidade'] != NULL && $album['upc_ean'] != NULL && $album['ano'] != NULL){
 			$this->albuns_model->cadastrar_album($album, $artista, $faixas, $impostos);
            
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('albuns/listar');       
        }else{
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('albuns/cadastra_album');
        }
	}

	public function listar() {
        $dados = array(
            'albuns' => $this->albuns_model->buscar_albuns($this->session->userdata('id_cliente')),
            'artistas' => $this->albuns_model->buscar_artistas($this->session->userdata('id_cliente')),
            'entidades' => $this->albuns_model->buscar_entidades(),
            'tipos' => $this->albuns_model->buscar_tipos()
        );

		$this->load->view('albuns/lista_albuns', $dados);
	}

    public function camposatualizacao($id = -1) {
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else if ($id == -1)
            redirect('albuns/listar');

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
        
        $dados['album'] = $this->albuns_model->buscar_dados($id);
        $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
        $dados['artistas'] = $this->albuns_model->buscar_artistas($this->session->userdata('id_cliente'));
        $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
        $dados['tipos'] = $this->albuns_model->buscar_tipos();
        $dados['impostos'] = $this->albuns_model->buscar_impostos($this->session->userdata('id_cliente'));
        $dados['impostos_album'] = $this->albuns_model->buscar_impostos_album($id);

        $this->load->view('albuns/edita_album', $dados);
    }

    public function faixas_atualizacao($id) {
        $this->session->set_flashdata('redirect_url', current_url());

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

        $dados['album'] = $this->albuns_model->buscar_dados($id);
        $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
        $dados['artistas'] = $this->albuns_model->buscar_artistas($this->session->userdata('id_cliente'));
        $dados['faixas'] = $this->albuns_model->buscar_faixas($this->session->userdata('id_cliente'));
        $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);

        $this->load->view('albuns/edita_faixas', $dados);
    }

    public function atualizar_faixas() {
        $faixas = $this->input->post('faixas[]');

        $n_faixas = sizeof($faixas);

        $album = array(
            'idAlbum' => $this->input->post('idAlbum'),
            'quantidade' => $n_faixas,
            'faixa' => 100/$n_faixas
        );

        if($this->albuns_model->atualizar_faixas($album, $faixas)){
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('albuns/listar');       
        }else{
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('albuns/faixas_atualizacao', $album); 
        }
    }

    public function atualizar() {
        $dados = array(
            'idAlbum' => $this->input->post('idAlbum'),
            'nome' => $this->input->post('nome'),
            'upc_ean' => $this->input->post('upc_ean'),
            'ano' => $this->input->post('ano'),
            'codigo_catalogo' => $this->input->post('catalogo'),
            'idTipo_Album' => $this->input->post('tipo')
        );

        $prev_artista = $this->input->post('artista_album');

        $novo_artista = array(
            'idAlbum' => $this->input->post('idAlbum'),
            'idEntidade' => $this->input->post('artista')
        );

        $impostos = $this->input->post('impostos[]');

        if($dados['nome'] != NULL && $dados['ano'] != NULL){
            $this->albuns_model->atualizar_album($dados, $impostos, $novo_artista, $prev_artista);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('albuns/listar');       
        }else{
            $id = $this->input->post('idAlbum');
            
            $dados['album'] = $this->albuns_model->buscar_dados($id);
            $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
            $dados['artistas'] = $this->albuns_model->buscar_artistas();
            $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
            $dados['tipos'] = $this->albuns_model->buscar_tipos();

            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            $this->load->view('albuns/edita_album', $dados);
        }
    }

    public function deletar($id) {
        $this->albuns_model->deletar($id);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('excluido_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('albuns/listar');
    }

    public function detalhar($id) {
        $this->session->set_flashdata('redirect_url', current_url());

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

        $dados['album'] = $this->albuns_model->buscar_dados($id);
        $dados['artista_album'] = $this->albuns_model->buscar_artista_album($id);
        $dados['artistas'] = $this->albuns_model->buscar_artistas();
        $dados['faixas'] = $this->albuns_model->buscar_faixas($this->session->userdata('id_cliente'));
        $dados['tracklist'] = $this->albuns_model->buscar_tracklist($id);
        $dados['tipos'] = $this->albuns_model->buscar_tipos();

        $this->load->view('albuns/perfil_album', $dados);
    }

}