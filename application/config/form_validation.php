<?php
	$config = array(
		'cliente' => array(
						array(
								'field' => 'nome',
								'label' => 'lang:nome',
								'rules' => 'trim|required|max_length[45]|callback_nome_disponivel'
							)
						),
		'email' => array(
						array(
								'field' => 'emailaddress',
								'label' => 'EmailAddress',
								'rules' => 'required|valid_email'
							),
						array(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'required|alpha'
							 ),
						array(
								'field' => 'title',
								'label' => 'Title',
								'rules' => 'required'
							 ),
						array(
								'field' => 'message',
								'label' => 'MessageBody',
								'rules' => 'required'
							 )
						)
	);