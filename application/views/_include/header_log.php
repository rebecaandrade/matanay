<!DOCTYPE html> <!-- Evandro -->
<html>
<head>
	<meta charset="utf-8">
	<title>Matanay</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>complemento/js/sweetalert/lib/sweet-alert.css">
	<link href="<?php echo base_url(); ?>complemento/img/favicon.png" rel="shortcut icon" type="image/x-icon" />
	<link href="<?php echo base_url(); ?>complemento/css/style_log.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>complemento/css/materialize.css" rel="stylesheet">
	<link href='<?php echo base_url(); ?>complemento/css/TitilliumWeb.css' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url(); ?>complemento/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url();?>complemento/js/sweetalert/lib/sweet-alert.min.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/jquery.matanay.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/materialize.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/init.js"></script>
	<script src="<?php echo base_url(); ?>complemento/js/alert.js"></script>
</head>
<body>

	<div id="lingua">
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

	<div id="content">
