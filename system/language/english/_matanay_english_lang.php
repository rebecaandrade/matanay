<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

////// GERAL

$lang['ingles']				= 'ENGLISH';
$lang['portugues']			= 'PORTUGUÊS';
$lang['deletar']			= 'Delete';
$lang['editar']				= 'Edit';
$lang['atualizar']			= 'UPDATE';
$lang['acao']				= 'Action';
$lang['novo']				= 'NEW';
$lang['nova']				= 'NEW';
$lang['nome']				= 'Name';
$lang['selecione']			= 'Select';
$lang['procurar']			= 'Search';
$lang['detalhes']			= 'DETAILS';
$lang['voltar']				= 'RETURN';
	
////// FORM VALIDATION

	////// VITOR
$lang['campos_invalidos']				= 'Invalid fields :';
$lang['form_error_nome_disponivel']		= 'Name not available';
$lang['form_error_required']			= 'The {field} field is required';
$lang['form_error_max_length']			= 'The {field} field cannot exceed {param} characters in length.';
$lang['form_error_decimal_num']			= 'the {field} field must contain a number';

////// ALERTAS SISTEMA

$lang['nada_encontrado']			= 'Nothing found.';
$lang['atualizado_sucesso']			= 'Updated successfully!';
$lang['cadastrado_sucesso']			= 'Registered successfully!';
$lang['excluido_sucesso']			= 'Deleted successfully!';
$lang['acesso_negado']				= 'Undue access';
$lang['permissao_insuficiente']		= 'No authorization to execute this action';
$lang['confirmar_deletar']			= 'Do you wish to delete this?';

////// LOGIN ////// Evandro

$lang['login'] 				= 'username';
$lang['senha'] 				= 'password';
$lang['entrar'] 			= 'Log In';
$lang['esqueceu_senha'] 	= 'Forgot your password?';

////// MENU ////// Evandro

$lang['home'] 				= 'HOME';
$lang['cadastros'] 			= 'REGISTER';
$lang['relatorios'] 		= 'REPORTS';
$lang['vendas'] 			= 'RECEIPTS';
$lang['sair'] 				= 'LOGOUT';

////// SUB_MENU ////// Evandro

$lang['faixas'] 			= 'TRACKS';
$lang['videos'] 			= 'VIDEOS';
$lang['albums'] 			= 'ALBUMS';
$lang['entidades'] 			= 'ENTITYS';
$lang['favorecido']			= 'FAVORED';
$lang['imposto']			= 'TAX';

////// FAIXAS ////// Evandro

$lang['titulo'] 			= 'Title';
$lang['cadastrar'] 			= 'Register';
$lang['video'] 				= 'Video?';
$lang['artista'] 			= 'Artist';
$lang['compositor'] 		= 'Writer';
$lang['compositores'] 		= 'Writers';
$lang['produtor'] 			= 'Producer';
$lang['produtores'] 		= 'Producers';
$lang['nao_ha_faixas']		= 'There are no tracks registered!';

////// ALBUMS ////// Evandro

$lang['n_faixas'] 			= 'Number of Tracks';
$lang['catalogo'] 			= 'Catalog Code';
$lang['lancamento'] 		= 'Release Year';
$lang['ano'] 				= 'Year';
$lang['tipo'] 				= 'Type';
$lang['faixa'] 				= 'Track';
$lang['nao_ha_albums']		= 'There are no albums registered!';

////// MOEDA ////// VITOR

$lang['moeda']				= 'Currency';
$lang['moeda_menu']			= 'CURRENCY';		
$lang['moeda_nome']			= 'Name';
$lang['moeda_sigla']		= 'Acronym';
$lang['moeda_cambio']		= 'Exchange rate';
$lang['moeda_editar']		= 'Update';
$lang['moeda_cadastrar']	= 'Register';
$lang['moeda_erro_listar']	= 'No currency registered';

////// CONTRATO

$lang['data_inicio']		= 'Start date';		
$lang['data_fim']			= 'End date';
$lang['alerta']				= 'Alert';
$lang['mes']				= 'month';
$lang['meses']				= 'months';
$lang['contrato_cadastrar']	= 'Register';


/////ENTIDADES/FAVORECIDO  Jadiel
$lang['entidade'] = 'Entity';
$lang['nome_favorecido']='Name of favored';
$lang['nome_entidade']				= 'Name of the Entity';		
$lang['cpf_cnpj']			= 'ID';
$lang['telefone']		= 'Telephone number';
$lang['telefone_alternativo']		= 'Alternative telephone number';
$lang['contato']		= 'One to be contacted';
$lang['email']	= 'One\'s email';
$lang['percentual_fisico']	= 'Percentage of gain with phisical media';
$lang['percentual_digital']	= 'Percentage of gain with digital media';
$lang['identificacao']				= 'Identification';		
$lang['banco']			= 'Bank';
$lang['conta']		= 'Checking account';
$lang['agencia']		= 'Bank Branch';
$lang['atual']	='Actual';
$lang['artista']	='Artist';
$lang['autor']	='Author';
$lang['produtor']	='Producer';
$lang['artista_min']	='artist';
$lang['autor_min']	='author';
$lang['produtor_min']	='producer';
$lang['eh_favorecido']	='Is it a favored?';
$lang['favorecido_cadastrado']	='Registed favoreds';
$lang['cadastro_realizado']='The Entity was successfully registered!';
$lang['campo_vazio']='One shall not leave an empty field!';
$lang['cnpj_invalido']='Invalid CNPJ';
$lang['cpf_invalido']='Invalid CPF';
$lang['cadastrar_entidade']='Register a new Entity!';
$lang['cadastrar_favorecido']='Register a new Favored!';
$lang['nao_ha_entidades']='There are no entitys registered!';
$lang['nao_ha_favorecidos']='There are no favoreds registered!';
$lang['nao_ha_impostos']='There are no taxes registered!';
$lang['descricao_entidade'] = "Description";


//IMPOSTO JADIEL
$lang['imposto_nome']='Name of the Tax';
$lang['valor']='Value';


//Cliente
$lang['clientes'] = 'Customers';
$lang['perfis'] = 'Profiles';
$lang['cliente_nome'] = 'Name';
$lang['cliente_login'] = 'Login';
$lang['cliente_senha'] = 'Password';
$lang['cliente_confirmar_senha'] = 'Confirm Password';
$lang['cliente_funcionalidades'] = 'Functionalities';
$lang['cliente_cadastrar'] = 'Register';
$lang['Perfil_erro_listar'] = 'No Profiles on record';
$lang['cliente_erro_listar'] = 'No customer on record';
$lang['cliente_erro_nome'] = 'Name already taken';




///////SIM OU NAO
$lang['sim']	='Yes';
$lang['nao']	='No';




