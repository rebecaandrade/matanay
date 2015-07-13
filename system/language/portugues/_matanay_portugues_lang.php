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
$lang['deletar']			= 'Deletar';
$lang['editar']				= 'Editar';
$lang['atualizar']			= 'ATUALIZAR';
$lang['acao']				= 'ação';
$lang['novo']				= 'NOVO';
$lang['nova']				= 'NOVA';
$lang['nome']				= 'Nome';
$lang['selecione']			= 'Selecione';
$lang['procurar']			= 'Procurar';
$lang['detalhes']			= 'DETALHES';
$lang['voltar']				= 'VOLTAR';

////// FORM VALIDATION

///// VITOR
$lang['campos_invalidos']					= 'Campos inválidos :';
$lang['form_error_nome_disponivel']			= 'Esse nome não está disponivel';
$lang['form_error_required']				= 'O campo {field} é obrigatório';
$lang['form_error_max_length']				= 'O campo {field} deve possuir menos de {param} characteres';
$lang['form_error_is_int']					= 'O campo {field} deve ser um inteiro';
$lang['form_error_decimal_num']				= 'O campo {field} deve conter um número';
$lang['form_error_permissao_entidade']		= 'Permissão insuficiente para manipular a entidade selecionada';
$lang['form_error_permissao_favorecido']	= 'Permissão insuficiente para manipular o favorecido selecionado';
$lang['form_error_data_valida']				= "O campo {field} não contém uma data valida";
$lang['form_error_depois_data_inicio']		= "A data de término deve ser após a data de inicio";

////// ALERTAS SISTEMA

$lang['nada_encontrado']		= 'Nada encontrado.';
$lang['atualizado_sucesso']		= 'Atualizado com sucesso!';
$lang['cadastrado_sucesso']		= 'Cadastrado com sucesso!';
$lang['excluido_sucesso']		= 'Excluído com sucesso!';
$lang['acesso_negado']			= 'Acesso indevido';
$lang['permissao_insuficiente']	= 'Permissão insuficiente para esta ação';
$lang['confirmar_deletar']		= 'Confirmar deleção?';
$lang['problemas_formulario']       = 'Problemas com o formulario';

////// LOGIN

$lang['login'] 				= 'usuário';
$lang['senha'] 				= 'senha';
$lang['entrar'] 			= 'Entrar';
$lang['esqueceu_senha'] 	= 'Esqueceu sua senha?';

////// MENU 

$lang['home'] 				= 'INÍCIO';
$lang['cadastros'] 			= 'CADASTROS';
$lang['relatorios'] 		= 'RELATÓRIOS';
$lang['vendas'] 			= 'VENDAS';
$lang['sair'] 				= 'SAIR';

////// SUB_MENU

$lang['faixas'] 			= 'FAIXAS';
$lang['albums'] 			= 'ÁLBUNS';
$lang['entidades'] 			= 'ENTIDADES';
$lang['favorecido']			= 'FAVORECIDOS';
$lang['imposto']			= 'IMPOSTOS';

////// FAIXAS 

$lang['titulo']	 			= 'Título';
$lang['cadastrar'] 			= 'Cadastrar';
$lang['video'] 				= 'Vídeo?';
$lang['artista'] 			= 'Artista';
$lang['compositor'] 		= 'Compositor';
$lang['compositores'] 		= 'Compositores';
$lang['produtor'] 			= 'Produtor';
$lang['produtores'] 		= 'Produtores';
$lang['nao_ha_faixas']		= 'Não há faixas cadastradas!';
$lang['participacao']		= 'Participação na Faixa';

////// ALBUMS 

$lang['n_faixas'] 			= 'Número de Faixas';
$lang['catalogo'] 			= 'Cod. Catálogo';
$lang['lancamento'] 		= 'Ano de Lançamento';
$lang['ano'] 				= 'Ano';
$lang['tipo'] 				= 'Tipo';
$lang['faixa'] 				= 'Faixa';
$lang['nao_ha_albums']		= 'Não há álbuns cadastrados!';

////// MOEDA ////// Vitor

$lang['moeda']				= 'Moeda';
$lang['moeda_menu']			= 'MOEDA';
$lang['moeda_nome']			= 'Nome';
$lang['moeda_sigla']		= 'Sigla';
$lang['moeda_cambio']		= 'Taxa de câmbio';
$lang['moeda_editar']		= 'Atualizar';
$lang['moeda_cadastrar']	= 'Cadastrar';
$lang['moeda_erro_listar']	= 'Nenhuma moeda cadastrada';

////// CONTRATO ////// Vitor

$lang['data_inicio']			= 'Data de inicio';
$lang['data_fim']				= 'Data de término';
$lang['alerta']					= 'Alerta';
$lang['mes']					= 'mês';
$lang['meses']					= 'meses';
$lang['contrato_cadastrar']		= 'Cadastrar';
$lang['contrato_entidade']		= 'Escolha a entidade';
$lang['contrato_favorecido']	= 'Escolha o favorecido';

/////ENTIDADES/FAVORECIDO /*FEITO POR MIM JADIEL*/
$lang['nome_entidade']='Nome da entidade';
$lang['nome_favorecido']='Nome do favorecido';
$lang['cpf_cnpj']='CPF/CNPJ';
$lang['telefone']	= 'Telefone';
$lang['telefone_alternativo']	= 'Telefone Alternativo';
$lang['contato'] = 'Contato';
$lang['email']	= 'Email do Contato';
$lang['percentual_fisico']	= 'Porcentagem de ganho mídia física';
$lang['percentual_digital']	= 'Porcentagem de ganho mídia digital';
$lang['identificacao']				= 'Identificação';
$lang['banco']			= 'Banco';
$lang['conta']		= 'Conta corrente';
$lang['agencia']		= 'Agencia Bancária';
$lang['atual']	='Atual';
$lang['artista']	='Artista';
$lang['autor']	='Autor';
$lang['produtor']	='Produtor';
$lang['artista_min']	='artista';
$lang['autor_min']	='autor';
$lang['produtor_min']	='produtor';
$lang['eh_favorecido']	='É um favorecido?';
$lang['favorecido_cadastrado']	='Favorecidos Registrados';
$lang['acao']='Ação';
$lang['delear']='Deletar';
$lang['editar']='Editar';
$lang['nao_ha_entidades']='Não há entidades cadastradas!';
$lang['selecione']='Selecione';
$lang['cadastro_realizado']='Cadastro Realizado!';
$lang['campo_vazio']='Todos os campos devem ser preenchidos!';
$lang['cnpj_invalido']='CNPJ inválido';
$lang['cpf_invalido']='CPF inválido';
$lang['cadastrar_entidade']='Cadastrar uma nova entidade!';
$lang['cadastrar_favorecido']='Cadastrar um novo favorecido';
$lang['nao_ha_entidades']='Não existem entidades cadastradas!';
$lang['nao_ha_favorecidos']='Não existem favorecidos cadastrados!';
$lang['nao_ha_impostos']='Não existem impostos cadastrados!';
$lang['descricao_entidade'] = "Descrição";
$lang['classPercent']="porcentagem";
$lang['cadastro_entidade_view'] = 'Cadastro de Entidade';
$lang['listar_entidade_view'] = 'Mostrar Entidades';
$lang['myTable'] = 'myTable';



//IMPOSTO JADIEL
$lang['imposto_nome']='Nome do Imposto';
$lang['valor']='Valor';



////// CLIENTE ////// Vitor

$lang['clientes'] 					= 'CLIENTES';
$lang['perfis']						= 'PERFIS';
$lang['perfis_row']					= 'Perfis';
$lang['cliente_nome'] 				= 'Nome';
$lang['cliente_login'] 				= 'Login';
$lang['cliente_senha']				= 'Senha';
$lang['cliente_confirmar_senha']	= 'Confirmação de Senha';
$lang['cliente_funcionalidades'] 	= 'Funcionalidades';
$lang['cliente_cadastrar'] 			= 'Cadastrar';
$lang['Perfil_erro_listar']			= 'Nenhum perfil cadastrado';
$lang['cliente_erro_listar'] 		= 'Nenhum cliente cadastrado';
$lang['cliente_erro_nome'] 			= 'Este nome já se encontra cadastrado';





///////SIM OU NAO /*FEITO POR MIM JADIEL*/
$lang['sim']	='Sim';
$lang['nao']	='Não';




//SODRE   //FORMVALIDATION
$lang['cpf/cnpf_invalido']       = 'CPF/CNPJ Inválido';
$lang['campos_incorretos']       = 'Alguns campos foram preenchidos incorretamente';
$lang['langOpt']                 = '0';
$lang['erro_favorecido']         = 'Selecione Um favorecido';
$lang['erro_identificacao']      = 'Selecione Uma identificação';
$lang['nome_invalido']           = 'Nome inválido';