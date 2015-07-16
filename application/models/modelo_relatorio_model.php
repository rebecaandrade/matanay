<?php

class Modelo_relatorio_model extends CI_Model {

	public function buscar_tipos_modelo(){
		return $this->db->get('tipo_modelo')->result();
	}

}