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
						)
	);