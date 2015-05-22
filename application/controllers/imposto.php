<?php  /*FEITO POR MIM JADIEL*/
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imposto extends CI_Controller{
    
    function __construct() {
        parent:: __construct();
        $this->load->model('Imposto_model');

    }

    function index(){
        $this->mostrar_cadastro();
    }

     public function listar(){
        $dados["dadoimposto"]=$this->Imposto_model->buscar_imposto();
        $this->load->view("Imposto/listar_impostos_view",$dados);
    }          
    
    function mostrar_cadastro(){
        $this->load->view('imposto/imposto_view');
    }

    function cadastrar(){
        if(($this->input->post('nome')!=NULL)&&($this->input->post('valor')!=NULL)){
            $dados= array(
                'nome'=>$this->input->post('nome'),
                'valor'=>$this->input->post('valor')
            );
            $this->Imposto_model->cadastrar_imposto($dados);
            $this->session->set_flashdata('sucesso', 'cadastro_realizado');
            redirect('Imposto/mostrar_cadastro');
        }
        else{
            $this->session->set_flashdata('aviso','campo_vazio');
            redirect('Imposto/mostrar_cadastro');

        }
    }

    function deletar(){
        $id=$this->input->get('id');
        $this->Imposto_model->deletar($id);
        $this->listar();
    }
}