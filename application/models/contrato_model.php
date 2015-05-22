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
	}