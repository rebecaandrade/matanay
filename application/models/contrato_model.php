<?php
	class contrato_model extends CI_Model {
		public function cadastrar($nome,$data_inicio,$data_fim,$alerta,$id){
			$contrato = array( 
						'nome'			=> $nome,
						'data_inicio'	=> $data_inicio,
						'data_fim'		=> $data_fim,
						'alerta'		=> $alerta,
						'idEntidade'	=> $id,
						'idLoja'		=> 1,// apagar no novo banco
						'idSub_loja'	=> 2 // apagar no novo banco
			);
			return	$this->db->insert('contrato',$contrato);
		}
		public function buscar_entidades($id_cliente){
			return $this->db->get_where('entidade',array('idCliente' => $id_cliente,'excluido' => NULL))->result();
		}
		public function buscar_favorecidos($id_cliente){
			$this->db->select('*')->from('entidade')->join('favorecido', 'favorecido.idFavorecido = entidade.idFavorecido');
			return $this->db->get()->result();
		}
	}