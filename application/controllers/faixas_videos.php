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
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos();
		
		$this->load->view('faixas_videos/cadastro_faixa', $dados);
	}

	public function cadastrar_faixa(){
		$faixa = array(
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc')),
            'codigo_video' => $this->input->post('youtube'),
            'idImposto' => $this->input->post('imposto')
        );

        $artistas = $this->input->post('artistas[]');
        $autores = $this->input->post('autors[]');
        $produtores = $this->input->post('produtors[]');

        $perc_artistas = $this->input->post('percentualArtista[]');
        $perc_autores = $this->input->post('percentualAutor[]');
        $perc_produtores = $this->input->post('percentualProdutor[]');

        if($artistas == NULL){
            $this->session->set_userdata('mensagem', 'Por favor, escolha pelo menos um artista');
            redirect('faixas_videos/cadastra_faixa');
        }
        elseif($autores == NULL){
            $this->session->set_userdata('mensagem', 'Por favor, escolha pelo menos um autor');
            redirect('faixas_videos/cadastra_faixa');
        }
        elseif($faixa['nome'] != NULL && $artistas != NULL && $autores != NULL){
            $this->faixas_videos_model->cadastrar_faixa($faixa, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', 'Faixa cadastrada com sucesso!');
            $this->session->set_userdata('subtitulo_mensagem', '');
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('faixas_videos/listar');       
        }
        else{
            $this->session->set_userdata('mensagem', 'Problemas no cadastro.');
            $this->session->set_userdata('subtitulo_mensagem', '');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('faixas_videos/cadastra_faixa');
        }

	}

    public function cadastrar_modal(){
        $faixa = array(
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc')),
            'codigo_video' => $this->input->post('youtube'),
            'idImposto' => $this->input->post('imposto')
        );

        $artistas = $this->input->post('artistas[]');
        $autores = $this->input->post('autors[]');
        $produtores = $this->input->post('produtors[]');

        $perc_artistas = $this->input->post('percentualArtista[]');
        $perc_autores = $this->input->post('percentualAutor[]');
        $perc_produtores = $this->input->post('percentualProdutor[]');

        if($faixa['nome'] != NULL && $artistas != NULL && $autores != NULL){
            $this->faixas_videos_model->cadastrar_faixa($faixa, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', $this->lang->line('cadastrado_sucesso'));
            return TRUE;       
        }
        else{
            $this->session->set_userdata('mensagem', 'Houve algum problema no cadastro.');
            return FALSE;
        }

    }

	public function listar(){
        $dados = array(
            'faixas' => $this->faixas_videos_model->buscar_faixas()->result(),
            'artistas' => $this->faixas_videos_model->buscar_artistas(),
            'entidades' => $this->faixas_videos_model->buscar_entidades()
        );

		$this->load->view('faixas_videos/lista_faixas', $dados);
	}

    public function camposatualizacao($id = -1){
        if ($this->input->post('oneInput') != null) {
            $id = $this->input->post('oneInput');
        } else if ($id == -1)
            redirect('albuns/listar');

        $dados['faixa'] = $this->faixas_videos_model->buscar_dados($id);
        $dados['artistas'] = $this->faixas_videos_model->buscar_artistas();
        $dados['autores'] = $this->faixas_videos_model->buscar_autores();
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores();
        $dados['impostos'] = $this->faixas_videos_model->buscar_impostos();

        $dados['artista_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=1);
        $dados['autor_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=2);
        $dados['produtor_faixa'] = $this->faixas_videos_model->buscar_entidade_faixa($id, $tipo=3);

        $this->load->view('faixas_videos/edita_faixa', $dados);
    }

    public function atualizar(){
        $dados = array(
            'idFaixa' => $this->input->post('idFaixa'),
            'nome' => $this->input->post('nome'),
            'isrc' => str_replace("-", "", $this->input->post('isrc')),
            'idImposto' => $this->input->post('imposto')
        );

        $artistas = $this->input->post('artistas[]');
        $autores = $this->input->post('autors[]');
        $produtores = $this->input->post('produtors[]');

        $perc_artistas = $this->input->post('percentualArtista[]');
        $perc_autores = $this->input->post('percentualAutor[]');
        $perc_produtores = $this->input->post('percentualProdutor[]');

        if($dados['nome'] != NULL && $dados['isrc'] != NULL){
            $this->faixas_videos_model->atualizar_faixa($dados, $artistas, $autores, $produtores, $perc_artistas, $perc_autores, $perc_produtores);
            $this->session->set_userdata('mensagem', 'Faixa atualizada com sucesso!');
            $this->session->set_userdata('subtitulo_mensagem', '');
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('faixas_videos/listar');       
        }else{
            $id = $this->input->post('idFaixa');
            $this->session->set_userdata('mensagem', 'Problemas na atualização');
            $this->session->set_userdata('subtitulo_mensagem', '');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('faixas_videos/listar');
        }
    }

    public function deletar(){
        $dados = array(
            'idFaixa' => $this->input->get('id'),
            'excluido' => 1
        );

        if($this->faixas_videos_model->deletar($dados)){
            $this->session->set_userdata('mensagem', 'Faixa excluida com succeso!');
            $this->session->set_userdata('subtitulo_mensagem', '');
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('faixas_videos/listar');
        }else{
            $this->session->set_userdata('mensagem', 'Problemas para excluir.');
            $this->session->set_userdata('subtitulo_mensagem', '');
            $this->session->set_userdata('tipo_mensagem', 'error');
            redirect('faixas_videos/listar');
        }
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
        $dados['artistas'] = $this->faixas_videos_model->buscar_artistas();
        $dados['autores'] = $this->faixas_videos_model->buscar_autores();
        $dados['produtores'] = $this->faixas_videos_model->buscar_produtores();

        $this->load->view('faixas_videos/perfil_faixa', $dados);
    }

}