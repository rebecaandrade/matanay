<?php

class Cliente_model extends CI_Model
{
    public function funcionalidades()
    {
        return $this->db->get('funcionalidades')->result();
    }

    public function buscarEmail($login)
    {
        $this->db->where('login', $login);
        return $this->db->get('Usuario')->row();
    }

    public function buscar_cliente($id)
    {
        $this->db->where('idCliente', $id);
        return $this->db->get('Cliente')->row();
    }

    public function buscar_perfil($id_cliente, $id_perfil)
    {
        $this->db->where('idCliente', $id_cliente);
        $this->db->where('idUsuario', $id_perfil);
        return $this->db->get('Usuario')->row();
    }

    public function cliente_existe($nome)
    {
        $this->db->where('nome', $nome);
        $this->db->where('excluido', NULL);
        if ($this->db->get('Cliente')->row()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function cadastrar_cliente($nome)
    {
        $cliente = array(
            'nome' => $nome,
        );
        return $this->db->insert('Cliente', $cliente);
    }

    public function atualizar_cliente($id, $nome)
    {
        $cliente = array(
            'nome' => $nome,
        );
        $this->db->where('idCliente', $id);
        return $this->db->update('Cliente', $cliente);
    }

    public function cadastrar_perfil($perfil)
    {
        $this->db->insert('Usuario', $perfil);
        return $this->db->insert_id();
    }

    public function atualizar_peril($perfil, $createfunc, $deletefunc)
    {
        //die(var_dump($perfil, $createfunc, $deletefunc));
        foreach($deletefunc as $oldfunc){
            $this->db->where(array('idUsuario'=>$perfil['idUsuario'],'idFuncionalidades'=>$oldfunc));
            $this->db->delete('Usuario_has_Funcionalidades');
        }
        foreach ($createfunc as $newfunc) {
            $this->db->insert('Usuario_has_Funcionalidades', array('idUsuario' => $perfil['idUsuario'], 'idFuncionalidades' => $newfunc));
        }
        $this->db->where('idUsuario',$perfil['idUsuario']);
        return $this->db->update('Usuario',$perfil);

    }

    public function cadastrar_funcionalidades($funcs, $id)
    {
        foreach ($funcs as $func) {
            $array = array(
                'idFuncionalidades' => $func,
                'idUsuario' => $id,
            );
            $this->db->insert('Usuario_has_Funcionalidades', $array);
        }
    }

    public function minhas_funcionalidades($id_perfil)
    {
        $this->db->select('func.*')->from('usuario user');
        $this->db->join('Usuario_has_Funcionalidades uhf', 'uhf.idUsuario = user.idUsuario');
        $this->db->join('Funcionalidades func', 'func.idFuncionalidades = uhf.idFuncionalidades');
        $this->db->where('user.idUsuario', $id_perfil);
        $dados = $this->db->get()->result();
        //die(var_dump($dados));
        return $dados;
    }

    public function func_ids()
    {
        $this->db->select('func.idFuncionalidades')->from('Funcionalidades func');
        $dados = $this->db->get()->result();
        foreach ($dados as $key => $dado) {
            $dados[$key] = $dado->idFuncionalidades;
        }
        die(var_dump($dados));
        return $dados;
    }

    public function buscar_login($login)
    {
        $this->db->where('login', $login);
        $this->db->where('excluido', NULL);
        return $this->db->get('Usuario')->result();
    }

    public function buscar_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('Usuario')->row();
    }


    public function clientes()
    {
        return $this->db->get_where('Cliente', array('excluido' => NULL))->result();
    }

    public function clientesNome()
    {
        $this->db->select('nome');
        return $this->db->get_where('Cliente', array('excluido' => NULL, 'nome !=' => 'admin'))->result();
    }

    public function perfis($id)
    {
        $this->db->where('idCliente', $id);
        $this->db->where('excluido', NULL);
        return $this->db->get('Usuario')->result();
    }

    public function excluir_cliente($id_cliente)
    {
        $this->db->trans_start();
        $array = array(
            'excluido' => 1
        );
        $this->db->where('idCliente', $id_cliente);
        $this->db->update('usuario', $array);

        $this->db->where('idCliente', $id_cliente);
        $this->db->update('Cliente', $array);

        $this->db->trans_complete();
    }

    public function excluir_perfil($id)
    {
        $this->db->where('idUsuario', $id);
        $array = array(
            'excluido' => 1
        );
        return $this->db->update('Usuario', $array);
    }
}