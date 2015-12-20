<?php /*FEITO POR MIM JADIEL*/
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notificacao extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Contrato_model');
        $this->load->model('Entidade_model');
        $this->load->model('Favorecido_model');

        $this->form_validation->set_error_delimiters('',''); // remove tags HTML das mensagem de erro de FORM VALIDATION

        if (!($this->session->userdata('linguagem'))) {
            $this->session->set_userdata('linguagem', 'portugues');
        }
        
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

    }

    function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $id_cliente = $this->session->userdata('cliente_id');
        $dados["dadoNotificacao"] = $this->Contrato_model->buscar_datas($id_cliente);
        $dados["dadosFavorecido"] = $this->Favorecido_model->buscar_favorecido($id_cliente);
        $dados["dadosEntidade"] = $this->Entidade_model->buscar_entidades($id_cliente);
        $this->load->view("Notificacao/listar_notificacao_view", $dados);
    }

}