<!DOCTYPE html> <!-- Evandro -->
<html>
<head>
	<meta charset="utf-8">
	<title>Matanay</title>
	<link href="<?php echo base_url(); ?>complemento/css/style_log.css" rel="stylesheet">
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
