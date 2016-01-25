<?php

class Entidade_model extends CI_Model
{

    public function cadastrar_entidade($entidade)
    {
        $this->db->insert('Entidade', $entidade);
        return $this->db->insert_id();
    }

    public function cadastrar_telefone($telefone)
    {
        $this->db->insert('Telefone_Entidade', $telefone);
        return $this->db->insert_id();
    }

    public function cadastra_ent_has_tipo_ent($ent_has_tipo_ent)
    {
        foreach ($ent_has_tipo_ent as $ent) {
            $this->db->insert('Entidade_has_Tipo_Entidade', $ent);
        }
    }

    public function cadastra_ent_has_tipo_ent_unica($ent_has_tipo_ent)
    {
        $this->db->insert('Entidade_has_Tipo_Entidade', $ent_has_tipo_ent);
    }

    public function buscar_entidades($idCliente = 0)
    {
        //$this->db->select('idFavorecido,nome AS Fnome')->from('Favorecido fav');
        //if ($qtde > 0) $this->db->limit($qtde, $inicio);
        $this->db->select('ent.*,eht.*,te.*,fav.nome AS Fnome')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', 'te.idTipo_Entidade = eht.idTipo_Entidade');
        $this->db->join('Favorecido fav', 'fav.idFavorecido = ent.idFavorecido');
        $this->db->where(array('ent.excluido' => NULL));
        $this->db->where(array('ent.idCliente' => $idCliente));
        $dados = $this->db->get()->result();
        /*foreach ($dados as $key => $dado) {
            $dados[$key]->Fnome = $this->db->where('idFavorecido', $dado->idFavorecido)->get('Favorecido')->row()->nome;
        }*/
        //die(var_dump($dados));
        return $dados;
    }

    public function buscar_entidade($id)
    {
        $this->db->select('ent.*,eht.*,te.*,fav.nome AS Fnome')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', 'te.idTipo_Entidade = eht.idTipo_Entidade');
        $this->db->join('Favorecido fav', 'fav.idFavorecido = ent.idFavorecido');
        $this->db->where(array('ent.excluido' => NULL));
        $this->db->where(array('ent.idEntidade' => $id));
        $dados = $this->db->get()->row();
        return $dados;
    }

    public function buscar_artistas(){
        $this->db->select('ent.*,eht.*,te.*,fav.nome AS Fnome')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', 'te.idTipo_Entidade = eht.idTipo_Entidade');
        $this->db->join('Favorecido fav', 'fav.idFavorecido = ent.idFavorecido');
        $this->db->where(array('ent.excluido' => NULL));
        $this->db->where(array('eht.idTipo_Entidade' => 1));
        $dados = $this->db->get()->result();
        return $dados;
    }

    public function buscar_produtores(){
        $this->db->select('ent.*,eht.*,te.*,fav.nome AS Fnome')->from('Entidade ent');
        $this->db->join('Entidade_has_Tipo_Entidade eht', 'eht.idEntidade = ent.idEntidade');
        $this->db->join('Tipo_Entidade te', 'te.idTipo_Entidade = eht.idTipo_Entidade');
        $this->db->join('Favorecido fav', 'fav.idFavorecido = ent.idFavorecido');
        $this->db->where(array('ent.excluido' => NULL));
        $this->db->where(array('eht.idTipo_Entidade' => 3));
        $dados = $this->db->get()->result();
        return $dados;
    }

    function buscar_entidade_especifica($id)
    {
        $this->db->where("idCliente", $this->session->userdata('cliente_id'));
        $this->db->where('idEntidade', $id);
        return $this->db->get('Entidade')->result()[0];
    }

    function buscar_entidade_has_tipo_especifico($id)
    {
        $this->db->where('idEntidade', $id);
        return $this->db->get('Entidade_has_Tipo_Entidade')->row();
    }

    function buscar_telefone_especifico($id, $idtelefone)
    {
        $this->db->where('idEntidade', $id);
        return $this->db->get('Telefone_Entidade')->result()[$idtelefone];
    }

    function buscar_contar_telefones($id, $idtelefone)
    {
        $this->db->where('idEntidade', $id);
        return $this->db->count_all_results('telefone');
    }

    function buscar_identificacao_especifica($id)
    {
        $this->db->where('idEntidade', $id);
        $dados=$this->db->get('Entidade_has_Tipo_Entidade')->result();
        $this->db->where('idTipo_Entidade', $dados[0]->idTipo_Entidade);
        return $this->db->get('Tipo_Entidade')->row();
    }

    public function atualizar_entidade($entidade)
    {
        $this->db->where('idEntidade', $entidade['idEntidade']);
        return $this->db->update('Entidade', $entidade);
    }
    
    public function atualizar_entidade_has_tipo($tipoentidade, $idTipo_EntidadeAntigo)
    {
        $this->db->where('idEntidade', $tipoentidade['idEntidade']);
        $this->db->where('idTipo_Entidade', $idTipo_EntidadeAntigo);
        return $this->db->update('Entidade_has_Tipo_Entidade', $tipoentidade);
    }

    public function atualizar_telefone($telefone)
    {
        $this->db->where('idTelefone', $telefone['idTelefone']);
        return $this->db->update('Telefone_Entidade', $telefone);
    }

    public function procurar_entidade($dado)
    {
        $this->db->like("nome", $dado);
        $this->db->or_where("cpf", $dado);
        $this->db->or_where("cnpj", $dado);
        $this->db->or_like("contato", $dado);
        $this->db->or_where("idTipo_Entidade", $dado);
        $this->db->or_where("email", $dado);
        $this->db->where('excluido', NULL);
        $query = $this->db->get("Entidade");

        return $query->result();
    }

    public function mudar_entidade_pra_excluidos($id)
    {
        $this->db->where('idEntidade', $id);
        $dados['excluido'] = 1;
        $this->db->update('Entidade', $dados);
    }

    public function buscar_tipo_entidade($id)
    {
        return $this->db->where('idTipo_Entidade', $id)->get('Tipo_Entidade')->row()->descricao;
    }

    public function buscar_entidade_has_faixa(){
        return $this->db->get('Entidade_has_Faixa_Video')->result();
    }

    public function buscar_entidade_has_faixa_id($faixaId){
        $this->db->where('idFaixa', $faixaId);
        return $this->db->get('Entidade_has_Faixa_Video')->result();
    }

    public function existe_entidade_cpf($cpf_cnpj, $id){
        if($cpf_cnpj != NULL){
            $this->db->where('excluido =', NULL);
            $this->db->where("cpf", $cpf_cnpj);
            $this->db->or_where("cnpj", $cpf_cnpj);
            $this->db->where("idCliente", $this->session->userdata('id_cliente'));


            $dados = $this->db->get("Entidade")->result();

            $this->db->where("idCliente", $this->session->userdata('id_cliente'));
            $this->db->where('excluido =', NULL);
            $this->db->where('idEntidade', $id);
            $dadosEntidadeAntiga =  $this->db->get('Entidade')->result()[0];

            if ( $dados == NULL || $dadosEntidadeAntiga->cpf == $cpf_cnpj || $dadosEntidadeAntiga->cnpj == $cpf_cnpj)
                return 0;
            else
                return 1;

        } else{
            return NULL;
        }
    }

}
