<?php
class Relatorio extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('relatorio_model');
    }
    public function opcoes_relatorio(){
        $this->session->set_flashdata('redirect_url', current_url());
        $linguagem_usuario = $this->session->userdata('linguagem');
        $this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);
        $this->load->view('relatorio/opcoes_relatorio_view');
        return;
    }
    public function gera_relatorio(){
        die(var_dump($this->input->post()));
    }
}