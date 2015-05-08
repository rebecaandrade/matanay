<?php
	class Cliente_model extends CI_Model {
		public function funcionalidades(){
			return $this->db->get('funcionalidades')->result();
		}
		public function cadastrar_cliente($id){
			$cliente = array(
						'idPerfis' => $id,
				);
			return $this->db->insert('cliente',$cliente);
		}

		public function cadastrar_perfil($nome,$login,$senha){
			$perfil = array(
					'nome' => $nome,
					'login' => $login,	
					'senha' => $senha,
				);
			$this->db->insert('perfis',$perfil);
			return $this->db->insert_id();
		}
		public function cadastrar_funcionalidades($funcs,$id){
			$this->db->trans_start();
			foreach ($funcs as $func) {
				$array = array(
						'idFuncionalidades' => $func,
						'idPerfis'			=> $id,
					);
				$this->db->insert('funcionalidades_has_perfis',$array);
			}
			return $this->db->trans_complete();
			
		}
		public function login_existe($login){
			$this->db->where('login',$login);
			$perfil = $this->db->get('perfis')->row();
			if(!is_null($perfil)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		public function perfis(){
			return $this->db->get('perfis')->result();
		}

	}