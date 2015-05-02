<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Matanay</title>
	<link href="<?php echo base_url(); ?>complemento/css/style_log.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
</head>
<body>
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

	<div id="content">
