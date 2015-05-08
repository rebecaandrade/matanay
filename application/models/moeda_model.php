<?php
	class Moeda_model extends CI_Model {
		public function cadastrar($nome,$sigla,$cambio){

			if(is_string($cambio)){
				$cambio = str_replace (',','.',$cambio); //substitui virgulas por pontos para fazer o type casting
				if((string)(float)$cambio == $cambio){ //verifica se é um numero
					$cambio = (float) $cambio; // type casting de string para número
				}
				else{
					$this->session->set_userdata('mensagem','Insira um número valido para taxa de cambio.');
					return FALSE;
				}
			}
			$nome = strtolower($nome);
			$this->db->where('nome',$nome);
			$moeda = $this->db->get('moeda')->row();
			if(!$moeda){
				// Array a ser inserido no banco
				$moeda = array( 
						'nome'		=> $nome,
						'sigla'		=> $sigla,
						'taxa_cambio'	=> $cambio
					);
				$this->db->insert('moeda',$moeda);
				$this->session->set_userdata('mensagem','Moeda cadastrada com sucesso.');
				return TRUE;
			}
			else{
				$this->session->set_userdata('mensagem','Moeda já cadastrada.');
				return FALSE;
			}
		}
		public function buscar_moedas(){
			return $this->db->get('moeda')->result();
			
		}
		public function buscar_moeda($id){
			$this->db->where('idMoeda',$id);
			return $this->db->get('moeda')->row();
			
		}
		public function deletar_moeda($id){
			$this->db->where('idMoeda',$id);
			return $this->db->delete('moeda');
		}
		public function editar_moeda($id,$nome,$sigla,$cambio){
			$cambio = str_replace (',','.',$cambio); //substitui virgulas por pontos para fazer o type casting
			if((string)(float)$cambio == $cambio && (string)(int)$id == $id ){ // verifica se o cambio e o id são numeros validos
				// array de atualização
				$moeda = array( 
						'nome'		=> $nome,
						'sigla'		=> $sigla,
						'taxa_cambio'	=> $cambio
					);
				$this->db->where('idMoeda',$id);
				$this->db->update('moeda',$moeda);
				return TRUE;
			}
			else{
				//invalidos
				return FALSE;
			}
		}
	}