<!DOCTYPE html> <!-- Evandro -->
<html>
<head>
	<meta charset="utf-8">
	<title>Matanay</title>
	<link href="<?php echo base_url(); ?>complemento/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>complemento/css/materialize.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/jquery.matanay.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/materialize.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/init.js"></script>
</head>
<body>
	<?php
		if (!($this->session->userdata('linguagem'))) {
			$this->session->set_userdata('linguagem', 'portugues');
		}

		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
	?>
	<nav class="grey darken-3" role="navigation">
    	<div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url(); ?>index.php/cliente/home" class="brand-logo">MATANAY</a>
      		<ul class="right hide-on-med-and-down">
        		<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/home"><?php echo $this->lang->line('home'); ?></a></li>
				<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/menu_cadastrar"><?php echo $this->lang->line('cadastros'); ?></a></li>
				<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('relatorios'); ?></a></li>
				<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('vendas'); ?></a></li>
				<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/acesso/deslogar"><?php echo $this->lang->line('sair'); ?></a></li>
      		</ul>

      		<ul id="nav-mobile" class="side-nav">
        		<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/home"><?php echo $this->lang->line('home'); ?></a></li>
				
      			<ul class="collapsible" data-collapsible="accordion">
      				<li><div class="collapsible-header"><a><?php echo $this->lang->line('cadastros'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><?php echo $this->lang->line('faixas'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><?php echo $this->lang->line('albums'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro"><?php echo $this->lang->line('entidades'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/moeda/listar"><?php echo $this->lang->line('moeda_menu'); ?></a></div></li>
      			</ul>

      			<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('relatorios'); ?></a></li>
				<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('vendas'); ?></a></li>
				<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/acesso/deslogar"><?php echo $this->lang->line('sair'); ?></a></li>
      		</ul>

      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    	</div>

  		<div id="barra2" class="grey darken-2" role="navigation">
    		<div class="nav-wrapper container">
      			<ul class="right hide-on-med-and-down">
      				<?php if($this->session->userdata('sub_menu') == 2) { ?>
		        		<li><a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><?php echo $this->lang->line('faixas'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><?php echo $this->lang->line('albums'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro"><?php echo $this->lang->line('entidades'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/moeda/listar"><?php echo $this->lang->line('moeda_menu'); ?></a></li>
    				<?php } ?>
    		</div>
    	</div>

    	<div id="barra3" class="grey darken-1" role="navigation">
    	</div>
  	</nav>

  	<ul id="dropdown-cadastros" class="dropdown-content">
	  	<a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><li><?php echo $this->lang->line('faixas'); ?></li></a>
		<a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><li><?php echo $this->lang->line('albums'); ?></li></a>
		<a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro"><li><?php echo $this->lang->line('entidades'); ?></li></a>
		<a href="<?php echo base_url(); ?>index.php/moeda/listar"><li><?php echo $this->lang->line('moeda_menu'); ?></li></a>
	</ul>

  	<!--
	<div id="barra">
		<div id="menu" class="nav-wrapper">
			<ul class="right hide-on-med-and-down">
				<a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/home"><li><?php echo $this->lang->line('home'); ?></li></a>
				<a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/menu_cadastrar"><li><?php echo $this->lang->line('cadastros'); ?></li></a>
				<a class="opcao-menu" href="#"><li><?php echo $this->lang->line('relatorios'); ?></li></a>
				<a class="opcao-menu" href="#"><li><?php echo $this->lang->line('vendas'); ?></li></a>
				<a class="opcao-menu" href="<?php echo base_url(); ?>index.php/acesso/deslogar"><li><?php echo $this->lang->line('sair'); ?></li></a>
				<li>
					<?php if($this->session->userdata('linguagem') == 'english') { ?>
						<img src="<?php echo base_url().'complemento/img/english.png' ?>">
					<?php } else { ?>	
						<img src="<?php echo base_url().'complemento/img/portugues.png' ?>">
					<?php } ?></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

			<ul id="nav-mobile" class="side-nav">
				<a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/home"><li><?php echo $this->lang->line('home'); ?></li></a>
				<a class="dropdown-button" href="#!" data-activates="dropdown-cadastros"><li>CADASTROS</li></a>
				<a class="opcao-menu" href="#"><li><?php echo $this->lang->line('relatorios'); ?></li></a>
				<a class="opcao-menu" href="#"><li><?php echo $this->lang->line('vendas'); ?></li></a>
				<a class="opcao-menu" href="<?php echo base_url(); ?>index.php/acesso/deslogar"><li><?php echo $this->lang->line('sair'); ?></li></a>
				<li>
					<?php if($this->session->userdata('linguagem') == 'english') { ?>
						<img src="<?php echo base_url().'complemento/img/english.png' ?>">
					<?php } else { ?>	
						<img src="<?php echo base_url().'complemento/img/portugues.png' ?>">
					<?php } ?></li>
			</ul>

			<div id="lingua" class="opcao-menu">
				<?php echo form_open('acesso/linguagem') ?>
					<select name="lang" onchange="this.form.submit();">
						<?php if($this->session->userdata('linguagem') == 'english') { ?>
							<option value="english">English</option>
							<option value="portugues">Português</option>
						<?php } else { ?>	
							<option value="portugues">Português</option>
							<option value="english">English</option>
						<?php } ?>
					</select>
				<?php echo form_close() ?>
			</div>
			<hr id="trilho"/>
		</div>

		<div class="logo"><a href="<?php echo base_url(); ?>index.php/cliente/home">
			<img src="<?php echo base_url().'complemento/img/logo1.fw.png' ?>"></a></div>
	</div>	

	<div id="sub_barra"> 
		<div id="sub_menu">
		<?php if($this->session->userdata('sub_menu') == 2) { ?>
			<ul class="right hide-on-med-and-down">
				<a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><li><?php echo $this->lang->line('faixas'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><li><?php echo $this->lang->line('albums'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro"><li><?php echo $this->lang->line('entidades'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/moeda/listar"><li><?php echo $this->lang->line('moeda_menu'); ?></li></a>
			</ul>
		<?php } ?>
		</div>
	</div>

	<div id="sub_barra2"></div>
	-->
