<?php

class Acesso_model extends CI_Model {

	public function procurar_usuario($user, $senha){
		$this->db->where('login', $user);
		$this->db->where('senha', $senha);
        $this->db->join('Cliente', ' Cliente.idCliente = Usuario.idCliente');
		return $this->db->get('Usuario')->row();
	}

	public function procurar_usuarioSemSenha($user){
		$this->db->where('login', $user);
		return $this->db->get('Usuario')->row();
	}

	public function pegarDadosPorEmail($email){
		$this->db->where('email', $email);
		return $this->db->get('Usuario')->row();
	}

	public function atualizar_senha($id, $usuario)
    {
        $this->db->where('idUsuario', $id);
        return $this->db->update('Usuario', $usuario);
    }
}