<?php
// Controller: Faixa_Videos
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faixas_Videos extends CI_Controller {

	public function __construct() {
   		parent::__construct();
   		$this->load->model('faixas_videos_model');
        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
	}

	public function cadastra_faixa(){
		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		$dados['artistas'] = $this->faixas_videos_model->buscar_artistas($this->session->userdata('id_cliente'));
		$dados['autores'] = $this->faixas_videos_model->buscar_autores($this->session->userdata('id_cliente'));
		$dados['produtores'] = $this->faixas_videos_model->buscar_produtores($this->session->userdata('id_cliente'));
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos($this->session->userdata('id_cliente'));
		
		$this->load->view('faixas_videos/cadastro_faixa', $dados);
	}

	public function cadastrar_faixa(){
		$faixa = array(
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc')),
            'codigo_video' => $this->input->post('youtube'),
            'idCliente' => $this->session->userdata('id_cliente')
        );

        $artistas = $this->input->post('artistas[]');
        $autores = $this->input->post('autors[]');
        $produtores = $this->input->post('produtors[]');

        $perc_artistas = $this->input->post('percentualArtista[]');
        $perc_autores = $this->input->post('percentualAutor[]');
        $perc_produtores = $this->input->post('percentualProdutor[]');

        $impostos = $this->input->post('impostos_faixa[]');

        if($faixa['nome'] != NULL && $artistas != NULL && $autores != NULL){
            $this->faixas_videos_model->cadastrar_faixa($faixa, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('faixas_videos/listar');       
        }
        else{
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('faixas_videos/cadastra_faixa');
        }

	}

    public function cadastrar_faixa_ajax(){
        $faixa = array(
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc')),
            'codigo_video' => $this->input->post('youtube'),
            'idCliente' => $this->session->userdata('id_cliente')
        );

        $artistas = $this->input->post('artistas');
        $autores = $this->input->post('autors');
        $produtores = $this->input->post('produtors');

        $perc_artistas = $this->input->post('percentualArtista');
        $perc_autores = $this->input->post('percentualAutor');
        $perc_produtores = $this->input->post('percentualProdutor');

        $impostos = $this->input->post('impostos_faixa');

        if($faixa['nome'] != NULL && $artistas != NULL && $autores != NULL){
            $idFaixa = $this->faixas_videos_model->cadastrar_faixa($faixa, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');

            $dados_faixa = $this->faixas_videos_model->buscar_dados($idFaixa);
            die(json_encode($dados_faixa));

        }
        else{
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');

        }

    }

	public function listar(){
        $dados = array(
            'faixas' => $this->faixas_videos_model->buscar_faixas($this->session->userdata('id_cliente')),
            'artistas' => $this->faixas_videos_model->buscar_artistas($this->session->userdata('id_cliente')),
            'entidades' => $this->faixas_videos_model->buscar_entidades($tipo=1)
        );

		$this->load->view('faixas_videos/lista_faixas', $dados);
	}

    public function camposatualizacao($id = -1){
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else if ($id == -1)
            redirect('albuns/listar');

        $dados['faixa'] = $this->faixas_videos_model->buscar_dados($id);
        $dados['artistas'] = $this->faixas_videos_model->buscar_artistas($this->session->userdata('id_cliente'));
        $dados['autores'] = $this->faixas_videos_model->buscar_autores($this->session->userdata('id_cliente'));
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores($this->session->userdata('id_cliente'));
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos($this->session->userdata('id_cliente'));
        $dados['impostos_faixa'] = $this->faixas_videos_model->buscar_impostos_faixa($id);

        $dados['artista_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=1);
        $dados['autor_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=2);
        $dados['produtor_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=3);

        $this->load->view('faixas_videos/edita_faixa', $dados);
    }

    public function atualizar(){
        $dados = array(
            'idFaixa' => $this->input->post('idFaixa'),
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc'))
        );

        $artistas = $this->input->post('artistas[]');
        $autores = $this->input->post('autors[]');
        $produtores = $this->input->post('produtors[]');

        $perc_artistas = $this->input->post('percentArtista[]');
        $perc_autores = $this->input->post('percentAutor[]');
        $perc_produtores = $this->input->post('percentProdutor[]');

        $impostos = $this->input->post('impostos_faixa[]');

        if($dados['nome'] != NULL && $dados['isrc'] != NULL){
            $this->faixas_videos_model->atualizar_faixa($dados, $impostos, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('atualizado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('faixas_videos/listar');       
        }else{
            $id = $this->input->post('idFaixa');
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('problemas_formulario'));
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('faixas_videos/listar');
        }
    }

    public function deletar($id) {
        $this->faixas_videos_model->deletar($id);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('excluido_sucesso'));
        $this->session->set_userdata('tipo_mensagem', 'success');
        redirect('faixas_videos/listar');
    }

    public function detalhar($id){
        $this->session->set_flashdata('redirect_url', current_url());

        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

        $dados['faixa'] = $this->faixas_videos_model->buscar_dados($id);
        $dados['artista_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=1);
        $dados['autor_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=2);
        $dados['produtor_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=3);
        $dados['albuns'] = $this->faixas_videos_model->buscar_album_faixa($id);
        $dados['artistas'] = $this->faixas_videos_model->buscar_artistas($this->session->userdata('id_cliente'));
        $dados['autores'] = $this->faixas_videos_model->buscar_autores($this->session->userdata('id_cliente'));
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores($this->session->userdata('id_cliente'));

        $this->load->view('faixas_videos/perfil_faixa', $dados);
    }

}