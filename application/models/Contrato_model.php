<?php
	class contrato_model extends CI_Model {
		public function cadastrar($nome,$data_inicio,$data_fim,$alerta,$idEntidade, $idFavorecido, $idCliente){
			$contrato = array( 
						'nome'			=> $nome,
						'data_inicio'	=> $data_inicio,
						'data_fim'		=> $data_fim,
						'alerta'		=> $alerta,
						'idEntidade'	=> $idEntidade,
						'idFavorecido'	=> $idFavorecido,
						'idCliente'		=> $idCliente,
			);
			return	$this->db->insert('Contrato',$contrato);
		}

		public function atualizar( $idContrato, $nome,$data_inicio,$data_fim,$alerta,$idEntidade, $idFavorecido, $idCliente){
			$contrato = array( 
						'nome'			=> $nome,
						'data_inicio'	=> $data_inicio,
						'data_fim'		=> $data_fim,
						'alerta'		=> $alerta,
						'idEntidade'	=> $idEntidade,
						'idFavorecido'	=> $idFavorecido,
						'idCliente'		=> $idCliente,
			);
			$this->db->where('idContrato', $idContrato);
			return	$this->db->update('Contrato', $contrato);
		}
		
		public function buscar_entidades($id_cliente){
			return $this->db->get_where('Entidade',array('idCliente' => $id_cliente,'excluido' => NULL))->result();
		}
		
		public function buscar_favorecidos($id_cliente){
			$this->db->where('Entidade.idCliente', $id_cliente);
			$this->db->select('*')->from('Entidade')->join('Favorecido', 'Favorecido.idFavorecido = Entidade.idFavorecido')->group_by('favorecido.nome');
			$this->db->where('Entidade.excluido', NULL);
			return $this->db->get()->result();
		}
		
		public function buscar_entidade($id){
			return $this->db->get_where('Entidade',array('idEntidade' => $id,'excluido' => NULL))->row();
		}
		
		public function buscar_favorecido($id){
			$this->db->where('Entidade.idCliente', $this->session->userdata('id_cliente'));
			$this->db->select('*')->from('Favorecido')->join('Entidade', 'Entidade.idFavorecido = Favorecido.idFavorecido');
			$this->db->where('Entidade.idFavorecido', $id);
			$this->db->where('Entidade.excluido', NULL);
			return $this->db->get()->row();
		}

		public function buscar_datas($id_cliente){
			$this->load->helper('date');
			$this->db->where('idCliente', $id_cliente);
			$this->db->where('excluido =', NULL);
			return $this->db->get('Contrato')->result();	
		}

		public function deletar($id)
	    {
	        $this->db->where('idContrato', $id);
	        $dados['excluido'] = 1;
	        $this->db->update('Contrato', $dados);
	    }

	    public function buscar_contrato_especifico($id_contrato){
	    	$this->db->where('idContrato', $id_contrato);
	    	return $this->db->get('Contrato')->result()[0];
	    }
	}