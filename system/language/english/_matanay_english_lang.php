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
$lang['coluna']				= 'Column';
$lang['escolha_opcao']		= 'Choose an option';
$lang['erro']				= 'An error happened';

////// FORM VALIDATION

////// VITOR

$lang['campos_invalidos']					= 'Invalid fields :';
$lang['form_error_nome_disponivel']			= 'Name not available';
$lang['form_error_required']				= 'The {field} field is required';
$lang['form_error_max_length']				= 'The {field} field cannot exceed {param} characters in length.';
$lang['form_error_min_length']				= 'The {field} field must be at least {param} characters in length.';
$lang['form_error_is_int']					= 'The {field} must contain an integer';
$lang['form_error_decimal_num']				= 'The {field} field must contain a number';
$lang['form_error_permissao_entidade']		= 'Insufficient permission to manipulate the selected entity';
$lang['form_error_permissao_favorecido']	= 'Insufficient permission to manipulate the selected favored';
$lang['form_error_data_valida']				= "The {field} field doesn't contain a valid date";
$lang['form_error_depois_data_inicio']		= "The end date must occur after the start date";
$lang['form_error_login_disponivel']		= 'Login already taken';
$lang['form_error_confirmar_senha']			= "Password and confirmation don't match";
$lang['form_error_tipo_modelo_valido']		= "The {field} field doesn't contain a valid type";
$lang['form_error_modelo_relatorio_alpha']	= "The {field} field doesn't contain a valid column";

////// ALERTAS SISTEMA

$lang['nada_encontrado']			= 'Nothing found.';
$lang['atualizado_sucesso']			= 'Successfully Updated!';
$lang['cadastrado_sucesso']			= 'Successfully Registered!';
$lang['excluido_sucesso']			= 'Successfully Deleted!';
$lang['acesso_negado']				= 'Undue access';
$lang['permissao_insuficiente']		= 'No authorization to execute this action';
$lang['confirmar_deletar']			= 'Do you wish to delete this?';
$lang['problemas_formulario']       = 'Problems with the form';

////// LOGIN 

$lang['login'] 				= 'username';
$lang['senha'] 				= 'password';
$lang['entrar'] 			= 'Log In';
$lang['esqueceu_senha'] 	= 'Forgot your password?';

////// MENU 

$lang['home'] 				= 'HOME';
$lang['cadastros'] 			= 'REGISTER';
$lang['relatorios'] 		= 'REPORTS';
$lang['vendas'] 			= 'RECEIPTS';
$lang['sair'] 				= 'LOGOUT';

////// SUB_MENU 

$lang['faixas'] 			= 'TRACKS';
$lang['videos'] 			= 'VIDEOS';
$lang['albums'] 			= 'ALBUMS';
$lang['entidades'] 			= 'ENTITIES';
$lang['favorecidos']		= 'FAVOREDS';
$lang['imposto']			= 'TAX';

////// FAIXAS 

$lang['titulo'] 			= 'Title';
$lang['cadastrar'] 			= 'Register';
$lang['video'] 				= 'Video?';
$lang['artista'] 			= 'Artist';
$lang['autor'] 				= 'Writer';
$lang['autores'] 			= 'Writers';
$lang['produtor'] 			= 'Producer';
$lang['produtores'] 		= 'Producers';
$lang['impostos'] 			= 'Taxes';
$lang['nao_ha_faixas']		= 'There are no tracks registered!';
$lang['participacao']		= 'Track Participation';
$lang['faixas_cadastro']	= 'Track Registry';
$lang['faixas_edicao']		= 'Track Update';

////// ALBUNS 

$lang['n_faixas'] 				= 'Number of Tracks';
$lang['catalogo'] 				= 'Catalog Code';
$lang['lancamento'] 			= 'Release Year';
$lang['ano'] 					= 'Year';
$lang['tipo'] 					= 'Type';
$lang['faixa'] 					= 'Track';
$lang['nao_ha_albums']			= 'There are no albums registered!';
$lang['albuns_cadastro']		= 'Album Registry';
$lang['albuns_edicao']			= 'Album Update';
$lang['albuns_edicao_faixas'] 	= 'Tracklist Update';

////// MOEDA ////// VITOR

$lang['moeda']				= 'Currency';
$lang['moeda_menu']			= 'CURRENCY';
$lang['moeda_nome']			= 'Name';
$lang['moeda_sigla']		= 'Acronym';
$lang['moeda_cambio']		= 'Exchange rate';
$lang['moeda_editar']		= 'Update';
$lang['moeda_cadastrar']	= 'Register';
$lang['moeda_erro_listar']	= 'No currency registered';
$lang['moeda_cadastro']		= 'Currency Registry';
$lang['moeda_edicao']		= 'Currency Update';

////// CONTRATO

$lang['data_inicio']			= 'Start date';
$lang['data_fim']				= 'End date';
$lang['alerta']					= 'Alert';
$lang['mes']					= 'month';
$lang['meses']					= 'months';
$lang['contrato_cadastrar']		= 'Register';
$lang['contrato_entidade']		= 'Choose the entity';
$lang['contrato_favorecido']	= 'Choose the favored';
$lang['contrato_cadastro']		= 'Contract Registry';

/////ENTIDADES/FAVORECIDO  Jadiel
$lang['entidade'] 					= 'Entity';
$lang['nome_favorecido']			='Name of favored';
$lang['nome_entidade']				= 'Name of the Entity';
$lang['cpf_cnpj']					= 'ID';
$lang['telefone']					= 'Telephone number';
$lang['telefone_alternativo']		= 'Alternative telephone number';
$lang['contato']					= 'One to be contacted';
$lang['email']						= 'One\'s email';
$lang['percentual_fisico']			= 'Percentage of gain with phisical media';
$lang['percentual_digital']			= 'Percentage of gain with digital media';
$lang['identificacao']				= 'Identification';
$lang['banco']						= 'Bank';
$lang['conta']						= 'Checking account';
$lang['agencia']					= 'Bank Branch';
$lang['atual']						='Actual';
$lang['Artista']					='Artist';
$lang['Autor']						='Author';
$lang['Produtor']					='Producer';
$lang['artista_min']				='artist';
$lang['autor_min']					='author';
$lang['produtor_min']				='producer';
$lang['eh_favorecido']				='Is it a favored?';
$lang['favorecido_cadastrado']		='Registed favoreds';
$lang['cadastro_realizado']			='The Entity was successfully registered!';
$lang['campo_vazio']				='One shall not leave an empty field!';
$lang['cnpj_invalido']				='Invalid CNPJ';
$lang['cpf_invalido']				='Invalid CPF';
$lang['cadastrar_entidade']			='Register a new Entity!';
$lang['cadastrar_favorecido']		='Register a new Favored!';
$lang['nao_ha_entidades']			='There are no entities registered!';
$lang['nao_ha_favorecidos']			='There are no favoreds registered!';
$lang['nao_ha_impostos']			='There are no taxes registered!';
$lang['descricao_entidade'] 		= "Description";
$lang['classPercent']				="percentage";
$lang['cadastro_entidade'] 			= 'Entity Cadastre';
$lang['edicao_entidade'] 			= 'Entity Update';
$lang['cadastro_favorecido']		= 'Favored Cadastre';
$lang['edicao_favorecido'] 			= 'Favored Update';
$lang['listar_entidade_view'] 		= 'Show Entities';
$lang['myTable'] 					= 'usTable';
$lang['favorecido'] 				= 'Favored';
$lang['favorecido_nao_cadastrado']	= 'It is required a registered favored to register a Entity.';


//IMPOSTO JADIEL

$lang['imposto_nome']		='Name of the Tax';
$lang['valor']				='Value';
$lang['cadastro_imposto'] 	= 'Taxes Cadastre';
$lang['fisico'] 			= 'Phisical';
$lang['digital'] 			= 'Digital';

////// MODELO DE RELATORIO ////// Vitor

$lang['modelo_cadastro']			= 'Report Model registry';
$lang['isrc'] 						= 'ISRC';
$lang['upc'] 						= 'UPC';
$lang['qnt_vendida']				= 'Amount Sold';
$lang['valor_recebido']				= 'Amount Earned';
$lang['loja'] 						= 'Store';
$lang['subloja']					= 'sub-store';
$lang['territorio']					= 'Territory';
$lang['identificador_moeda']		= 'Currency identificator';
$lang['selecione_coluna']			= 'Select the corresponding column for the following attributes:';

////// CLIENTE ////// Vitor

$lang['clientes'] 					= 'CUSTOMERS';
$lang['perfis'] 					= 'PROFILES';
$lang['perfis_row']					= 'Profiles';
$lang['cliente_nome'] 				= 'Name';
$lang['cliente_login'] 				= 'Login';
$lang['cliente_senha'] 				= 'Password';
$lang['cliente_confirmar_senha']	= 'Confirm Password';
$lang['cliente_funcionalidades']	= 'Functionalities';
$lang['cliente_cadastrar']			= 'Register';
$lang['Perfil_erro_listar']			= 'No Profiles on record';
$lang['cliente_erro_listar']		= 'No customer on record';
$lang['cliente_cadastro']			= 'Customer Registry';
$lang['cliente_edicao']				= 'Customer Update';
$lang['perfil_cadastro']			= 'Profile Registry';
$lang['perfil_edicao']				= 'Profile Update';

////// SIM OU NAO

$lang['sim'] = 'Yes';
$lang['nao'] = 'No';

// FUNCIONALIDADES
$lang['func_manter_cliente']            = 'CRUD Customers';
$lang['func_manter_perfil']             = 'CRUD Profiles';
$lang['func_cadastrar_entidade']        = 'Entity Cadastre';
$lang['func_listar_entidade']           = 'Display Entity';
$lang['func_excluir_entidade']          = 'Entity Exclusion';
$lang['func_atualizar_entidade']        = 'Entity Update';
$lang['func_cadastrar_favorecido']      = 'Favored Cadastre';
$lang['func_listar_favorecido']         = 'Display Favored';
$lang['func_excluir_favorecido']        = 'Favored Exclusion';
$lang['func_atualizar_favorecido']      = 'Favored Update';
$lang['func_cadastrar_faixas']          = 'Tracks Cadastre';
$lang['func_listar_faixas']             = 'Display Tracks';
$lang['func_excluir_faixas']            = 'Tracks Exclusion';
$lang['func_atualizar_faixas']          = 'Tracks Update';
$lang['func_cadastrar_albuns']          = 'Album Cadastre';
$lang['func_listar_albuns']             = 'Display Albuns';
$lang['func_excluir_albuns']            = 'Album Exclusion';
$lang['func_atualizar_albuns']          = 'Album Update';
$lang['func_cadastrar_imposto']         = 'Tax Cadastre';
$lang['func_listar_imposto']            = 'Display Taxes';
$lang['func_excluir_imposto']           = 'Tax Exclusion';
$lang['func_atualizar_imposto']         = 'Tax Update';
$lang['func_cadastrar_moeda']           = 'Currency Cadastre';
$lang['func_listar_moeda']              = 'Display Currencies';
$lang['func_excluir_moeda']             = 'Currency Exclusion';
$lang['func_atualizar_moeda']           = 'Currency Update';
$lang['func_cadastrar_relatorio']       = 'Report Cadastre';
$lang['func_listar_relatorio']          = 'Display Reports';
$lang['func_excluir_relatorio']         = 'Report Exclusion';
$lang['func_atualizar_relatorio']       = 'Report Update';

//SODRE   //FORMVALIDATION

$lang['cpf/cnpj_invalido']       = 'Invalid CPF/CNPJ';
$lang['campos_incorretos']       = 'Some fields were filled incorrectly';
$lang['langOpt']                 = '1';
$lang['erro_favorecido']         = 'Choose a favored';
$lang['erro_identificacao']      = 'Choose an ID';
$lang['nome_invalido']           = 'Invalid Name';



// mensagens validacao form cadastro de perfil
$lang['password_error']                        = "Passwords are not the same";
$lang['marcar_todas']                          = "Check All";
$lang['login_existente']                       = "Login already exists";


