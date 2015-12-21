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
$lang['bloquear']			= 'Bloquear';
$lang['desbloquear']		= 'Desbloquear';
$lang['bloqueado']			= 'Bloqueado';
$lang['desbloqueado']		= 'Desbloqueado';
$lang['editar']				= 'Editar';
$lang['atualizar']			= 'ATUALIZAR';
$lang['adicionar']			= 'ADICIONAR';
$lang['acao']				= 'ação';
$lang['status']				= 'Status';
$lang['novo']				= 'NOVO';
$lang['nova']				= 'NOVA';
$lang['nome']				= 'Nome';
$lang['selecione']			= 'Selecione';
$lang['procurar']			= 'Procurar';
$lang['detalhes']			= 'DETALHES';
$lang['voltar']				= 'VOLTAR';
$lang['coluna']				= 'Coluna';
$lang['escolha_opcao']		= 'Escolha uma opção';
$lang['erro']				= 'Houve um erro';
$lang['indisponivel']       = 'Indisponível';
$lang['disponivel']       	= 'Disponível';


////// FORM VALIDATION

///// VITOR
$lang['campos_invalidos']					= 'Campos inválidos :';
$lang['form_error_nome_disponivel']			= 'Esse nome não está disponivel';
$lang['form_error_required']				= 'O campo {field} é obrigatório';
$lang['form_error_max_length']				= 'O campo {field} deve possuir menos de {param} characteres';
$lang['form_error_min_length']				= 'O campo {field} deve possuir mais de {param} characteres';
$lang['form_error_is_int']					= 'O campo {field} deve ser um inteiro';
$lang['form_error_decimal_num']				= 'O campo {field} deve conter um número';
$lang['form_error_permissao_entidade']		= 'Permissão insuficiente para manipular a entidade selecionada';
$lang['form_error_permissao_favorecido']	= 'Permissão insuficiente para manipular o favorecido selecionado';
$lang['form_error_data_valida']				= "O campo {field} não contém uma data valida";
$lang['form_error_depois_data_inicio']		= "A data de término deve ser após a data de inicio";
$lang['form_error_login_disponivel']		= "Este login já se encontra cadastrado";
$lang['form_error_confirmar_senha']			= "Senha e confirmação de senha diferem";
$lang['form_error_tipo_modelo_valido']		= "O campo {field} deve conter um tipo valido";
$lang['form_error_modelo_relatorio_alpha']	= "O campo {field} deve conter uma coluna valida";

////// ALERTAS SISTEMA

$lang['nada_encontrado']		= 'Nada encontrado.';
$lang['atualizado_sucesso']		= 'Atualizado com sucesso!';
$lang['email_enviado']			= 'Email com configurações da mudança de senha enviado com sucesso!';
$lang['cadastrado_sucesso']		= 'Cadastrado com sucesso!';
$lang['excluido_sucesso']		= 'Excluído com sucesso!';
$lang['bloqueado_sucesso']		= 'Bloqueado com sucesso!';
$lang['impossivel_bloquear']	= 'Não é possível bloquear o seu próprio perfil!';
$lang['desbloqueado_sucesso']	= 'Desbloqueado com sucesso!';
$lang['usuario_bloqueado']		= 'Usuario se encontra bloqueado';
$lang['acesso_negado']			= 'Acesso indevido';
$lang['usuario_invalido']		= 'Usuario inválido';
$lang['usuario_ou_senha_invalida']	= 'Usuario ou senha inválida';
$lang['senha_invalida']				= 'Senha inválida';
$lang['resetSuaSenha']				= 'Por favor altere sua senha';
$lang['resetSuaSenhaLink']			= 'Por favor altere sua senha por esse link';
$lang['permissao_insuficiente']	= 'Permissão insuficiente para esta ação';
$lang['confirmar_deletar']		= 'Confirmar deleção?';
$lang['problemas_formulario']	= 'Problemas com o formulario';

////// LOGIN

$lang['login'] 				= 'usuário';
$lang['senha'] 				= 'senha';
$lang['entrar'] 			= 'Entrar';
$lang['enviar'] 			= 'Enviar';
$lang['esqueceu_senha'] 	= 'Esqueceu sua senha?';

////// MENU 

$lang['home'] 				= 'INÍCIO';
$lang['cadastros'] 			= 'GERÊNCIA DE DADOS';
$lang['cadastros1'] 		= 'ENTIDADES/FAVORECIDOS';
$lang['relatorios'] 		= 'RELATÓRIOS';
$lang['vendas'] 			= 'EXPORTAÇÃO DE RELATÓRIOS';
$lang['sair'] 				= 'SAIR';

////// SUB_MENU

$lang['faixas'] 			= 'FAIXAS';
$lang['videos'] 			= 'VIDEOS';
$lang['albums'] 			= 'ÁLBUNS';
$lang['entidades'] 			= 'ENTIDADES';
$lang['favorecidos']		= 'FAVORECIDOS';
$lang['imposto']			= 'IMPOSTOS';
$lang['contrato']			= 'CONTRATOS';

////// FAIXAS 

$lang['titulo']	 			= 'Título';
$lang['cadastrar'] 			= 'Cadastrar';
$lang['video'] 				= 'Vídeo?';
$lang['artista'] 			= 'Artista';
$lang['autor'] 				= 'Autor';
$lang['editora'] 			= 'Editora';
$lang['autores'] 			= 'Autores';
$lang['produtor'] 			= 'Produtor';
$lang['produtores'] 		= 'Produtores';
$lang['impostos'] 			= 'Impostos';
$lang['nao_ha_faixas']		= 'Não há faixas cadastradas!';
$lang['participacao']		= 'Participação na Faixa';
$lang['faixas_cadastro']	= 'Cadastro de Faixa';
$lang['faixas_edicao']		= 'Edição de Faixa';
$lang['faixa_nao_encontrado']	= 'Uma Faixa do relatorio não se encontra no sistema, realize o cadastro da faixa de ISRC ';
$lang['faixa_nao_encontrado10']	= 'Uma faixa do relatório não foi encontrada no album do relatório, registre a faixa de ISRC ';
$lang['faixa_nao_encontrado11']	= 'no album de UPC/EAN ';

////// ALBUMS 

$lang['n_faixas'] 				= 'Número de Faixas';
$lang['catalogo'] 				= 'Cod. Catálogo';
$lang['lancamento'] 			= 'Ano de Lançamento';
$lang['ano'] 					= 'Ano';
$lang['tipo'] 					= 'Tipo';
$lang['faixa'] 					= 'Faixa';
$lang['nao_ha_albums']			= 'Não há álbuns cadastrados!';
$lang['albuns_cadastro']		= 'Cadastro de Álbum';
$lang['albuns_edicao']			= 'Edição de Álbum';
$lang['albuns_edicao_faixas'] 	= 'Edição de Faixas';
$lang['cod_invalido']   		= "Código do catalogo inválido";
$lang['album_nao_encontrado']	= 'Um Album do relatorio não se encontra no sistema, realize o cadastro do album de UPC/EAN ';


////// MOEDA ////// Vitor

$lang['moeda']				= 'Moeda';
$lang['moeda_menu']			= 'MOEDA';
$lang['moeda_nome']			= 'Nome';
$lang['moeda_sigla']		= 'Sigla';
$lang['moeda_cambio']		= 'Taxa de câmbio';
$lang['moeda_editar']		= 'Atualizar';
$lang['moeda_cadastrar']	= 'Cadastrar';
$lang['moeda_erro_listar']	= 'Nenhuma moeda cadastrada';
$lang['moeda_cadastro']		= 'Cadastro de Moeda';
$lang['moeda_edicao']		= 'Edição de Moeda';

////// CONTRATO ////// Vitor

$lang['data_inicio']			= 'Data de inicio';
$lang['data_fim']				= 'Data de término';
$lang['alerta']					= 'Alerta';
$lang['mes']					= 'mês';
$lang['meses']					= 'meses';
$lang['contrato_cadastrar']		= 'Cadastrar';
$lang['contrato_entidade']		= 'Escolha a entidade';
$lang['contrato_favorecido']	= 'Escolha o favorecido';
$lang['contrato_cadastro']		= 'Cadastro de Contrato';
$lang['contrato_edicao']		= 'Atualização de Contrato';

/////ENTIDADES/FAVORECIDO //// Jadiel

$lang['entidade'] 					= 'Entidade';
$lang['nome_entidade']				= 'Nome da entidade';
$lang['nome_favorecido']			= 'Nome do favorecido';
$lang['cpf_cnpj']					= 'CPF/CNPJ';
$lang['telefone']					= 'Telefone';
$lang['telefone_alternativo']		= 'Telefone Alternativo';
$lang['contato'] 					= 'Contato';
$lang['email']						= 'Email do Contato';
$lang['percentual_fisico']			= 'Porcentagem de ganho mídia física';
$lang['percentual_digital']			= 'Porcentagem de ganho mídia digital';
$lang['identificacao']				= 'Identificação';
$lang['banco']						= 'Banco';
$lang['conta']						= 'Conta corrente';
$lang['agencia']					= 'Agencia Bancária';
$lang['atual']						= 'Atual';
$lang['Artista']					= 'Artista';
$lang['Autor']						= 'Autor';
$lang['Produtor']					= 'Produtor';
$lang['artista_min']				= 'artista';
$lang['autor_min']					= 'autor';
$lang['produtor_min']				= 'produtor';
$lang['eh_favorecido']				= 'É um favorecido?';
$lang['favorecido_cadastrado']		= 'Favorecidos Registrados';
$lang['cadastro_realizado']			= 'Cadastro Realizado!';
$lang['campo_vazio']				= 'Todos os campos devem ser preenchidos!';
$lang['cnpj_invalido']				= 'CNPJ inválido';
$lang['cpf_invalido']				= 'CPF inválido';
$lang['cadastrar_entidade']			= 'Cadastrar uma nova entidade!';
$lang['cadastrar_favorecido']		= 'Cadastrar um novo favorecido';
$lang['nao_ha_entidades']			= 'Não existem entidades cadastradas!';
$lang['nao_ha_favorecidos']			= 'Não existem favorecidos cadastrados!';
$lang['nao_ha_impostos']			= 'Não existem impostos cadastrados!';
$lang['descricao_entidade']			= "Descrição";
$lang['classPercent']				= "porcentagem";
$lang['cadastro_entidade']			= 'Cadastro de Entidade';
$lang['edicao_entidade']			= 'Edição de Entidade';
$lang['cadastro_favorecido']		= 'Cadastro de Favorecido';
$lang['edicao_favorecido']			= 'Edição de Favorecido';
$lang['listar_entidade_view']		= 'Mostrar Entidades';
$lang['myTable'] 					= 'myTable';
$lang['favorecido'] 				= 'Favorecido';
$lang['favorecido_nao_cadastrado']	= 'É nessesário ter um favorecido cadastrado para cadastrar uma entidade.';

//IMPOSTO JADIEL

$lang['imposto_nome']		='Nome do Imposto';
$lang['valor']				='Valor';
$lang['cadastro_imposto'] 	= 'Cadastro de Imposto';
$lang['fisico'] 			= 'Fisico';
$lang['digital'] 			= 'Digital';
$lang['ambos'] 				= 'Ambos';

////// MODELO DE RELATORIO ////// Vitor

$lang['modelo_cadastro']			= 'Cadastro de modelo de relatório';
$lang['isrc'] 						= 'ISRC';
$lang['upc'] 						= 'UPC';
$lang['qnt_vendida']				= 'Quantidade vendida';
$lang['valor_recebido']				= 'Valor recebido';
$lang['loja'] 						= 'loja';
$lang['subloja']					= 'sub-loja';
$lang['territorio']					= 'Território';
$lang['identificador_moeda']		= 'identificador de moeda';
$lang['selecione_coluna']			= 'Selecione a coluna dos atributos abaixo:';
$lang['modelos']					= 'MODELOS';
$lang['produto']					= 'Produto';
$lang['percentual_aplicado']		= 'Percentual aplicado';
$lang['valor_pagar']				= 'Valor a pagar';
$lang['receita']					= 'Receita';

////// VENDAS ////// Evandro

$lang['vendas_min'] 				= 'Exportação de relatórios';
$lang['vendas_total'] 				= 'Total de Vendas';
$lang['album_min'] 					= 'Álbum';
$lang['faixa_min'] 					= 'Faixa';

////// CLIENTE ////// Vitor

$lang['clientes'] 					= 'CLIENTES';
$lang['perfis']						= 'PERFIS';
$lang['perfis_row']					= 'Perfis';
$lang['cliente_nome'] 				= 'Nome';
$lang['cliente_email'] 				= 'Email';
$lang['cliente_login'] 				= 'Login';
$lang['cliente_senha']				= 'Senha';
$lang['cliente_confirmar_senha']	= 'Confirmação de Senha';
$lang['cliente_funcionalidades'] 	= 'Funcionalidades';
$lang['cliente_cadastrar'] 			= 'Cadastrar';
$lang['Perfil_erro_listar']			= 'Nenhum perfil cadastrado';
$lang['cliente_erro_listar'] 		= 'Nenhum cliente cadastrado';
$lang['cliente_cadastro']			= 'Cadastro de Cliente';
$lang['cliente_edicao']				= 'Edição de Cliente';
$lang['perfil_cadastro']			= 'Cadastro de Perfil';
$lang['perfil_edicao']				= 'Edição de Perfil';
$lang['min6char']					= 'Deve conter pelo menos 6 caracteres';
$lang['min3char']					= 'Deve conter pelo menos 3 caracteres';

////// SIM OU NAO //// Jadiel

$lang['sim']	= 'Sim';
$lang['nao']	= 'Não';

// FUNCIONALIDADES
$lang['func_manter_cliente']            = 'Manter Cliente';
$lang['func_manter_perfil']             = 'Manter Perfil';
$lang['func_cadastrar_entidade']        = 'Cadastro de Entidade';
$lang['func_listar_entidade']           = 'Listar Entidade';
$lang['func_excluir_entidade']          = 'Excluir Entidade';
$lang['func_atualizar_entidade']        = 'Atualizar Entidade';
$lang['func_cadastrar_favorecido']      = 'Cadastro de Favorecido';
$lang['func_listar_favorecido']         = 'Listar Favorecido';
$lang['func_excluir_favorecido']        = 'Excluir Favorecido';
$lang['func_atualizar_favorecido']      = 'Atualizar Favorecido';
$lang['func_cadastrar_faixas']          = 'Cadastro de Faixas';
$lang['func_listar_faixas']             = 'Listar Faixas';
$lang['func_excluir_faixas']            = 'Excluir faixas';
$lang['func_atualizar_faixas']          = 'Atualizar Faixas';
$lang['func_cadastrar_albuns']          = 'Cadastro de Albuns';
$lang['func_listar_albuns']             = 'Listar Albuns';
$lang['func_excluir_albuns']            = 'Excluir Albuns';
$lang['func_atualizar_albuns']          = 'Atualizar Albuns';
$lang['func_cadastrar_imposto']         = 'Cadastro de Imposto';
$lang['func_listar_imposto']            = 'Listar imposto';
$lang['func_excluir_imposto']           = 'Excluir Imposto';
$lang['func_atualizar_imposto']         = 'Atualizar Imposto';
$lang['func_cadastrar_moeda']           = 'Cadastro de Moeda';
$lang['func_listar_moeda']              = 'Listar Moeda';
$lang['func_excluir_moeda']             = 'Excluir Moeda';
$lang['func_atualizar_moeda']           = 'Atualizar Moeda';
$lang['func_cadastrar_relatorio']       = 'Cadastro de Relatório';
$lang['func_listar_relatorio']          = 'Listar Relatório';
$lang['func_excluir_relatorio']         = 'Excluir Relatório';
$lang['func_atualizar_relatorio']       = 'Atualizar Relatório';

//SODRE   //FORMVALIDATION

$lang['cpf/cnpj_invalido']       = 'CPF/CNPJ Inválido';
$lang['campos_incorretos']       = 'Alguns campos foram preenchidos incorretamente';
$lang['langOpt']                 = '0';
$lang['nome_invalido']           = 'Nome inválido';
$lang['erro_favorecido']         = 'Selecione Um favorecido';
$lang['erro_identificacao']      = 'Selecione Uma identificação';
$lang['erro_artista']    	     = 'Selecione um Artista ';
$lang['erro_tipo']        		 = 'Selecione o Tipo ';
$lang['erro_ano']        		 = 'Informe um Ano válido ';
$lang['erro_faixas']    	     = 'Selecione todos os campos de Faixa ';
$lang['erro_artistas']    	     = 'Selecione pelo menos um Artista ';
$lang['erro_autores']    	     = 'Selecione pelo menos um Autor ';
$lang['erro_perc_artista']    	 = 'A soma dos percentuais de Artista deve ser 100% ';
$lang['erro_perc_autor']    	 = 'A soma dos percentuais de Autor deve ser 100% ';
$lang['erro_perc_produtor']    	 = 'A soma dos percentuais de Produtor deve ser 100% ';

// mensagens validacao form cadastro de perfil

$lang['password_error']                        = "Senhas não são iguais";
$lang['marcar_todas']                          = "Marcar todas";
$lang['login_existente']                       = "Login ou email já existe";
$lang['checkbox_erro']                         = "Seleciona uma funcionalidade";

// relatorios

$lang['listar_relatorios']                     = "RELATÓRIOS";
$lang['ralatorio_opcoes']                      = "Opções do Relatório";
$lang['data_inicio']                           = "Data de Início";
$lang['data_fim']                              = "Data Final";
$lang['data_inicio_maior_que_data_fim']        = "Data de Início Maior que Data Fim";
$lang['datas_invalidas']                       = "Escolha Datas Válidas";
$lang['tipo_relatorio']                        = "Tipo De Relatório";
$lang['tipo_relatorio_erro']                   = "Selecione Um Tipo de Relatório";
$lang['selecione_modelo']                      = "Selecione Um Modelo";
$lang['rel_file']                              = "Selecione Um Arquivo";
$lang['tipo_arquivo_invalido']                 = "Tipo De arquivo Inválido";
$lang['periodo_apuracao']                      = "Selecione um Perído de Apuração";
$lang['periodo_de_apuracao']                   = "Período de Apuração";
$lang['apuracao_invalida']                     = "Período de Apuração Inválido";
$lang['data_importacao']                       = "Data de importação";
$lang['modelo_relatorio']                      = "Modelo";
$lang['exclusao']                              = "Exclusão";
$lang['adicao']                                = "Adição";
$lang['exportar']                              = "EXPORTAR";
$lang['importar']                              = "IMPORTAR";

// notificacoes

$lang['notificacao']   		       			   = "NOTIFICAÇÕES";
$lang['principaisNotificacoes']   		       = "PRINCIPAIS NOTIFICAÇÕES";
$lang['contrato_nome']   		               = "Contrato";