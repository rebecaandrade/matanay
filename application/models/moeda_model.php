<?php
	class Moeda_model extends CI_Model {
		public function cadastrar($nome,$sigla,$cambio){
			if(is_string($cambio)){
				$cambio = str_replace (',','.',$cambio); //substitui virgulas por pontos para fazer o type casting
				$cambio = (float) $cambio; // type casting de string para número
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
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		public function buscar_moedas(){
			return $this->db->get('moeda')->result();
			
		}
	}