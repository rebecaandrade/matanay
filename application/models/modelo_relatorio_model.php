<?php

class Modelo_relatorio_model extends CI_Model {

	public function buscar_tipo_modelo($id){
		$this->db->where('idTipo_Modelo',$id);
		return $this->db->get('tipo_modelo');
	}

	public function buscar_tipos_modelo(){
		return $this->db->get('tipo_modelo')->result();
	}

	public function cadastrar_modelo($post){
		$query = $this->db->query(
			"CREATE TABLE ".$post['nome']."(
				".$post['isrc']." varchar(255) NOT NULL, 
				".$post['upc']." varchar(255) NOT NULL, 
				".$post['qnt_vendida']." varchar(255) NOT NULL, 
				".$post['valor_recebido']." varchar(255) NOT NULL, 
				".$post['loja']." varchar(255) NOT NULL, 
				".$post['subloja']." varchar(255) NOT NULL, 
				".$post['territorio']." varchar(255) NOT NULL, 
				".$post['moeda']." varchar(255) NOT NULL,
				idTipo_Modelo int NOT NULL DEFAULT '".$post['idTipo_Modelo']."',
				idModelo int NOT NULL PRIMARY KEY,
				idCliente int NOT NULL DEFAULT '".$post['idCliente']."');"
			);
		return 1;
	}

	public function deletar_modelo($id,$id_cliente){
		$array = array(
					'excluido' => 1
				);
		$this->db->where('idModelo',$id);
		$this->db->where('idCliente',$id_cliente);
		$this->db->update('modelo',$array);
		return $this->db->affected_rows();
	}
	public function buscar_modelos($id_cliente){
		$this->db->select("*");
		$this->db->from('modelo');
		$this->db->where('excluido',NULL);
		$this->db->where('idCLiente',$id_cliente);
		$this->db->join('tipo_modelo', 'tipo_modelo.idTipo_Modelo = modelo.idTipo_Modelo');
		return $this->db->get()->result();
	}
	public function buscar_modelo($id_modelo){
		$this->db->select("*");
		$this->db->from('modelo');
		$this->db->where('excluido',NULL);
		$this->db->where('idModelo',$id_modelo);
		$this->db->join('tipo_modelo', 'tipo_modelo.idTipo_Modelo = modelo.idTipo_Modelo');
		return $this->db->get()->row();
	}
	public function editar_modelo($post,$id){
		$this->db->where('idModelo',$id);
		return $this->db->update('modelo',$post);
	}
}