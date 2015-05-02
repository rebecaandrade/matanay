<?php $this->load->view('_include/header') ?>

	<div class="circulo"><img src="<?php echo base_url().'complemento/img/track.png' ?>"></div>

	<div id="dados">
	<?php echo form_open('usuario/cadastrar_faixa') ?>
			<label><?php echo $this->lang->line('title'); ?><input type='text' name='nome'></label>
			<label>ISRC <input type='text' name='isrc'></label>
			<h2><?php echo $this->lang->line('percentage'); ?></h2>
			<label><?php echo $this->lang->line('perc_artist'); ?><input type='text' name='percent_artista'></label>
			<label><?php echo $this->lang->line('perc_writer'); ?><input type='text' name='percent_compositor'></label>
			<label><?php echo $this->lang->line('perc_producer'); ?><input type='text' name='percent_produtor'></label>
			<input type='submit' value='<?php echo $this->lang->line('register2'); ?>'>
	<?php echo form_close() ?>
	</div>

<?php $this->load->view('_include/footer') ?>