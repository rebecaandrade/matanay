<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function buscar_modelos($id_cliente = 0) {
        $this->db->select('mod.loja,mod.subloja,mod.territorio')->from('Modelo mod');
        $this->db->where('mod.idCliente', $id_cliente);
        $dados = $this->db->get()->result();
        // die(var_dump($dados));
        return $dados;
    }

    public function busca_artistas($id_cliente = 0) {
        $this->db->select('ent.*,ehte.*,te.*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade ehte', ' ehte.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', ' te.idTipo_Entidade = ehte.idTipo_Entidade');
        $this->db->where('ent.excluido', NULL);
        $this->db->where('ent.idCliente', $id_cliente);
        $this->db->where('ehte.idTipo_Entidade', 1);
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function busca_produtores($id_cliente) {
        $this->db->select('ent.*,ehte.*,te.*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade ehte', ' ehte.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', ' te.idTipo_Entidade = ehte.idTipo_Entidade');
        $this->db->where('ent.excluido', NULL);
        $this->db->where('ent.idCliente', $id_cliente);
        $this->db->where('ehte.idTipo_Entidade', 3);
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function busca_autores($id_cliente) {
        $this->db->select('ent.*,ehte.*,te.*')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade ehte', ' ehte.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', ' te.idTipo_Entidade = ehte.idTipo_Entidade');
        $this->db->where('ent.excluido', NULL);
        $this->db->where('ent.idCliente', $id_cliente);
        $this->db->where('ehte.idTipo_Entidade', 2);
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function busca_faixas($id_cliente = 0) {
        $this->db->select('fai.*')->from('Faixa_Video fai');
        $this->db->where('fai.idCliente', $id_cliente);
        $dados = $this->db->get()->result();
        //die(var_dump($dados));
        return $dados;
    }

    public function busca_albuns($id_cliente = 0) {
        $this->db->select('alb.*')->from('Album alb');
        $this->db->where('alb.idCliente', $id_cliente);
        $dados = $this->db->get()->result();
        //die(var_dump($dados));
        return $dados;
    }

    public function modelos($id_cliente = 0) {
        $this->db->where(array('idCliente' => $id_cliente, 'excluido' => NULL));
        $dados = $this->db->get('Modelo')->result();
        //die(var_dump($dados));
        return $dados;
    }

    public function deletar($id){
        $this->db->where('idRelatorio', $id);
        $dados['excluido'] = 1;
        $this->db->update('Relatorio', $dados);
    }

    public function cadastrar_relatorio_importado($relatorio) {
        $this->db->insert('Relatorio', $relatorio);
        return $this->db->insert_id();
    }

    public function busca_relatorios($id_cliente = 0) {
        $this->db->select('rel.*,mod.*')->from('Relatorio rel');
        $this->db->join('Modelo mod', 'mod.idModelo = rel.idModelo');
        $this->db->where('rel.idCliente', $id_cliente);
        $this->db->where('rel.excluido', NULL);
        $this->db->where('mod.excluido', NULL);
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function busca_relatorio($id) {
        $this->db->select('rel.*,mod.*')->from('Relatorio rel');
        $this->db->join('Modelo mod', 'mod.idModelo = rel.idModelo');
        $this->db->join('Tipo_Modelo tmod', 'mod.idTipo_Modelo = tmod.idTipo_Modelo');
        $this->db->where('rel.idRelatorio', $idRelatorio);
        $this->db->where('rel.excluido', NULL);
        $this->db->where('mod.excluido', NULL);
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function getMatanayRelatorio(){
        $this->db->select('rel.*,mod.*')->from('Relatorio rel');
        $this->db->join('Modelo mod','mod.idModelo = rel.idModelo');
        $this->db->where('mod.idModelo',9);
        $dados = $this->db->get()->result();
        return $dados;
    }
}
