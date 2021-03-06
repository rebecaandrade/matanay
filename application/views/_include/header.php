<!DOCTYPE html> <!-- Evandro -->
<html>
<head>
    <meta charset="utf-8">
    <title>Matanay</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>complemento/js/sweetalert/lib/sweet-alert.css">
    <link href="<?php echo base_url(); ?>complemento/img/favicon.png" rel="shortcut icon" type="image/x-icon"/>
    <link href="<?php echo base_url(); ?>complemento/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>complemento/css/materialize.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>complemento/js/DataTables-1.10.7/media/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>complemento/js/DataTables-1.10.7/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>complemento/js/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>complemento/css/TitilliumWeb.css' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>complemento/js/chosen_v1.4.2/chosen.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>complemento/bower_components/morrisjs/morris.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>complemento/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/jquery.matanay.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/materialize.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/init.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/alert.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/jquery.mask.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/DataTables-1.10.7/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/DataTables-1.10.7/media/js/jquery.dataTables.columnFilter.js"></script>
    <script src="<?php echo base_url(); ?>complemento/js/chosen_v1.4.2/chosen.jquery.js"></script>
</head>
<body>
<?php
	if (!($this->session->userdata('linguagem'))) {
	    $this->session->set_userdata('linguagem', 'portugues');
	}

	$this->session->set_flashdata('redirect_url', current_url());

	$linguagem_usuario = $this->session->userdata('linguagem');
	$this->lang->load('_matanay_' . $linguagem_usuario, $linguagem_usuario);

	if (!($this->session->userdata('id_usuario'))) {
    	redirect('acesso/index');
	}
?>
<nav class="grey lighten-5" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url(); ?>index.php/cliente/home"
                                          class="brand-logo">MATANAY</a>
        <ul class="right hide-on-med-and-down">
            <li><a class="opcao-menu"
                   href="<?php echo base_url(); ?>index.php/cliente/home"><?php echo $this->lang->line('home'); ?></a>
            </li>
            <li><a class="opcao-menu" id="cadastro" href="#"><?php echo $this->lang->line('cadastros'); ?></a></li>
            <li><a class="opcao-menu" id="relatorio" href="#"><?php echo $this->lang->line('relatorios'); ?></a></li>
            <li><a class="opcao-menu"
                   href="<?php echo base_url(); ?>index.php/acesso/deslogar"><?php echo $this->lang->line('sair'); ?></a>
            </li>
            <li>
                <div id="lingua" class="opcao-menu">
                    <?php echo form_open('acesso/linguagem') ?>
                    <select name="lang" onchange="this.form.submit();">
                        <?php if ($this->session->userdata('linguagem') == 'english') { ?>
                            <option value="english"><?php echo $this->lang->line('ingles'); ?></option>
                            <option value="portugues"><?php echo $this->lang->line('portugues'); ?></option>
                        <?php } else { ?>
                            <option value="portugues"><?php echo $this->lang->line('portugues'); ?></option>
                            <option value="english"><?php echo $this->lang->line('ingles'); ?></option>
                        <?php } ?>
                    </select>
                    <?php echo form_close() ?>
                </div>
            </li>
            <li>
                <?php if ($this->session->userdata('linguagem') == 'english') { ?>
                    <img class="flag" src="<?php echo base_url() . 'complemento/img/english.png' ?>">
                <?php } else { ?>
                    <img class="flag" src="<?php echo base_url() . 'complemento/img/portugues.png' ?>">
                <?php } ?>
            </li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="<?php echo base_url(); ?>index.php/cliente/home"><?php echo $this->lang->line('home'); ?></a></li>

            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><a><?php echo $this->lang->line('cadastros'); ?></a></div>
                    <div class="collapsible-body">
                    	<a href="<?php echo base_url(); ?>index.php/faixas_videos/listar"><?php echo $this->lang->line('faixas'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/albuns/listar"><?php echo $this->lang->line('albums'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/entidade/listar"><?php echo $this->lang->line('entidades'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/favorecido/listar"><?php echo $this->lang->line('favorecidos'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/moeda/listar"><?php echo $this->lang->line('moeda_menu'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/imposto/listar"><?php echo $this->lang->line('imposto'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/contrato/listar"><?php echo $this->lang->line('contrato'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url().'index.php/cliente/lista_perfis/'.$this->session->userdata('cliente_id'); ?>"><?php echo $this->lang->line("perfis"); ?></a>
                    </div>
                </li>
            </ul>

            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><a><?php echo $this->lang->line('listar_relatorios'); ?></a></div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/modelo_relatorio/listar_modelos"><?php echo $this->lang->line('modelos'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?php echo base_url(); ?>index.php/relatorio/listar_relatorios"><?php echo $this->lang->line('importar'); ?></a>
                    </div>
                    <div class="collapsible-body">
                        <a href="<?=base_url().'index.php/relatorio/opcoes_relatorio'?>"><?php echo $this->lang->line('exportar'); ?></a>
                    </div>
                </li>
            </ul>

            <li><a href="<?php echo base_url(); ?>index.php/acesso/deslogar"><?php echo $this->lang->line('sair'); ?></a></li>

            <ul class="collapsible" data-collapsible="accordion">
                <li id="nav-lang">
                    <div class="collapsible-header"><a>
                            <?php if ($this->session->userdata('linguagem') == 'english') { ?>
                                <img
                                    src="<?php echo base_url() . 'complemento/img/english.png' ?>"> <?php echo $this->lang->line('ingles'); ?>
                            <?php } else { ?>
                                <img
                                    src="<?php echo base_url() . 'complemento/img/portugues.png' ?>"> <?php echo $this->lang->line('portugues'); ?>
                            <?php } ?>
                        </a></div>

                    <?php if ($this->session->userdata('linguagem') == 'portugues') { ?>
                        <div class="collapsible-body">
                            <?php echo form_open('acesso/linguagem') ?>
                            <input type="hidden" name="lang" value="english">
                            <img src="<?php echo base_url() . 'complemento/img/english.png' ?>">
                            <input type='submit' value='<?php echo $this->lang->line('ingles'); ?>'>
                            <?php echo form_close() ?>
                        </div>
                    <?php } else { ?>
                        <div class="collapsible-body">
                            <?php echo form_open('acesso/linguagem') ?>
                            <input type="hidden" name="lang" value="portugues">
                            <img src="<?php echo base_url() . 'complemento/img/portugues.png' ?>">
                            <input type='submit' value='<?php echo $this->lang->line('portugues'); ?>'>
                            <?php echo form_close() ?>
                        </div>
                    <?php } ?>
                </li>
            </ul>
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
</nav>

<div id="barra2" class="grey darken-2" role="navigation">
    <div id="sub_menu" class="nav-wrapper container">
        <ul class="right hide-on-med-and-down">
            <li>
                <a href="<?php echo base_url(); ?>index.php/faixas_videos/listar"><?php echo $this->lang->line('faixas'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/albuns/listar"><?php echo $this->lang->line('albums'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/entidade/listar"><?php echo $this->lang->line('entidades'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/favorecido/listar"><?php echo $this->lang->line('favorecidos'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/moeda/listar"><?php echo $this->lang->line('moeda_menu'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/imposto/listar"><?php echo $this->lang->line('imposto'); ?></a>
        	</li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/contrato/listar"><?php echo $this->lang->line('contrato'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url().'index.php/cliente/lista_perfis/'.$this->session->userdata('cliente_id'); ?>"><?php echo $this->lang->line("perfis"); ?></a>
            </li>
        </ul>
    </div>

    <div id="sub_menu2" class="nav-wrapper container">
        <ul class="right hide-on-med-and-down">
            <li>
                <a href="<?php echo base_url(); ?>index.php/modelo_relatorio/listar_modelos"><?php echo $this->lang->line('modelos'); ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/relatorio/listar_relatorios"><?php echo $this->lang->line('importar'); ?></a>
            </li>
            <li>
                <a href="<?=base_url().'index.php/relatorio/opcoes_relatorio'?>"><?php echo $this->lang->line('exportar'); ?></a>
            </li>
        </ul>
    </div>
</div>

<div id="barra3" class="grey darken-1" role="navigation">
</div>