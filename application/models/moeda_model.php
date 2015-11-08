<?php
	class Moeda_model extends CI_Model {
		public function cadastrar($nome,$sigla,$cambio,$id_cliente){
			$this->db->where('nome',$nome);
			$moeda = $this->db->get('Moeda')->row();
			if(!$moeda){
				// Array a ser inserido no banco
				$moeda = array( 
						'nome'			=> $nome,
						'sigla'			=> $sigla,
						'taxa_cambio'	=> $cambio,
						'idCliente'		=> $id_cliente
					);
				$this->db->insert('moeda',$moeda);
				return TRUE;
			}
			else{
				$this->session->set_userdata('mensagem','Moeda já cadastrada.');
				return FALSE;
			}
		}
		public function buscar_moedas($id_cliente){
			$this->db->where('idCliente',$id_cliente);
			$this->db->where('excluido',NULL);
			return $this->db->get('Moeda')->result();
			
		}
		public function buscar_moeda($id){
			$this->db->where('idMoeda',$id);
			return $this->db->get('Moeda')->row();
			
		}
		public function deletar_moeda($id){
			$array = array(
					'excluido' => 1
				);
			$this->db->where('idMoeda',$id);
			return $this->db->update('Moeda',$array);
		}
		public function editar_moeda($nome,$sigla,$cambio,$id_cliente,$id){
			$moeda = array( 
					'nome'			=> $nome,
					'sigla'			=> $sigla,
					'idCliente'		=> $id_cliente,
					'taxa_cambio'	=> $cambio
					);
			$this->db->where('idMoeda',$id);
			return $this->db->update('Moeda',$moeda);
		}
	}