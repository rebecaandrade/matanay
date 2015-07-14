<?php /*FEITO POR MIM JADIEL*/
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Imposto extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Imposto_model');

        $this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION

        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

    }

    function index()
    {
        $this->mostrar_cadastro();
    }

    public function listar()
    {
        $dados["dadoimposto"] = $this->Imposto_model->buscar_imposto();
        $this->load->view("Imposto/listar_impostos_view", $dados);
    }

    function mostrar_cadastro()
    {
        $this->load->view('imposto/imposto_view');
    }

    function cadastrar()
    {
        $this->form_validation->set_message('required', $this->lang->line('form_error_required') );
        $this->form_validation->set_message('max_length', $this->lang->line('form_error_max_length'));
        $this->form_validation->set_message('decimal_num', $this->lang->line('form_error_decimal_num'));

        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[45]');
        $this->form_validation->set_rules('valor', $this->lang->line('valor'), 'required');

        if ($this->form_validation->run()) {
            $dados = array(
                'nome' => $this->input->post('nome'),
                'valor' => $this->input->post('valor'),
                'idTipo_Imposto' => $this->input->post('tipoImposto')
            );
            $this->Imposto_model->cadastrar_imposto($dados);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('subtitulo_mensagem', $this->lang->line('cadastrado_sucesso'));
            $this->session->set_userdata('tipo_mensagem', 'success');
            redirect('Imposto/listar');
        } else {
            $mensagem = array(
                'mensagem'              => $this->lang->line('campos_invalidos'),
                'subtitulo_mensagem'    => validation_errors() ,
                'tipo_mensagem'         => 'error'
            );
            $this->session->set_userdata($mensagem);
            redirect('Imposto/mostrar_cadastro');
        }
    }

    function deletar()
    {
        $id = $this->input->get('id');
        $this->Imposto_model->deletar($id);
        $this->listar();
    }
}