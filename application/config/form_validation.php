<?php
	$config = array(
		'cliente' => array(
						array(
								'field' => 'nome',
								'label' => 'lang:nome',
								'rules' => 'trim|required|max_length[45]|callback_nome_disponivel'
							)
						),
		'moeda' => array(
						array(
								'field' => 'nome',
								'label' => 'lang:nome',
								'rules' => 'trim|required|max_length[45]'
							),
						array(
								'field' => 'sigla',
								'label' => 'lang:moeda_sigla',
								'rules' => 'trim|required|max_length[45]'
							 ),
						array(
								'field' => 'cambio',
								'label' => 'lang:moeda_cambio',
								'rules' => 'trim|required|max_length[45]|callback_decimal_num'
							 )
						),
		'contrato' => array(
						array(
								'field' => 'nome',
								'label' => 'lang:nome',
								'rules' => 'trim|required|max_length[45]'
							),
						array(
								'field' => 'entidade',
								'label' => 'lang:contrato_entidade',
								'rules' => 'trim|required|callback_permissao_entidade'
							),
						array(
								'field' => 'favorecido',
								'label' => 'lang:contrato_favorecido',
								'rules' => 'trim|required|callback_permissao_favorecido'
							),
						array(
								'field' => 'data_inicio',
								'label' => 'lang:data_inicio',
								'rules' => 'trim|required|callback_data_valida'
							),
						array(
								'field' => 'data_fim',
								'label' => 'lang:data_fim',
								'rules' => 'trim|required|callback_data_valida|callback_depois_data_inicio'
							),
						array(
								'field' => 'alerta',
								'label' => 'lang:alerta',
								'rules' => 'trim|required|callback_decimal_num'
							)
						)
	);