<?php
	class Cliente_model extends CI_Model {
		public function funcionalidades(){
			return $this->db->get('funcionalidades')->result();
		}
		public function buscar_cliente($id){
			$this->db->where('idCliente',$id);
			return $this->db->get('cliente')->row();
		}
		public function buscar_perfil($id_cliente,$id_perfil){
			$this->db->where('idCliente',$id_cliente);
			$this->db->where('idUsuario',$id_perfil);
			return $this->db->get('usuario')->row();
		}
		public function cliente_existe($nome){
			$this->db->where('nome',$nome);
			$this->db->where('excluido',NULL);
			if($this->db->get('cliente')->row()){
				
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		public function cadastrar_cliente($nome){
			$cliente = array(
						'nome' => $nome,
				);
			return $this->db->insert('cliente',$cliente);
		}
		public function atualizar_cliente($id,$nome){
			$cliente = array(
						'nome' => $nome,
				);
			$this->db->where('idCliente',$id);
			return $this->db->update('cliente',$cliente);
		}
		public function cadastrar_perfil($nome,$login,$senha,$id_cliente){
			$perfil = array(
					'nome' 		=> $nome,
					'login' 	=> $login,	
					'senha' 	=> $senha,
					'idCliente'	=> $id_cliente
				);
			$this->db->insert('usuario',$perfil);
			return $this->db->insert_id();
		}
		public function cadastrar_funcionalidades($funcs,$id){
			
			foreach ($funcs as $func) {
				$array = array(
						'idFuncionalidades' => $func,
						'idUsuario'			=> $id,
					);
				$this->db->insert('usuario_has_funcionalidades',$array);
			}
			
		}
		public function buscar_login($login){
			$this->db->where('login',$login);
			$this->db->where('excluido',NULL);
			return $this->db->get('usuario')->row();
		}
		public function clientes(){
			return $this->db->get_where('cliente', array('excluido' => NULL))->result();
		}
		public function perfis($id){
			$this->db->where('idCliente',$id);
			$this->db->where('excluido',NULL);
			return $this->db->get('usuario')->result();
		}
		public function excluir_cliente($id_cliente){
			$this->db->trans_start();
			$array = array(
					'excluido' => 1
				);
			$this->db->where('idCliente',$id_cliente);
			$this->db->update('perfis',$array);

			$this->db->where('idCliente',$id_cliente);
			$this->db->update('cliente',$array);
			
			$this->db->trans_complete();
		}
		public function excluir_perfil($id){
			$this->db->where('idPerfis',$id);
			$array = array(
					'excluido' => 1
				);
			return $this->db->update('perfis',$array);
		}
	}