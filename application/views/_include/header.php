<!DOCTYPE html> <!-- Evandro -->
<html>
<head>
	<meta charset="utf-8">
	<title>Matanay</title>
	<link href="<?php echo base_url(); ?>complemento/img/favicon.png" rel="shortcut icon" type="image/x-icon" />
	<link href="<?php echo base_url(); ?>complemento/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>complemento/css/materialize.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/jquery.matanay.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/materialize.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/init.js"></script>
	<script src="js/jquery/validate.js"></script>
	<script src="js/singup-form.js"></script>
</head>
<body>
	<?php
		if (!($this->session->userdata('linguagem'))) {
			$this->session->set_userdata('linguagem', 'portugues');
		}

		$this->session->set_flashdata('redirect_url', current_url());

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);

		if (!($this->session->userdata('id_usuario'))){
			redirect('acesso/index');
		}
	?>
	<nav class="grey darken-3" role="navigation">
    	<div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url(); ?>index.php/cliente/home" class="brand-logo">MATANAY</a>
      		<ul class="right hide-on-med-and-down">
        		<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/home"><?php echo $this->lang->line('home'); ?></a></li>
				<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/menu_cadastrar"><?php echo $this->lang->line('cadastros'); ?></a></li>
				<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('relatorios'); ?></a></li>
				<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('vendas'); ?></a></li>
				<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/acesso/deslogar"><?php echo $this->lang->line('sair'); ?></a></li>
      			<li>
      				<div id="lingua" class="opcao-menu">
						<?php echo form_open('acesso/linguagem') ?>
							<select name="lang" onchange="this.form.submit();">
								<?php if($this->session->userdata('linguagem') == 'english') { ?>
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
      				<?php if($this->session->userdata('linguagem') == 'english') { ?>
						<img class="flag" src="<?php echo base_url().'complemento/img/english.png' ?>">
					<?php } else { ?>	
						<img class="flag" src="<?php echo base_url().'complemento/img/portugues.png' ?>">
					<?php } ?>
				</li>
      		</ul>
      		<ul id="nav-mobile" class="side-nav">
        		<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/cliente/home"><?php echo $this->lang->line('home'); ?></a></li>
				
      			<ul class="collapsible" data-collapsible="accordion">
      				<li><div class="collapsible-header"><a><?php echo $this->lang->line('cadastros'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><?php echo $this->lang->line('faixas'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><?php echo $this->lang->line('albums'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/entidade/listar"><?php echo $this->lang->line('entidades'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/favorecido/listar"><?php echo $this->lang->line('favorecido'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/moeda/listar"><?php echo $this->lang->line('moeda_menu'); ?></a></div>
      				<div class="collapsible-body"><a href="<?php echo base_url(); ?>index.php/imposto/listar"><?php echo $this->lang->line('imposto'); ?></a></div></li>
      			</ul>

      			<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('relatorios'); ?></a></li>
				<li><a class="opcao-menu" href="#"><?php echo $this->lang->line('vendas'); ?></a></li>
				<li><a class="opcao-menu" href="<?php echo base_url(); ?>index.php/acesso/deslogar"><?php echo $this->lang->line('sair'); ?></a></li>
      		
				<ul class="collapsible" data-collapsible="accordion">
      				<li id="nav-lang">
      					<div class="collapsible-header"><a>
      						<?php if($this->session->userdata('linguagem') == 'english') { ?>
								<img src="<?php echo base_url().'complemento/img/english.png' ?>"> <?php echo $this->lang->line('ingles'); ?>
							<?php } else { ?>	
								<img src="<?php echo base_url().'complemento/img/portugues.png' ?>"> <?php echo $this->lang->line('portugues'); ?>
							<?php } ?>
      					</a></div>

      					<?php if($this->session->userdata('linguagem') == 'portugues') { ?>
	      					<div class="collapsible-body">
	      						<?php echo form_open('acesso/linguagem') ?>
				      				<input type="hidden" name="lang" value="english">
	                				<img src="<?php echo base_url().'complemento/img/english.png' ?>">
	                				<input type='submit' value='<?php echo $this->lang->line('ingles'); ?>'>
                				<?php echo form_close() ?>
							</div>
						<?php } else { ?>
							<div class="collapsible-body">
	      						<?php echo form_open('acesso/linguagem') ?>
				      				<input type="hidden" name="lang" value="portugues">
	                				<img src="<?php echo base_url().'complemento/img/portugues.png' ?>">
	                				<input type='submit' value='<?php echo $this->lang->line('portugues'); ?>'>
                				<?php echo form_close() ?>
							</div>
						<?php } ?>
					</li>
      			</ul>
      		</ul>

      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    	</div>

  		<div id="barra2" class="grey darken-2" role="navigation">
    		<div class="nav-wrapper container">
      			<ul class="right hide-on-med-and-down">
      				<?php if($this->session->userdata('sub_menu') == 2) { ?>
		        		<li><a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><?php echo $this->lang->line('faixas'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><?php echo $this->lang->line('albums'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/entidade/listar"><?php echo $this->lang->line('entidades'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/favorecido/listar"><?php echo $this->lang->line('favorecido'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/moeda/listar"><?php echo $this->lang->line('moeda_menu'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/imposto/listar"><?php echo $this->lang->line('imposto'); ?></a></li>
    				<?php } ?>
    		</div>
    	</div>

    	<div id="barra3" class="grey darken-1" role="navigation">
    	</div>
  	</nav>