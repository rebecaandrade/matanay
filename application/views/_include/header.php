<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Matanay</title>
	<link href="<?php echo base_url(); ?>complemento/css/style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		if (!($this->session->userdata('linguagem'))) {
			$this->session->set_userdata('linguagem', 'portugues');
		}

		$linguagem_usuario = $this->session->userdata('linguagem');
		$this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
	?>
	<div id="barra">
		<div id="menu">
			<ul>
				<a href="<?php echo base_url(); ?>index.php/cliente/home"><li><?php echo $this->lang->line('home'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/cliente/menu_cadastrar"><li><?php echo $this->lang->line('register'); ?></li></a>
				<li><?php echo $this->lang->line('report'); ?></li>
				<li><?php echo $this->lang->line('receipt'); ?></li>
				<a href="<?php echo base_url(); ?>index.php/acesso/deslogar"><li><?php echo $this->lang->line('logout'); ?></li></a>
				<li>
					<?php if($this->session->userdata('linguagem') == 'english') { ?>
						<img src="<?php echo base_url().'complemento/img/english.png' ?>">
					<?php } else { ?>	
						<img src="<?php echo base_url().'complemento/img/portugues.png' ?>">
					<?php } ?></li>
			</ul>

			<div id="lingua">
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
		</div>

		<div class="logo"><a href="<?php echo base_url(); ?>index.php/usuario/home">
			<img src="<?php echo base_url().'complemento/img/logo1.fw.png' ?>"></a></div>
	</div>	

		<div id="sub_menu">
		<?php if($this->session->userdata('sub_menu') == 2) { ?>
			<ul>
				<a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa"><li><?php echo $this->lang->line('tracks'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_video"><li><?php echo $this->lang->line('videos'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album"><li><?php echo $this->lang->line('albums'); ?></li></a>
				<a href="<?php echo base_url(); ?>index.php/entidade/cadastra_entidade"><li><?php echo $this->lang->line('entitys'); ?></li></a>
			</ul>
		<?php } ?>
		</div>

	<div id="sub_barra"> </div>

	<div id="sub_barra2"></div>



	<div id="content">
