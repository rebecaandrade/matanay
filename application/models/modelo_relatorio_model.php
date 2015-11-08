<?php

class Modelo_relatorio_model extends CI_Model {

	public function buscar_tipo_modelo($id){
		$this->db->where('idTipo_Modelo',$id);
		return $this->db->get('Tipo_Modelo');
	}

	public function buscar_tipos_modelo(){
		return $this->db->get('Tipo_Modelo')->result();
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
		$this->db->update('Modelo',$array);
		return $this->db->affected_rows();
	}
	public function buscar_modelos($id_cliente){
		$this->db->select("*");
		$this->db->from('Modelo');
		$this->db->where('excluido',NULL);
		$this->db->where('idCLiente',$id_cliente);
		$this->db->join('Tipo_Modelo', 'Tipo_Modelo.idTipo_Modelo = modelo.idTipo_Modelo');
		return $this->db->get()->result();
	}
	public function buscar_modelo($id_modelo){
		$this->db->select("*");
		$this->db->from('Modelo');
		$this->db->where('excluido',NULL);
		$this->db->where('idModelo',$id_modelo);
		$this->db->join('Tipo_Modelo', 'Tipo_Modelo.idTipo_Modelo = Modelo.idTipo_Modelo');
		return $this->db->get()->row();
	}
	public function editar_modelo($post,$id){
		$this->db->where('idModelo',$id);
		return $this->db->update('Modelo',$post);
	}
}